<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fileupdown extends ZT_Controller {
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @Created     19/03/2017
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
        function __construct()
	{
		parent::__construct();
                
        }
        
        /*
         * index() read Excel Files
         * For xlsx file use Excel2007
         * For xls  file use Excel5
         */
        public function file_upload(){
            $config['upload_path'] = './uploads/contents/';
            $config['allowed_types'] = '*';
            $config['max_size']	= '10000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')){
                $upload_data=$this->upload->data();
                $array['filelink'] = 'uploads/contents/'.$upload_data['file_name'];
                echo stripslashes(json_encode($array)); 
            }
        }
        public function image_upload(){
            $config['upload_path'] = './uploads/contents/';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']	= '10000';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if($this->upload->do_upload('file')){
                $upload_data=$this->upload->data();
                $array['filelink'] = base_url().'uploads/contents/'.$upload_data['file_name'];
                echo stripslashes(json_encode($array)); 
            }
        }
}