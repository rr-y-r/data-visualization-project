<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Datamodel');
        
    }
    
    public function get_sql_header($sheetname){
        if($sheetname == 'RNC Daily' || $sheetname == 'rnc_daily' ){
            $sql_header = array(
              'RNCName'
              ,'Date'
              ,'RRC_Failure_Rate'
              ,'CSSR_CS'
              ,'CSSR_PS'
              ,'CSSR_HSDPA'
              ,'CSSR_HSUPA'
              ,'CCSR_CS'
              ,'CCSR_PS'
              ,'CCSR_HSDPA'
              ,'CCSR_HSUPA'         
              ,'ISHO_SR'            
              ,'SHO_SR'           
              ,'IFHO_SR'
              ,'SHO_Overhead'
              ,'Cell_PS_DL_throughputkbps'
              ,'Cell_PS_UL_throughputkbps'
              ,'HSDPA_User_throughputkbps'   
              ,'HSUPA_User_Throughputkbps'   
              ,'PS_DL_payloadMbytes'  
              ,'PS_UL_payloadmbytes'         
              ,'HSDPA_PayloadMbytes'         
              ,'HSUPA_payloadMbytes'         
              ,'Average_CQI'      
              ,'Availability'     
              ,'RRC_Failure_Rate_Nom'        
              ,'RRC_Failure_Rate_Den'        
              ,'CSSR_CS_Nom'      
              ,'CSSR_CS_Den'      
              ,'CSSR_PS_Nom'      
              ,'CSSR_PS_Den'      
              ,'CSSR_HSDPA_Nom'   
              ,'CSSR_HSDPA_Den'   
              ,'CSSR_HSUPA_Nom'   
              ,'CSSR_HSUPA_Den'   
              ,'CCSR_CS_Nom'      
              ,'CCSR_CS_Den'      
              ,'CCSR_PS_Nom'      
              ,'CCSR_PS_Den'      
              ,'CCSR_HSDPA_Nom'   
              ,'CCSR_HSDPA_Den'   
              ,'CCSR_HSUPA_Nom'   
              ,'CCSR_HSUPA_Den'   
              ,'ISHO_SR_Nom'      
              ,'ISHO_SR_Den'      
              ,'SHO_SR_Nom'       
              ,'SHO_SR_Den'       
              ,'IFHO_SR_Nom'      
              ,'IFHO_SR_Den'      
              ,'Traffic_Voice'    
              ,'Traffic_Video'    
              ,'Fail_CS'          
              ,'Fail_PS'          
              ,'Fail_HSDPA'       
              ,'Fail_HUSPA'       
              ,'ISHO_FAIL'        
              ,'SHO_FAIL'         
              ,'IFHO_FAIL'
              ,'SHO_Overhead_Nom' 
              ,'SHO_Overhead_Den' 
              ,'Average_CQI_Nom'
              ,'Average_CQI_Den'        
            );
        }
        if($sheetname == 'RNC Hourly' || $sheetname == 'rnc_hourly'){
            $sql_header = array(  
            'RNCName','Date'                           
              ,'Time'                          
              ,'RRC_Failure_Rate'   
              ,'CSSR_CS'            
              ,'CSSR_PS'            
              ,'CSSR_HSDPA'         
              ,'CSSR_HSUPA'         
              ,'CCSR_CS'            
              ,'CCSR_PS'            
              ,'CCSR_HSDPA'         
              ,'CCSR_HSUPA'         
              ,'ISHO_SR'            
              ,'SHO_SR'           
              ,'IFHO_SR'
              ,'SHO_Overhead'
              ,'Cell_PS_DL_throughputkbps'
              ,'Cell_PS_UL_throughputkbps'
              ,'HSDPA_User_throughputkbps'   
              ,'HSUPA_User_Throughputkbps'   
              ,'PS_DL_payloadMbytes'  
              ,'PS_UL_payloadmbytes'         
              ,'HSDPA_PayloadMbytes'         
              ,'HSUPA_payloadMbytes'         
              ,'Average_CQI'      
              ,'Availability'     
              ,'RRC_Failure_Rate_Nom'        
              ,'RRC_Failure_Rate_Den'        
              ,'CSSR_CS_Nom'      
              ,'CSSR_CS_Den'      
              ,'CSSR_PS_Nom'      
              ,'CSSR_PS_Den'      
              ,'CSSR_HSDPA_Nom'   
              ,'CSSR_HSDPA_Den'   
              ,'CSSR_HSUPA_Nom'   
              ,'CSSR_HSUPA_Den'   
              ,'CCSR_CS_Nom'      
              ,'CCSR_CS_Den'      
              ,'CCSR_PS_Nom'      
              ,'CCSR_PS_Den'      
              ,'CCSR_HSDPA_Nom'   
              ,'CCSR_HSDPA_Den'   
              ,'CCSR_HSUPA_Nom'   
              ,'CCSR_HSUPA_Den'   
              ,'ISHO_SR_Nom'      
              ,'ISHO_SR_Den'      
              ,'SHO_SR_Nom'       
              ,'SHO_SR_Den'       
              ,'IFHO_SR_Nom'      
              ,'IFHO_SR_Den'      
              ,'Traffic_Voice'    
              ,'Traffic_Video'    
              ,'Fail_CS'          
              ,'Fail_PS'          
              ,'Fail_HSDPA'       
              ,'Fail_HUSPA'       
              ,'ISHO_FAIL'        
              ,'SHO_FAIL'         
              ,'IFHO_FAIL'        
                );
        }
        if($sheetname == 'Regional Daily' || $sheetname == 'regional_daily'){
            $sql_header = array('Regional','Date','RRC_Failure_Rate','CSSR_CS','CSSR_PS','CSSR_HSDPA','CSSR_HSUPA','CCSR_CS','CCSR_PS','CCSR_HSDPA','CCSR_HSUPA','ISHO_SR','SHO_SR','IFHO_SR','SHO_Overhead','Cell_PS_DL_throughput','Cell_PS_UL_throughput','HSDPA_User_throughput','HSUPA_User_Throughput','PS_DL_payload','PS_UL_payload','HSDPA_Payload','HSUPA_payload','Average_CQI','Availability','RRC_Failure_Rate_Nom','RRC_Failure_Rate_Den','CSSR_CS_Nom','CSSR_CS_Den','CSSR_PS_Nom','CSSR_PS_Den','CSSR_HSDPA_Nom','CSSR_HSDPA_Den','CSSR_HSUPA_Nom','CSSR_HSUPA_Den','CCSR_CS_Nom','CCSR_CS_Den','CCSR_PS_Nom','CCSR_PS_Den','CCSR_HSDPA_Nom','CCSR_HSDPA_Den','CCSR_HSUPA_Nom','CCSR_HSUPA_Den','ISHO_SR_Nom','ISHO_SR_Den','SHO_SR_Nom','SHO_SR_Den','IFHO_SR_Nom','IFHO_SR_Den','Traffic_Voice','Traffic_Video','Fail_CS','Fail_PS','Fail_HSDPA','Fail_HUSPA','ISHO_FAIL','SHO_FAIL','IFHO_FAIL');
        }
        
        return $sql_header;
    }
    
    function upload(){
        $this->load->view('upload_form', array('error' => ' ' ));
    }
    
    public function doupload(){

        $config['upload_path'] = './data_temp/';
		$config['allowed_types'] = 'csv|xlsm';
        $config['file_name'] = 'dataset';


		$this->load->library('upload', $config);
        
        var_dump($this->upload->do_upload());

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
            
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
		}
        
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
    
    public function get_data_converted(){
        $data = $this->get_sql_header('Regional Daily');
        $this->load->view('test',array('data_test' => $data));
    }
    
    public function do_conversion(){
        $sheet_arr = array('RNC Daily','Regional Daily','RNC Hourly');
        $tab_arr = array('rnc_daily','regional_daily','rnc_hourly');
        
        for($arr=0;$arr<3;$arr++){
            
            $convert = null;
            $convert = $this->data_conversion(
                $sheet_arr[$arr]
                ,$tab_arr[$arr]
                ,$this->get_sheet_index($sheet_arr[$arr])
                                         );
            $convert = null;
        }
        
    }
    
    public function get_sheet_index($sheetname){
        switch ($sheetname) {
            case 'RNC Daily':
                $sheetindex = 4;
                return $sheetindex;
                break;
            case 'Regional Daily':
                $sheetindex = 2;
                return $sheetindex;
                break;
            case 'RNC Hourly':
                $sheetindex = 5;
                return $sheetindex;
                break;
            case 'rnc_daily':
                $sheetindex = 4;
                return $sheetindex;
                break;
            case 'regional_daily':
                $sheetindex = 2;
                return $sheetindex;
                break;
            case 'rnc_hourly':
                $sheetindex = 5;
                return $sheetindex;
                break;
        }
    }
    
    public function chart(){
        $this->load->view('chart');
    }
    
    public function reader_conf($sheetindex){
        $this->load->library('Excel_reader');
        $Reader = new SpreadsheetReader("./data_temp/dataset.xlsm",false);
        $Reader -> ChangeSheet($sheetindex);
        
        return $Reader;
    }

    function get_col_name($row_index,$sheetname){

       $sheetindex = $this->get_sheet_index($sheetname);
        
       $Reader = $this->reader_conf($sheetindex);

       $col_name = null;
        
        //$sql_header = $this->get_sql_header($sheetname);
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {

                if ($index == 0 && $row == $row_index) 
                {
                    
                    $col_name = $data_val;
                } 
                
            }

        }
        
        echo json_encode($col_name);
    }

    function get_sheet_date($sheetname){
        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
                
                if ($index == 0) 
                {
                    //$header[$row] = $data_val;
                } elseif ($colindex == $row) {
                    $arr_data[] = $data_val;
                }
            }

        }
        echo json_encode($arr_data);
    }
    
    function get_chart_index_by_name($colname,$sheetname){
        $sheetindex = $this->get_sheet_index('regional_daily');
        $Reader = $this->reader_conf($sheetindex);
        $sql_header = $this->get_sql_header($sheetname);
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {  
                if ($index == 0) 
                {
                    $header[$row] = $data_val;
                     
                } elseif($sql_header[$row] == $colname) {
                    $arr_data[] = $data_val;
                }
            }

        }
        echo json_encode($arr_data);
       
    }
    
    public function get_data_by_option($colindex,$sheetname){
        $sheetindex = $this->get_sheet_index($sheetname);
        
        $Reader = $this->reader_conf($sheetindex);
        
        //$sql_header = $this->get_sql_header($sheetname);

        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
                
                if ($index == 0) 
                {
                    //$header[$row] = $data_val;
                } elseif ($colindex == $row) {
                    $arr_data[] = $data_val;
                }
            }

        }
        echo json_encode($arr_data);

    }
    
    private function json_response($successful, $message){
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        )); 
    }
}
    
   