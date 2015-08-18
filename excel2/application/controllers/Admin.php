<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

    private $data_file_conf;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Datamodel');

        $this->data_file_conf = "./data_temp/dataset.xlsm";
    }


    public function set_file_conf($value){
      $this->data_file_conf = $value;
      return $this->data_file_conf;
    }
 

    public function json_response($successful, $message){
        echo json_encode(array(
            'isSuccessful' => $successful,
            'message' => $message
        )); 
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

    function get_file_list(){
      $dir = './data_temp/';

      date_default_timezone_set("Asia/Jakarta"); 

      $timezone = date_default_timezone_get();
      $date = date('(d,M)h-i-s', time());

      $arr_data;

      if (is_dir($dir)){
        if ($dh = opendir($dir)){
          while (($file = readdir($dh)) !== false){
            $arr_data[] = $file;
          }
          closedir($dh);
        }
      }
        return $arr_data;
    }
    
    public function doupload(){

        date_default_timezone_set("Asia/Jakarta"); 

        $timezone = date_default_timezone_get();
        $date_file_name = date('(d,M)h-i-s', time());


        $config['upload_path'] = './data_temp/';
		    $config['allowed_types'] = 'csv|xlsm';
        $config['file_name'] = 'dataset'.$date_file_name;


		$this->load->library('upload', $config);
        
        //var_dump($this->upload->do_upload());
        
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
/*
    if (! $this->upload->do_upload()) 
            {
                $message = "Data user berhasil ditambahakan !";
                //$error = array('error' => $this->upload->display_errors());
                $this->json_response(TRUE, $message);
            } 
            else 
            {
                $message = "file successfuly uploaded";
                $this->json_response(FALSE, $message);
            }
            */
        
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
        $file_list_array = $this->get_file_list();
        $this->load->view('chart',array('file_list' => $this->get_file_list()));
    }
    
    public function reader_conf($sheetindex){
        $this->load->library('Excel_reader');
        $Reader = new SpreadsheetReader($this->data_file_conf,false);
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


    //date on col 2
    
    function get_sheet_date($sheetname){
        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
               if ($row == 1) {
                    $date = str_replace('-','/',$data_val);
                    $arr_data[] = date("m/d/Y",strtotime($date));
                    //$arr_data[] = $data_val;
                }
            }
        }
        //get data_tanggal 
        echo json_encode($arr_data);
    }


    function test_get_sheet_data_by_date($colindex,$sheetname){

        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        $startDate = date("m/d/Y",strtotime($this->input->get('startDate')));
        $endDate = date("m/d/Y",strtotime($this->input->get('endDate')));

        $flag = false;

        $arr_data;
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
              if($index > 0){
                //$arr_data[]=$value[1];
                $date = str_replace('-','/',$value[1]);
                $temp = date("m/d/Y",strtotime($date));
                $flag = false;
                if($temp >= $startDate and $temp <= $endDate){
                  $flag = true;
                }

                if($flag==true){
                    if ($colindex == $row) {
                      $arr_data[] = $data_val;
                  }
                }
              }
               
            }
        }
        //get data_tanggal 
        echo json_encode($arr_data);
    }

    function get_sheet_categories_by_date($sheetname){

        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        $startDate = date("m/d/Y",strtotime($this->input->get('startDate')));
        $endDate = date("m/d/Y",strtotime($this->input->get('endDate')));

        $flag = false;

        $arr_data;
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
              if($index > 0){
                //$arr_data[]=$value[1];
                $date = str_replace('-','/',$value[1]);
                $temp = date("m/d/Y",strtotime($date));
                $flag = false;
                if($temp >= $startDate and $temp <= $endDate){
                  $flag = true;
                }

                if($flag==true){
                    if ($row == 1) {
                      $data_date = str_replace('-','/',$data_val);
                      $arr_data[] = date("d/M",strtotime($data_date));
                  }
                }
              }
               
            }
        }
        //get data_tanggal 
        echo json_encode($arr_data);
    }

    function get_sheet_time_categories_by_date($sheetname){

        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        $startDate = date("m/d/Y",strtotime($this->input->get('startDate')));
        $endDate = date("m/d/Y",strtotime($this->input->get('endDate')));

        $flag = false;

        $arr_data;
        $date_val;
        $hour_val;
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
              if($index > 0){
                //$arr_data[]=$value[1];
                $date = str_replace('-','/',$value[1]);
                $temp = date("m/d/Y",strtotime($date));
                $flag = false;
                if($temp >= $startDate and $temp <= $endDate){
                  $flag = true;
                }

                if($flag==true){
                  if ($row == 1) {
                      $data_date = str_replace('-','/',$data_val);
                      //$arr_data[] = date("d/M/y",strtotime($data_date));
                      $date_val[] = date("d/M",strtotime($data_date));
                  }
                    if ($row == 2) {
                      //$data_date = str_replace('-','/',$data_val);
                      //$arr_data[] = date("d/M/y",strtotime($data_date));
                      $hour_val[] = $data_val;
                  }
                }
              }
               
            }
        }

        for($i=0;$i<count($date_val);$i++){
          $arr_data[] = $date_val[$i].' - '.$hour_val[$i];
        }

        //$arr_data = $date_val.$hour_val;
        //get data_tanggal 
        echo json_encode($arr_data);
    }
    

    function get_sheet_data_by_date($sheetname){

        $sheetindex = $this->get_sheet_index($sheetname);
        $Reader = $this->reader_conf($sheetindex);

        $startDate = date("m/d/Y",strtotime($this->input->get('startDate')));
        $endDate = date("m/d/Y",strtotime($this->input->get('endDate')));
        
        foreach ($Reader as $index => $value)
        {
            foreach($value as $row => $data_val)
            {
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
        //get data_tanggal 
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



    public function TEST_get_data_by_option($colindex,$sheetname,$flag,$start,$end){
        $sheetindex = $this->get_sheet_index($sheetname);
        
        $Reader = $this->reader_conf($sheetindex);
        
        //$sql_header = $this->get_sql_header($sheetname);

        if($flag){
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
        }else{
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
    

}
    
   