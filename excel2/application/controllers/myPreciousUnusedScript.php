<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class MyPreciousUnusedScript extends CI_Controller
{
    public function insert_db()
    {  
        $file = './data_temp/dataset.xlsm';
        $sheetname = 'Regional Daily'; 
        
        $inputFileType = 'Excel2007'; 

        /**  Create a new Reader of the type defined in $inputFileType  **/
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        /**  Advise the Reader of which WorkSheets we want to load  **/ 
        $objReader->setLoadSheetsOnly($sheetname); 
        /**  Load $inputFileName to a PHPExcel Object  **/
        $objPHPExcel = $objReader->load($file);
        $objReader->setReadDataOnly(true);
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection(); 
        
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getFormattedValue();

            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
        
        $data_raw['header'] = $header;
        $data_raw['values'] = $arr_data;
        
        $sql_header = array('Regional','Date','RRC_Failure_Rate','CSSR_CS','CSSR_PS','CSSR_HSDPA','CSSR_HSUPA','CCSR_CS','CCSR_PS','CCSR_HSDPA','CCSR_HSUPA','ISHO_SR','SHO_SR','IFHO_SR','SHO_Overhead','Cell_PS_DL_throughput','Cell_PS_UL_throughput','HSDPA_User_throughput','HSUPA_User_Throughput','PS_DL_payload','PS_UL_payload','HSDPA_Payload','HSUPA_payload','Average_CQI','Availability','RRC_Failure_Rate_Nom','RRC_Failure_Rate_Den','CSSR_CS_Nom','CSSR_CS_Den','CSSR_PS_Nom','CSSR_PS_Den','CSSR_HSDPA_Nom','CSSR_HSDPA_Den','CSSR_HSUPA_Nom','CSSR_HSUPA_Den','CCSR_CS_Nom','CCSR_CS_Den','CCSR_PS_Nom','CCSR_PS_Den','CCSR_HSDPA_Nom','CCSR_HSDPA_Den','CCSR_HSUPA_Nom','CCSR_HSUPA_Den','ISHO_SR_Nom','ISHO_SR_Den','SHO_SR_Nom','SHO_SR_Den','IFHO_SR_Nom','IFHO_SR_Den','Traffic_Voice','Traffic_Video','Fail_CS','Fail_PS','Fail_HSDPA','Fail_HUSPA','ISHO_FAIL','SHO_FAIL','IFHO_FAIL');
        
        
        
        foreach($data_raw['values'] as $row){
            $temp = array();
            $i=0;
            foreach($row as $row_data => $value){
                //echo var_dump($value);
                $temp[$sql_header[$i]] = $value;
                //echo $sql_header[$i];
                $i++;
            }
            //echo json_encode($temp);
            $this->Datamodel->insert($temp);
            //$data[] = array($temp);
        }
        
        //$new_data = $data;
        
        //echo json_encode($data[192]);
        /*
        for($x=0;$x<count($data);$x++){
            echo json_encode($data[$x][]);
            //$this->Datamodel->insert($data[$x]);
        }
        
        */
       //$this->Datamodel->insert($data);
        //$this->Datamodel->insert($temp);
        
    }

    public function data_conversion($sheetname,$tabname,$sheetindex){
        $this->load->library('Excel_reader');
        
        $Reader = new SpreadsheetReader("./data_temp/dataset.xlsm",false);

        $sql_header = $this->get_sql_header($sheetname);
        
        $Reader -> ChangeSheet($sheetindex);
        $i=0;
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
                if ($index == 0) {
                    $header[$row] = $data_val;
                } else {
                    $arr_data[$i][$row] = $data_val;
                }
            }

            $i++;
        }

        $data_raw['header'] = $header;
        $data_raw['values'] = $arr_data;
        
        foreach($data_raw['values'] as $row){
            $temp = array();
            $x=0;
            foreach($row as $row_data => $value){

                if($sql_header[$x]=='Date'){
                    $date = str_replace('-','/',$value);
                    $temp[$sql_header[$x]] = date("Y-d-m",strtotime($date));
                }else{
                    $temp[$sql_header[$x]] = $value;
                }

                $x++;
            }

            $this->Datamodel->insert($temp,$tabname);
            $temp=null;
        }

    }

    function test_get_data(){
        $data = $this->Datamodel->get_data('regional_daily');
        echo json_encode(array('data_tab'=>$data));
    }
    
    public function insert_toDB($start_range,$end_range,$sheetname,$tabname,$data_attemp)
    {  
        ob_clean();
        $this->load->library('Excel');
        $inputFileType = 'Excel2007'; 
        $inputFileName = './data_temp/dataset.xlsm'; 
        
        /**  Create a new Reader of the type defined in $inputFileType  **/ 
        $objReader = PHPExcel_IOFactory::createReader($inputFileType); 
        /**  Tell the Reader that we want to use the Read Filter  **/ 
        $filterSubset = new FilterReader($start_range,$end_range); 
//        /$objReader->setReadDataOnly(true);
        
        $cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
        $cacheSettings = array('memoryCacheSize ' => '1024MB', 'cacheTime' => 6000);
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
        
        $objReader->setLoadSheetsOnly($sheetname); 
        
        $objReader->setReadFilter($filterSubset); 
        
        $objPHPExcel = $objReader->load($inputFileName);

        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection(); 
        
        
        
        $sql_header = $this->get_sql_header($sheetname);
        
        
        $cell_count = count($cell_collection);
        $header_count = count($sql_header);
        //echo $header_count.'<br>';
        //echo $cell_count;
        
        if($cell_count > $header_count){
        
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getFormattedValue();
                //echo '<br>'.$data_value;
                if ($row == 1) {
                    $header[$row][$column] = $data_value;
                } else {
                    $arr_data[$row][$column] = $data_value;
                }
            }

            $data_raw['header'] = $header;
            $data_raw['values'] = $arr_data;
            $objPHPExcel->disconnectWorksheets(); 
            unset($objPHPExcel);

            foreach($data_raw['values'] as $row){
                $temp = array();
                $i=0;
                foreach($row as $row_data => $value){
                    //echo var_dump($value);

                    if($sql_header[$i]=='Time'){
                        $temp[$sql_header[$i]] = date("H:i:s ",strtotime($value));
                    }else{
                        $temp[$sql_header[$i]] = $value;
                    }
                    //echo $sql_header[$i];
                    $i++;
                }
                echo $data_attemp.'=='.$sheetname.'-'.json_encode($temp).'<br>';
                //this->Datamodel->insert($temp,$tabname);
                //$data[] = array($temp);
                $temp=null;
            }
            return true;
        }else{
            echo $data_attemp.'=='.$sheetname.'-false-<br> ';
            return false;
        }
        
        //$new_data = $data;
        
        //echo json_encode($data[192]);
        /*
        for($x=0;$x<count($data);$x++){
            echo json_encode($data[$x][]);
            //$this->Datamodel->insert($data[$x]);
        }
        
        */
       //$this->Datamodel->insert($data);
        //$this->Datamodel->insert($temp);
        
        $temp=null;
        $column =null;
        $row=null;
        $data_value=null;
        $data_raw=null;
        $objReader=null;
        $filterSubset=null;

        $cell_collection=null;
        $sql_header = null;
        $cell_count = null;
        $header_count = null;
        
        
        
    }
    
    public function get_data(){
        //$this->insert_RNC_hourly(300,600,'RNC Daily','rnc_daily');
        $loop_batch = 500;
        $loop_limit = 50000;
        $i=0;
        //$this->insert_toDB(800,2000,'RNC Daily','rnc_daily');
        $data_arr = array('RNC Daily','Regional Daily','RNC Hourly');
        $tab_arr = array('rnc_daily','regional_daily','rnc_hourly');
        while($loop_batch <= $loop_limit){
            //$data =null;
            //$data_reg_daily =null;
            //$data_rnc_daily =null;
            $data_rnc_hourly =null;
            
            //$data_rnc_daily = $this->insert_toDB($i,$loop_batch,'RNC Daily','rnc_daily');
            //if($data_rnc_daily==false)continue;
            //$data_reg_daily = $this->insert_toDB($i,$loop_batch,'Regional Daily','regional_daily');
            

            $data_rnc_hourly = $this->insert_toDB($i,$loop_batch,'RNC Hourly','rnc_hourly',$i);
            
            //echo $data;
            //echo 'i ->'.$i.'<br>';
            /*
            for($arr=0;$arr<3;$arr++){
                //echo 'arr loop A->'.$arr.'<br>';
                //echo '[loop attempt to batch]'.'['.$data_arr[$arr].']'.$i.' ->'.$loop_batch.'<br>';
                $data =null;
                
                $data = $this->insert_toDB($i,$loop_batch,$data_arr[$arr],$tab_arr[$arr],$i);
                
                
                if($data==false)continue;
                
                //echo 'data after ->'.$data;
                $data =null;
                
                //echo 'arr loop B->'.$arr.'<br>';
                //echo 'arr done ->'.$arr.'<br>';
            }
             */
            //echo $tab_array[1];
            //echo '<br>'.$i.'->'.$loop_batch.'<br>';
            $i = $loop_batch;
            $loop_batch = $loop_batch+500;
            
        }
    }
    
    public function RAW_data_conversion($sheetname,$tabname,$sheetindex){
        $this->load->library('Excel_reader');
        
        $Reader = new SpreadsheetReader("./data_temp/dataset.xlsm",false);
//        / $Sheets = $Reader -> Sheets();
        $sql_header = $this->get_sql_header($sheetname);
        
        $Reader -> ChangeSheet($sheetindex);
        $i=0;
        
        foreach ($Reader as $index => $value)
        {

            foreach($value as $row => $data_val)
            {
                //echo json_encode($row).'<br>';
                if ($index == 0) {
                    $header[$row] = $data_val;
                } else {
                    $arr_data[$i][$row] = $data_val;
                }

            }
            //echo json_encode($arr_data).'<br>';
            //echo '<br>';
            $i++;
        }

        $data_raw['header'] = $header;
        $data_raw['values'] = $arr_data;
        
        foreach($data_raw['values'] as $row){
            $temp = array();
            $x=0;
            foreach($row as $row_data => $value){
                //echo var_dump($value);
                if($sql_header[$x]=='Date'){
                    $date = str_replace('-','/',$value);
                    $temp[$sql_header[$x]] = date("Y-d-m",strtotime($date));
                }else{
                    $temp[$sql_header[$x]] = $value;
                }
                //$temp[$sql_header[$x]] = $value;

                //echo $sql_header[$i];
                $x++;
            }
            //echo json_encode($temp).'<br>';
            $this->Datamodel->insert($temp,$tabname);
            //$data[] = array($temp);
            $temp=null;
        }
            //echo json_encode($temp).'<br>';
        
        /*
        foreach ($Sheets as $Index => $Name)
        {
            //echo 'Sheet #'.$Data.': '.$Name;

            $Reader -> ChangeSheet($Index);
            foreach ($Reader as $Row)
            {
                echo json_encode($Row).'<br>';
            }
            
        }*/
    }
    
    
    public function RAW_get_data_converted(){
        //$data = $this->Datamodel->get_data($tabname);
        //echo json_encode($data).'<br>';
        $data = $this->get_sql_header('Regional Daily');
        $this->load->view('test',array('data_test' => $data));
    }


    function test_get_sheet_data_by_date($colindex,$sheetname){

        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        $startDate = date("m/d/Y",strtotime($this->input->get('startDate')));
        $endDate = date("m/d/Y",strtotime($this->input->get('endDate')));

        $flag = false;
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
              if ($colindex == $row && $index > 0) {
                    $arr_data[] = $data_val;
                    if ($row == 1) {
                    $date = str_replace('-','/',$data_val);
                    $temp = date("m/d/Y",strtotime($date));
                    //$arr_data[] = date("m/d/Y",strtotime($date));
                    //$arr_data[] = $data_val;
                      if($temp >= $startDate and $temp <= $endDate){
                        $arr_data[] = $data_val;

                      }
                      
                  }
                }
               
            }
        }
        //get data_tanggal 
        echo json_encode($arr_data);
    }

    //jscript
    /*
    function get_data_date(sheetname){

                    //alert(data_date);


                    //alert(newDate);

                    function cb(start, end) {
                        $('#sheet_conf').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }

                    $('.startDate_input').daterangepicker({
                        "singleDatePicker": true,
                        "showDropdowns": true,
                        "minDate":  newDate[1],
                        "maxDate": newDate[newDate.length - 1],
                        "startDate": newDate[1],
                        "endDate": newDate[newDate.length - 1],
                    }, cb);

                    $('.endDate_input').daterangepicker({
                        "singleDatePicker": true,
                        "showDropdowns": true,
                        "minDate":  newDate[1],
                        "maxDate": newDate[newDate.length - 1],
                        "startDate": newDate[1],
                        "endDate": newDate[newDate.length - 1],
                    }, function(start, end, label) {

                    
                    });

                    
                //test_get_data_date(sheetname,newDate[1],newDate[newDate.length - 1]);

                
                
            }

            //upload form with ajax

            $('#addSuccess').hide();
            $('#addError').hide();

            $('#uploadFileDataForm').submit(function(e) {
                e.preventDefault();
                 var file_data = $('#datafileform').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    alert(file_data);                             
                    $.ajax({
                                url: '<?=site_url("admin/doupload"); ?>', // point to server-side PHP script 
                                dataType: 'text',  // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,                         
                                type: 'post',
                                success: function(php_script_response){
                                    alert(php_script_response); // display response from the PHP script, if any
                                }
                     });
            });
            /*
            $('#uploadFileDataForm').submit(function() {
              var form = $(this);
              form.children('button').prop('disabled', true);

              $('#addSuccess').hide();
              $('#addError').hide();
              
              var faction = '<?=site_url("admin/doupload"); ?>';
              var fdata = form.serialize();


              $.post(faction, fdata, function(rdata) {

                  var data_process = $.parseJSON(rdata);
                  alert(data_process);

                  if (data_process) {
                      $('#addSuccessMessage').html(data_process.message);
                      $('#addSuccess').show();
                  } else {
                      $('#addErrorMessage').html(data_process.message);
                      $('#addError').show();
                  }

                  form.children('button').prop('disabled', false);
                  form.children('input[name="name"]').select();
              });

              return false;

            });


            //onchart for rendering visual
            function do_visualisation(sheetname,chart_title,chart_idx){
                
                switch (chart_title) {
                    case 'accessibility':
                        idx_x=[51,52,53];
                        idx_y=[3,4,5];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'retainability':
                        idx_x=[27,29,31];
                        idx_y=[3,4,5];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'mobility':
                        idx_x=[56,55,57];
                        idx_y=[12,11,13];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'traffic':
                        //chart_title=[20,'PS DL payload(Mbytes) vs PS UL payload(Mbytes)',21];
                        idx_x=[0,20,0];
                        //trafic voice, ps dl payload, hsdpa payload
                        idx_y=[49,19,21];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'throughput':
                        //idx_x;
                        //chart_title=[15,17,18];
                        idx_y=[0,0,0,]
                        idx_x=[15,17,18];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                    case 'hsupa':
                        idx_x=[54,33,0];
                        idx_y=[6,6,22];
                        draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx);
                        break;
                        /*
                    case 'extra':
                        idx_x=;
                        idx_y=0;
                        break;
                        */
                    }
            }    
            
            function draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx){
                //alert(chart_title);
                for(i=0;i<3;i++){
                    /*
                    if(idx_x[i] == 0){
                        var url_data_x= null;
                        var url_chartName_x= null;
                        
                    }if(idx_y[i] == 0){
                        var url_data_y = null;
                        var url_chartName_y = null;

                    }else{

                        var url_data_x = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                        var url_data_y = '<?=site_url("admin/get_data_by_option"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                        var url_chartName_x = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                        var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;

                    }*/
                    var url_data_x = '<?=site_url("admin/test_get_sheet_data_by_date"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                    var url_data_y = '<?=site_url("admin/test_get_sheet_data_by_date"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                    var url_chartName_x = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                    var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                    var categories_x = '<?=site_url("admin/get_sheet_categories_by_date"); ?>'+'/'+sheetname;
                    var chart_html = 'chart_'+i+'_'+chart_idx;
                    retrieving_data(url_data_x,url_data_y,url_chartName_x,url_chartName_y,categories_x,chart_html);

                }
            }
            */
    */

            /*
            function accessibility_chart(sheetname){
                    var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
                    var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
                    $.getJSON(url_data_y, function(data_y){
                        //alert(data);
                        $.getJSON(url_data_x, function(data_x){
                        //alert(data);
                        var chart_1 = new Highcharts.Chart({
                            chart: {
                                renderTo: 'chart_1',
                                zoomType: 'xy'
                            },
                            title: {
                                text: 'CSSR CS(%)'
                            },
                            xAxis: [{

                            }],
                            yAxis: [{
                                title: {
                                    text: 'CSSR CS(%)'
                                }
                            }, {
                                title: {
                                    text: 'CS FAIL'
                                },
                                opposite: true
                            }],
                            legend: {
                                shadow: false
                            },
                            tooltip: {
                                shared: true
                            },
                            plotOptions: {
                                column: {
                                    grouping: false
                                }
                            },
                            series: [{
                                name: 'CSSR CS(%)',
                                data: data_y
                            },
                             {
                                name: 'CS Fail',
                                type: 'column',
                                data: data_x,
                                 yAxis: 1
                                     }]
                        });

                    });

                    });
                

                    var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
                    var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
                        $.getJSON(url_data_y, function(data_y){
                            //alert(data);
                            $.getJSON(url_data_x, function(data_x){
                            //alert(data);
                            var chart_2 = new Highcharts.Chart({
                                chart: {
                                    renderTo: 'chart_2',
                                    zoomType: 'xy'
                                },
                                title: {
                                    text: 'CSSR PS(%)'
                                },
                                xAxis: [{

                                }],
                                yAxis: [{
                                    title: {
                                        text: 'CSSR PS(%)'
                                    }
                                }, {
                                    title: {
                                        text: 'CSSR FAIL'
                                    },
                                    opposite: true
                                }],
                                legend: {
                                    shadow: false
                                },
                                tooltip: {
                                    shared: true
                                },
                                plotOptions: {
                                    column: {
                                        grouping: false
                                    }
                                },
                                series: [{
                                    name: 'CSSR PS(%)',
                                    data: data_y
                                },
                                 {
                                    name: 'CS Fail',
                                    type: 'column',
                                    data: data_x,
                                     yAxis: 1
                                         }]
                            });

                        });

                        });
                    

                    var url_data_x = '<?=site_url("admin/get_chart_index_by_name/Fail_CS"); ?>'+'/'+sheetname;
                    var url_data_y = '<?=site_url("admin/get_data_by_option/3"); ?>'+'/'+sheetname;
                        $.getJSON(url_data_y, function(data_y){
                            //alert(data);
                            $.getJSON(url_data_x, function(data_x){
                            //alert(data);
                            var chart_3 = new Highcharts.Chart({
                                chart: {
                                    renderTo: 'chart_3',
                                    zoomType: 'xy'
                                },
                                title: {
                                    text: 'CSSR HSDPA(%)'
                                },
                                xAxis: [{

                                }],
                                yAxis: [{
                                    title: {
                                        text: 'CSSR HSDPA(%)'
                                    }
                                }, {
                                    title: {
                                        text: 'CSSR HSDPA'
                                    },
                                    opposite: true
                                }],
                                legend: {
                                    shadow: false
                                },
                                tooltip: {
                                    shared: true
                                },
                                plotOptions: {
                                    column: {
                                        grouping: false
                                    }
                                },
                                series: [{
                                    name: 'CSSR HSDPA(%)',
                                    data: data_y
                                },
                                 {
                                    name: 'CS Fail',
                                    type: 'column',
                                    data: data_x,
                                     yAxis: 1
                                         }]
                            });
                                //$(".loading-data").fadeOut(1500).hide();
                                
                        });
                    
                    });
            }

            function visualisation(sheetname,chart_type){
                //var chart_type = ['accessibility','retainability','mobility','traffic','throughput','hsupa','extra'];

                switch (chart_type) {
                    case 'accessibility':
                        do_visualisation();
                        break;
                    case 'retainability':
                        do_visualisation();
                        break;
                    case 'mobility':
                        do_visualisation();
                        break;
                    case 'traffic':
                        do_visualisation();
                        break;
                    case 'throughput':
                        do_visualisation();
                        break;
                    case 'hsupa':
                        do_visualisation();
                        break;
                    case 'extra':
                        do_visualisation();
                        break;
                }
            }





*/
    
}