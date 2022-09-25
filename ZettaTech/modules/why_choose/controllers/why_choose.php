<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Why_choose extends ZT_Controller{
        /**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     16/08/2019
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
        const VERSION = '2.2.0';
        const DEFAULT_ENDPOINT = 'https://api.securionpay.com';

        private $privateKey = 'sk_test_ky53tyL0wZw32pNOhLfIL91b';
        private $publicKey = 'pk_test_5VoM4hS0SA3XnXkCmKRrrk3V';


        private $userAgent = '';
        function __construct()
	{
		parent::__construct();
                $zetta_language = $this->session->userdata('zetta_language');
                $this->lang->load('zetta', $zetta_language);
        }
        function all(){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $data['why_chooses'] = $this->zettatech->get('why_chooses')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Why Choose US';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){ 
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                $this->form_validation->set_rules('t_english', 'English Title', 'required'); 
                if($this->form_validation->run() == true){                 
                    $values = array(
                        'url'               => $this->zettatech->url_check($this->input->post('t_english'), 'why_chooses'),
                        'icon'              => $this->input->post('icon'),
                        't_english'         => $this->input->post('t_english'),
                        't_italian'         => $this->input->post('t_italian'),
                        't_spanish'         => $this->input->post('t_spanish'),
                        't_german'          => $this->input->post('t_german'),
                        't_french'          => $this->input->post('t_french'),
                        't_russian'         => $this->input->post('t_russian'),
                        'd_english'         => $this->input->post('d_english'),
                        'd_italian'         => $this->input->post('d_italian'),
                        'd_spanish'         => $this->input->post('d_spanish'),
                        'd_german'          => $this->input->post('d_german'),
                        'd_french'          => $this->input->post('d_french'),
                        'd_russian'         => $this->input->post('d_russian')
                    );
                    $this->zettatech->insert('why_chooses', $values);
                   
                    $this->session->set_flashdata('message','Why Choose US Successfully Added.');
                    redirect('why_choose/all');
                }
                $data['t_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Title',
                    'value'         => $this->form_validation->set_value('t_english'),
                );     
                $data['t_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Title',
                    'value'         => $this->form_validation->set_value('t_italian'),
                );     
                $data['t_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Title',
                    'value'         => $this->form_validation->set_value('t_spanish'),
                );     
                $data['t_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Title',
                    'value'         => $this->form_validation->set_value('t_german'),
                );     
                $data['t_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Title',
                    'value'         => $this->form_validation->set_value('t_french'),
                );     
                $data['t_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Title',
                    'value'         => $this->form_validation->set_value('t_russian'),
                ); 
                $data['d_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_english',
                    'id'            => 'redactor_description_english',
                    'placeholder'   => 'English Description',
                    'value'         => $this->form_validation->set_value('d_english'),
                ); 
                $data['d_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_italian',
                    'id'            => 'redactor_description_italian',
                    'placeholder'   => 'Italian Description',
                    'value'         => $this->form_validation->set_value('d_italian'),
                ); 
                $data['d_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_spanish',
                    'id'            => 'redactor_description_spanish',
                    'placeholder'   => 'Spanish Description',
                    'value'         => $this->form_validation->set_value('d_spanish'),
                ); 
                $data['d_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_german',
                    'id'            => 'redactor_description_german',
                    'placeholder'   => 'German Description',
                    'value'         => $this->form_validation->set_value('d_german'),
                ); 
                $data['d_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_french',
                    'id'            => 'redactor_description_french',
                    'placeholder'   => 'French Description',
                    'value'         => $this->form_validation->set_value('d_french'),
                ); 
                $data['d_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_russian',
                    'id'            => 'redactor_description_russian',
                    'placeholder'   => 'Russian Description',
                    'value'         => $this->form_validation->set_value('d_russian'),
                );                  
                
                $data['icon'] = array(
                    'class'         => 'form-control',
                    'name'          => 'icon',
                    'type'          => 'text',
                    'placeholder'   => 'icon',
                    'value'         => $this->form_validation->set_value('icon'),
                );                
                
                $data['message'] = $this->session->flashdata('message');                    
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Create Why Choose US';
                $this->zettatech->_render_backend('create', $data);
        }
        function edit($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Why Choose US Not Exists.');
                    redirect('why_choose/all','refresh');
                }
                $data['why_choose'] = $this->zettatech->get_where('why_chooses',array('url' => $url))->row();
                if(empty($data['why_choose'])){
                    $this->session->set_flashdata('message_error', 'Why Choose US Not Exists.');
                    redirect('why_choose/all', 'refresh');
                }                
                $this->form_validation->set_rules('t_english', 'English Title', 'required'); 
                if($this->form_validation->run() == true){
                    
                    $values = array(
                        'icon'              => $this->input->post('icon'),
                        't_english'         => $this->input->post('t_english'),
                        't_italian'         => $this->input->post('t_italian'),
                        't_spanish'         => $this->input->post('t_spanish'),
                        't_german'          => $this->input->post('t_german'),
                        't_french'          => $this->input->post('t_french'),
                        't_russian'         => $this->input->post('t_russian'),
                        'd_english'         => $this->input->post('d_english'),
                        'd_italian'         => $this->input->post('d_italian'),
                        'd_spanish'         => $this->input->post('d_spanish'),
                        'd_german'          => $this->input->post('d_german'),
                        'd_french'          => $this->input->post('d_french'),
                        'd_russian'         => $this->input->post('d_russian')
                    );
                    $this->zettatech->update('why_chooses', $values, array('url' => $url));                    
                    $this->session->set_flashdata('message','Why Choose US Successfully Updated.');
                    redirect(uri_string());
                }
                $data['t_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Title',
                    'value'         => $this->form_validation->set_value('t_english', $data['why_choose']->t_english),
                );     
                $data['t_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Title',
                    'value'         => $this->form_validation->set_value('t_italian', $data['why_choose']->t_italian),
                );     
                $data['t_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Title',
                    'value'         => $this->form_validation->set_value('t_spanish', $data['why_choose']->t_spanish),
                );     
                $data['t_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Title',
                    'value'         => $this->form_validation->set_value('t_german', $data['why_choose']->t_german),
                );     
                $data['t_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Title',
                    'value'         => $this->form_validation->set_value('t_french', $data['why_choose']->t_french),
                );     
                $data['t_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Title',
                    'value'         => $this->form_validation->set_value('t_russian', $data['why_choose']->t_russian),
                ); 
                $data['d_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_english',
                    'id'            => 'redactor_description_english',
                    'placeholder'   => 'English Description',
                    'value'         => $this->form_validation->set_value('d_english', $data['why_choose']->d_english),
                ); 
                $data['d_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_italian',
                    'id'            => 'redactor_description_italian',
                    'placeholder'   => 'Italian Description',
                    'value'         => $this->form_validation->set_value('d_italian', $data['why_choose']->d_italian),
                ); 
                $data['d_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_spanish',
                    'id'            => 'redactor_description_spanish',
                    'placeholder'   => 'Spanish Description',
                    'value'         => $this->form_validation->set_value('d_spanish', $data['why_choose']->d_spanish),
                ); 
                $data['d_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_german',
                    'id'            => 'redactor_description_german',
                    'placeholder'   => 'German Description',
                    'value'         => $this->form_validation->set_value('d_german', $data['why_choose']->d_german),
                ); 
                $data['d_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_french',
                    'id'            => 'redactor_description_french',
                    'placeholder'   => 'French Description',
                    'value'         => $this->form_validation->set_value('d_french', $data['why_choose']->d_french),
                ); 
                $data['d_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_russian',
                    'id'            => 'redactor_description_russian',
                    'placeholder'   => 'Russian Description',
                    'value'         => $this->form_validation->set_value('d_russian', $data['why_choose']->d_russian),
                );                  
                
                $data['icon'] = array(
                    'class'         => 'form-control',
                    'name'          => 'icon',
                    'type'          => 'text',
                    'placeholder'   => 'icon',
                    'value'         => $this->form_validation->set_value('icon', $data['why_choose']->icon),
                );                  
                
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Edit Why Choose US';
                $this->zettatech->_render_backend('edit', $data);
        }
        function delete($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Why Choose US Not Exists.');
                    redirect('why_choose/all','refresh');
                }
		$why_choose = $this->zettatech->get_where('why_chooses',array('url' => $url))->row();
		if(empty($why_choose)){
                    $this->session->set_flashdata('message_error', 'Why Choose US Not Exists.');
                }else{                    
                    $this->zettatech->delete('why_chooses',  array('url' => $url));
                    $this->session->set_flashdata('message', 'Why Choose US Successfully Deleted.');
                }
                redirect('why_choose/all', 'refresh');
	}
        
}
