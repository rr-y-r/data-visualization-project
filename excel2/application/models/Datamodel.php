<?php

class DataModel extends CI_Model 
{
    function insert($data,$tabname){
        $this->db->insert($tabname,$data);
        
        return TRUE;
    }
    
    function get_data($tabname){
       return $this->db->get($tabname)->result_array();
        
        
    }

}
