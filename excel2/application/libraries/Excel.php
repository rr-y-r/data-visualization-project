<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  

ini_set('memory_limit','1024M');
ini_set('max_execution_time', 3000);
 
require_once APPPATH."/third_party/excel/Classes/PHPExcel.php";
class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}

class FilterReader implements PHPExcel_Reader_IReadFilter 
{ 
    private $_startRow = 0; 
    private $_endRow   = 0; 


    /**  Get the list of rows and columns to read  */ 
    public function __construct($startRow, $endRow) { 
        $this->_startRow = $startRow; 
        $this->_endRow   = $endRow; 

    } 

    public function readCell($column,$row, $worksheetName = '') { 
        //  Only read the rows and columns that were configured 
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) { 

            return true; 
            
        } 
        return false; 
    } 
} 

class chunkReadFilter implements PHPExcel_Reader_IReadFilter 
{ 
    private $_startRow = 0; 
    private $_endRow   = 0; 

    /**  Set the list of rows that we want to read  */ 
    public function setRows($startRow, $chunkSize) { 
        $this->_startRow = $startRow; 
        $this->_endRow   = $startRow + $chunkSize; 
    } 

    public function readCell($column, $row, $worksheetName = '') { 
        //  Only read the heading row, and the configured rows 
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) { 
            return true; 
        } 
        return false; 
    } 
} 
