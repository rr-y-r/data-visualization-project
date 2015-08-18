<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class FileConfHandler extends CI_Controller
{

	private $data_file = "./data_temp/dataset.xlsm";


    public function __set($data_file, $value)
    {
        $this->$data_file = $value;
    }

    public function __get($data_file) {
        return $this->$data_file;
    }

}