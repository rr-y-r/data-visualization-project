
<? $this->load->view('includes/header');?>
<? $this->load->view('includes/navbar');?>

	<body>
        <div class="loading-data" align="center">
            <div class="col-md-offset-5 align-center">

            </div>
            <span class="load-screen center glyphicon glyphicon-cog gly-spin"></span>
                <span class="load-text" id="load-text"><center>Retrieving and Converting Data from Server</center></span>
                <span class="loading-p" id="loading-p-text"><center>this may take a while, do not close this tab.</center></span>
            </div>
            <!-- 
        <a class="glyphicon glyphicon-cog menu-toggle pull-right" data-toggle="modal" data-target="#apps_option"></a>
                
-->
    <div class="container">

	   <div class="row clearfix" align="center">
       <div class="modal fade" id="apps_option" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Chart Option</h4>
              </div>
              <div class="modal-body">
                 <div class="align-center">

                    <div class="form-group">
                         <label>Data File Option</label>
                         <select class="form-control file_option">
                            <? foreach($file_list as $row): ?>
                                <option value="<?=$row;?>"><?=$row;?></option>
                            <? endforeach; ?>
                        </select>
                         <br>
                    </div>

                    <div class="form-group">
                         <label>Data Option</label>
                         <select class="form-control sheet_option">
                             <option value="regional_daily">Regional Daily</option>
                             <option value="rnc_daily">RNC Daily</option>
                             <option value="rnc_hourly">RNC Hourly</option>
                        </select>
                         <br>
                    </div>

                    <div class="form-group col-md-6 sheet_conf hidden" align="left">
                    <label>Start Date</label>
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <input type="text" class="startDate_input" name"startDate_input" value="10/24/1984"/>
                    </div>
                    <div class="form-group col-md-6 sheet_conf hidden" align="right">
                        <label>End Date</label>
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <input type="text" class="endDate_input" name"endDate_input" value="10/24/1984"/>
                    </div>
                    <br>
                    <br>
                    <br>
                </div> 
                <hr>
                <div class="checkbox" align="left">
                <label>
                  <input type="checkbox" id="uploadFileCheck"> Check Here if you want to replace the data
                </label>
              </div>
                  
                    <form action="<?=site_url('admin/doupload/'); ?>" id="uploadFileDataForm" method="post" enctype="multipart/form-data">
                        <p>*Currently support reading 1 raw excel file. <br>Doing upload file means REPLACING current dataset and file in the server
                  </p>
                        Select Data to upload:
                    <input type="file" id="datafileform"class="form-control" size="20" accept=".csv,application/vnd.ms-excel,application/msexcel,
                      application/x-msexcel,
                      application/x-ms-excel,
                      application/x-excel,
                      application/x-dos_ms_excel,
                      application/xls,
                      application/x-xls,
                      application/excel,
                      application/download,
                      application/vnd.ms-office,
                      application/msword,
                        application/vnd.ms-excel.sheet.macroenabled.12" name="userfile">

                    <br /><br />

                    <button type="submit" class="btn btn-primary btn-sm">upload file</button>

                    </form>

                      
                  
                </form>
              </div>
              <div class="modal-footer">
              <button type="button" class="opt-apply btn btn-success btn-large">Set Data Option</button>
              </div>
               </div>
            </div>
          </div>

            <br>
            <h3>accessibility</h3>
            <hr>
            <br>
            <div id="chart_0_0"><span class="render-chart_chart_0_0 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_0"><span class="render-chart_chart_1_0 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_0"><span class="render-chart_chart_2_0 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
            <br>
            <hr>
            <h3>retainability</h3>
            <hr>
            <br>
            <div id="chart_0_1"><span class="render-chart_chart_0_1 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_1"><span class="render-chart_chart_1_1 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_1"><span class="render-chart_chart_2_1 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
            <br>
            <hr>
            <h3>mobility</h3>
            <hr>
            <br>
            <div id="chart_0_2"><span class="render-chart_chart_0_2 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_2"><span class="render-chart_chart_1_2 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_2"><span class="render-chart_chart_2_2 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
            <br>
            <hr>
            <h3>traffic</h3>
            <hr>
            <br>
            <div id="chart_0_3"><span class="render-chart_chart_0_3 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_3"><span class="render-chart_chart_1_3 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_3"><span class="render-chart_chart_2_3 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
            <br>
            <hr>
            <h3>throughput</h3>
            <hr>
            <br>
            <div id="chart_0_4"><span class="render-chart_chart_0_4 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_4"><span class="render-chart_chart_1_4 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_4"><span class="render-chart_chart_2_4 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
            <br>
            <hr>
            <h3>hsupa</h3>
            <hr>
            <br>
            <div id="chart_0_5"><span class="render-chart_chart_0_5 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_1_5"><span class="render-chart_chart_1_5 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <div id="chart_2_5"><span class="render-chart_chart_2_5 glyphicon glyphicon-repeat gly-spin center"></span></div>
            <br>
    </div>
