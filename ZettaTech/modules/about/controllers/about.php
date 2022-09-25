<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends ZT_Controller{
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
                $data['why_chooses'] = $this->zettatech->get('why_chooses')->result_array();
                $data['origins_and_story'] = $this->zettatech->get('origins_and_story')->row_array();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $this->lang->line('menu_about_us');
                $this->zettatech->_render_frontend('index', $data);
        }
        function origins_and_story($Language = 'english'){
                if(!$this->ion_auth->logged_in()){
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $this->form_validation->set_rules('origins_and_story_'.$Language, 'Our Origins and Story', 'required');
                if ($this->form_validation->run() == true)
                {
                    $values = array(
                        $Language   => $this->input->post('origins_and_story_'.$Language)
                    );
                    $where= array('id' => 1);
                    $this->zettatech->update('origins_and_story',$values,$where);
                    $this->session->set_flashdata('message','Our Origins and Story is updated.');
                    redirect(uri_string(), 'refresh');
                }
                $data['Language'] = $Language;
                $data['origins_and_story'] = $this->zettatech->get('origins_and_story')->row_array();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Edit Our Origins and Story';
                $this->zettatech->_render_backend('origins_and_story', $data);
        }
}
