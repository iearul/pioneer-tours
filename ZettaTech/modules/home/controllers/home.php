<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends ZT_Controller{
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     16/08/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
        function __construct()
	{
		parent::__construct();
                $zetta_language = $this->session->userdata('zetta_language');
                $this->lang->load('zetta', $zetta_language);
        }
        function index(){
                $this->zettatech->where(array('featured' => 1));
                $data['tours'] = $this->zettatech->get('tours')->result_array();
                $this->db->group_by('tour');
                $tour_images = $this->zettatech->get('tour_images')->result();
                $data['tour_images'] = array();
                foreach ($tour_images as $tour_image){
                    $data['tour_images'][$tour_image->tour] = $tour_image->image;
                }
                $data['sliders'] = $this->zettatech->get('sliders')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = "Vatican Museum, Sistine Chapel & Saint Peter's Guided Tour";
                $this->zettatech->_render_frontend('index', $data);
        }
        
        function setLanguage(){
                $language = $this->input->post('language');
                $this->session->set_userdata('zetta_language', $language);
        }
}