</div>    
    
        

<script src="<?=base_url('assets/chart_api/js/highcharts.js'); ?>"></script>
<!--<script src="<? //=base_url('assets/chart_api/js/modules/exporting.js');?>"></script>-->
<script type="text/javascript">
        
        $(function () {



            $('#uploadFileDataForm').hide();
            $('#uploadFileCheck').click(function(){
                var uploadNewData = $('#uploadFileCheck').is(":checked");
                if(uploadNewData){
                    $('#uploadFileDataForm').show();
                }else{
                    $('#uploadFileDataForm').hide();
                }
            });
            

            $(".loading-data").fadeOut(1500).hide();

            


            var init_sheetname = 'regional_daily';
            var url_getDate = '<?=site_url("admin/get_sheet_date"); ?>'+'/'+init_sheetname;
            var newDate = [];

            var flag=false;
            $('.opt-apply').attr('disabled','disabled');
            $('.sheet_option').attr('disabled','disabled');
            $('.sheet_conf').attr('disabled','disabled');
            $.getJSON(url_getDate).always(function(data_date){
                //alert(data_date);

                $.each(data_date, function(i, el){
                    if($.inArray(el, newDate) === -1) newDate.push(el);
                });

                
            //test_get_data_date(sheetname,newDate[1],newDate[newDate.length - 1]);
                init_startDate = newDate[1];
                init_endDate = newDate[newDate.length - 1];
                visualisation_by_sheetname(init_sheetname);
                $('.opt-apply').removeAttr('disabled');
                $('.sheet_option').removeAttr('disabled');
                $('.sheet_conf').removeAttr('disabled');
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
                    

            });

            $('.opt-apply').click(function(){
                
                init_startDate = $('.startDate_input').val();
                init_endDate = $('.endDate_input').val();

                //alert($('.sheet_option').val());

                visualisation_by_sheetname($('.sheet_option').val());
            });



            function test_get_sheet_data_by_date(sheetname,startDate,endDate){

                var url_getDate = '<?=site_url("admin/test_get_sheet_data_by_date"); ?>'+'/'+sheetname+'?startDate='+String(startDate)+'&endDate='+String(endDate);
                //var newDate = [];
                //alert('startDate passing -> '+String(startDate));
                //alert('endDate passing -> '+String(endDate));

                $.getJSON(url_getDate).always(function(data_date){
                   alert(data_date);
                });
            }

            function get_data_time(sheetname){
                //on rnc hourly
                var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                var newDate = [];
                $.getJSON(url_data_x).always(function(data_y){
                    //alert(data_y);
                    //get_time_by_range(input1,input2,);
                    //var names = ["Mike","Matt","Nancy","Adam","Jenny","Nancy","Carl"];
                    
                    $.each(data_y, function(i, el){
                        if($.inArray(el, newDate) === -1) newDate.push(el);
                    });
                });

                alert(newDate);


            }

            function get_time_by_range(date_start,date_end,time_start,time_end){
                $.getJSON(url_data_x).always(function(data_y){
                    
                });
            }

            function visualisation_by_sheetname(sheetname){

                var chart_type = ['accessibility','retainability','mobility','traffic','throughput','hsupa'];

                //alert(chart_type.length);

                switch(sheetname){
                    case 'regional_daily':
                        $.each(chart_type, function(key,val){                            
                            test_do_visualisation(sheetname,val,key);
                            //do_visualisation(sheetname,val,key);
                        });

                        break;

                    case 'rnc_daily':
                        $.each(chart_type, function(key,val){                            
                            test_do_visualisation(sheetname,val,key);
                            //do_visualisation(sheetname,val,key);
                        });
                        break;

                    case 'rnc_hourly':
                        $.each(chart_type, function(key,val){                            
                            test_do_visualisation(sheetname,val,key);
                            //do_visualisation(sheetname,val,key);
                        });
                        break;
                }

            }


            function test_do_visualisation(sheetname,chart_title,chart_idx){

                if(sheetname == 'regional_daily'){
                    switch (chart_title) {
                        case 'accessibility':
                            idx_x=[51,52,53];
                            idx_y=[3,4,5];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                        case 'retainability':
                            idx_x=[27,29,31];
                            idx_y=[3,4,5];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                        case 'mobility':
                            idx_x=[56,55,57];
                            idx_y=[12,11,13];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                        case 'traffic':
                            //chart_title=[20,'PS DL payload(Mbytes) vs PS UL payload(Mbytes)',21];
                            idx_x=[0,20,0];
                            //trafic voice, ps dl payload, hsdpa payload
                            idx_y=[49,19,21];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                        case 'throughput':
                            //idx_x;
                            //chart_title=[15,17,18];
                            idx_y=[0,0,0,]
                            idx_x=[15,17,18];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                        case 'hsupa':
                            idx_x=[54,33,0];
                            idx_y=[6,6,22];
                            test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                            break;
                            /*
                        case 'extra':
                            idx_x=;
                            idx_y=0;
                            break;
                            */
                        }
                    }if(sheetname == 'rnc_daily'){
                        switch (chart_title) {
                            case 'accessibility':
                                idx_x=[51,52,53];
                                idx_y=[3,4,5];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'retainability':
                                idx_x=[27,29,31];
                                idx_y=[3,4,5];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'mobility':
                                idx_x=[56,55,57];
                                idx_y=[12,11,13];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'traffic':
                                //chart_title=[20,'PS DL payload(Mbytes) vs PS UL payload(Mbytes)',21];
                                idx_x=[0,20,0];
                                //trafic voice, ps dl payload, hsdpa payload
                                idx_y=[49,19,21];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'throughput':
                                //idx_x;
                                //chart_title=[15,17,18];
                                idx_y=[0,0,0,]
                                idx_x=[15,17,18];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'hsupa':
                                idx_x=[54,33,0];
                                idx_y=[6,6,22];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                                /*
                            case 'extra':
                                idx_x=;
                                idx_y=0;
                                break;
                                */
                        }

                    }
                    if(sheetname == 'rnc_hourly'){
                        switch (chart_title) {
                            case 'accessibility':
                                idx_x=[52,53,54];
                                idx_y=[4,5,6];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'retainability':
                                idx_x=[28,30,32];
                                idx_y=[3,4,5];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'mobility':
                                idx_x=[57,56,58];
                                idx_y=[13,12,14];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'traffic':
                                //chart_title=[20,'PS DL payload(Mbytes) vs PS UL payload(Mbytes)',21];
                                idx_x=[0,21,0];
                                //trafic voice, ps dl payload, hsdpa payload
                                idx_y=[50,20,22];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'throughput':
                                //idx_x;
                                //chart_title=[15,17,18];
                                idx_y=[0,0,0,]
                                idx_x=[16,18,19];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                            case 'hsupa':
                                idx_x=[55,34,0];
                                idx_y=[7,7,23];
                                test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,init_startDate,init_endDate);
                                break;
                                /*
                            case 'extra':
                                idx_x=;
                                idx_y=0;
                                break;
                                */
                        }

                    }
                
                
            } 
 
            
            function test_draw_chart(chart_title,idx_x,idx_y,sheetname,chart_idx,startDate,endDate){
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
                    var url_data_x = '<?=site_url("admin/test_get_sheet_data_by_date"); ?>'+'/'+idx_x[i]+'/'+sheetname+'?startDate='+String(startDate)+'&endDate='+String(endDate);
                    var url_data_y = '<?=site_url("admin/test_get_sheet_data_by_date"); ?>'+'/'+idx_y[i]+'/'+sheetname+'?startDate='+String(startDate)+'&endDate='+String(endDate);
                    var url_chartName_x = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_x[i]+'/'+sheetname;
                    var url_chartName_y = '<?=site_url("admin/get_col_name"); ?>'+'/'+idx_y[i]+'/'+sheetname;
                    var categories_x = '<?=site_url("admin/get_sheet_categories_by_date"); ?>'+'/'+sheetname+'?startDate='+String(startDate)+'&endDate='+String(endDate);
                    if(sheetname=="rnc_hourly"){
                        categories_x = '<?=site_url("admin/get_sheet_time_categories_by_date"); ?>'+'/'+sheetname+'?startDate='+String(startDate)+'&endDate='+String(endDate);
                    }
                    var chart_html = 'chart_'+i+'_'+chart_idx;
                    retrieving_data(url_data_x,url_data_y,url_chartName_x,url_chartName_y,categories_x,chart_html);

                }
            }
            

            function retrieving_data(url_data_x,url_data_y,url_chartName_x,url_chartName_y,categories_x,chart_html){
                $('.render-chart'+chart_html).remove();
                document.getElementById(chart_html).innerHTML='<span class="render-chart_'+chart_html+' glyphicon glyphicon-repeat gly-spin center"></span>';
                $('.opt-apply').attr('disabled','disabled');
                $(".loading-data").fadeIn(1500).show();
                window.onbeforeunload = confirmExit;
                  function confirmExit()
                  {
                    return "The Data still on process by server, this may take a while because the raw file is big";
                  }
                $.getJSON(url_chartName_x).always(function(name_x){
                    
                        $.getJSON(url_data_y).always(function(data_x){

                            document.getElementById("load-text").innerHTML="<br>Getting:<br><i>"+name_x+"</i><br>Data From File<br>"; 
                            for (var i = 0; i < data_x.length; i++) {
                                        document.getElementById("loading-p-text").innerHTML="Current Row Value : <i>"+data_x[i]+"</i><br>"; 
                                    };
                            $.getJSON(url_data_x).always(function(data_y){
                                 
                                $.getJSON(url_chartName_y).always(function(name_y){
                                    
                                $.getJSON(categories_x).always(function(cat_xaxis){
                                    //console.log(chart_html);

                                    $('.render-chart'+chart_html).fadeOut(1500).remove();
                                        
                                        if(name_y == 'Regional'){
                                            name_y = '';
                                        }
                                        if(name_x == 'Regional'){
                                            name_x = '';


                                        }

                                        chart_html = new Highcharts.Chart({
                                            chart: {
                                                renderTo: chart_html,
                                                zoomType: 'xy'
                                            },

                                            title: {
                                                text: name_x
                                            },
                                            xAxis: [{
                                                categories: cat_xaxis
                                                
                                            }],
                                            yAxis: [{
                                                title: {
                                                    text: name_y
                                                    
                                                    
                                                }

                                            }, {
                                                //floor: 0,
                                                //max : 4500000000,
                                                
                                                title: {
                                                    text: name_x
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
                                            series: [

                                             {
                                                color: '#E74C3C',
                                                name: name_x,
                                                type: 'column',
                                                data: data_y,
                                                 yAxis: 1
                                                     },
                                            {
                                                name: name_y,
                                                data: data_x
                                            }]
                                        });
                                    
                                    });
                                    $(".loading-data").fadeOut(1500).hide();
                                    $('.opt-apply').removeAttr('disabled');
                                });
                            });
                        });
                    });
            }
            

            
            
            //accessibility_chart('regional_daily');
            //alert(loadTable());
            //do_visualisation('regional_daily','accessibility');

            //get_data_date('regional_daily');
            //test_get_data_date('regional_daily');

            // this one is working
            //visualisation_by_sheetname('regional_daily');
            $("#menu-toggle").click(function(e) {
                 e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
            $("#menu-toggle").click();

            
            
        });

        $(".applySetting").click(function(){
            //alert(document.getElementById('date_range_data').innerText);
            //visualisation_by_sheetname('regional_daily');
           // alert(init_startDate);
        });

        $( ".sheet_option" ).change(function () {
            var str = "";
            $( "select option:selected" ).each(function() {
              
              str += $( this ).text() + " ";
              //alert(str);

              
            });

            //console.log($( this ).val());
            
            if($( this ).val() != 'regional daily'){
                $(".sheet_conf").removeClass('hidden');
            }else{
                $(".sheet_conf").addClass('hidden');
            }
            //alert($( this ).val());
            if($( this ).val()  == "rnc_hourly"){
                //alert($( this ).val());
                  url_getDate = '<?=site_url("admin/get_sheet_date"); ?>'+'/rnc_hourly';
                 newDate = [];

                 flag=false;
                $('.opt-apply').attr('disabled','disabled');
                $('.sheet_option').attr('disabled','disabled');
                $('.sheet_conf').attr('disabled','disabled');
                $.getJSON(url_getDate).always(function(data_date){
                    //alert(data_date);

                    $.each(data_date, function(i, el){
                        if($.inArray(el, newDate) === -1) newDate.push(el);
                    });

                    
                //test_get_data_date(sheetname,newDate[1],newDate[newDate.length - 1]);
                    init_startDate = newDate[1];
                    init_endDate = newDate[newDate.length - 1];
                    $('.opt-apply').removeAttr('disabled');
                    $('.sheet_option').removeAttr('disabled');
                    $('.sheet_conf').removeAttr('disabled');
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

                });
                  }

            //$( "div" ).text( str );

            
          }).change();

          


		</script>


	</body>
</html>
