<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Refund_policy extends ZT_Controller{
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
                $zetta_language = $this->session->userdata('zetta_language') ? $this->session->userdata('zetta_language') : 'english';
                $this->lang->load('zetta', $zetta_language);
        }
        function index(){
                $data['refund_policy'] = $this->zettatech->get('refund_policy')->row_array();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $this->lang->line('refund_policy_title');
                $this->zettatech->_render_frontend('index', $data);
        }
        function edit($Language = 'english'){
                if(!$this->ion_auth->logged_in()){
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $this->form_validation->set_rules('refund_policy_'.$Language, 'Refund Policy', 'required');
                if ($this->form_validation->run() == true)
                {
                    $values = array(
                        $Language   => $this->input->post('refund_policy_'.$Language)
                    );
                    $where= array('id' => 1);
                    $this->zettatech->update('refund_policy',$values,$where);
                    $this->session->set_flashdata('message','Your Refund Policy is updated.');
                    redirect(uri_string(), 'refresh');
                }
                $data['Language'] = $Language;
                $data['refund_policy'] = $this->zettatech->get('refund_policy')->row_array();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Edit Refund Policy';
                $this->zettatech->_render_backend('edit', $data);
        }
}
