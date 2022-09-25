<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends ZT_Controller{
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
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
        }
        function index(){
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Dashboard';
                $this->zettatech->_render_backend('index', $data);
        }
        
}
