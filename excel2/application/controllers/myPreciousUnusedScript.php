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
    
}