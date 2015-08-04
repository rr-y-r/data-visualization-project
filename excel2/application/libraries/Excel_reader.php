<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');  
ini_set('max_execution_time', 900);

require_once APPPATH."/third_party/excel_reader/php-excel-reader/excel_reader2.php";
require APPPATH."/third_party/excel_reader/SpreadsheetReader.php";


class Excel_reader extends Spreadsheet_Excel_Reader {
    public function __construct() {
        parent::__construct();
    }
}