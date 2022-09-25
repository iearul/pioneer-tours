<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends ZT_Controller{
	/**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @Created     19/03/2017
         * @version 	1.0.0
         * @Updated     19/03/2017
         * @link	http://zettatech.io/
         * 
	 */
        function __construct()
	{
		parent::__construct();                      
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
        }
        function all(){
                $data['sliders'] = $this->zettatech->get('sliders')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Sliders';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){   
                $this->load->library('upload');
                $this->form_validation->set_rules('submit', 'Submit', '');   
                $config['upload_path']      = './uploads/contents/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->upload->initialize($config);
                if($this->form_validation->run() == true && $this->upload->do_upload('slider_image')){
                    $upload_data = $this->upload->data();
                    $values = array(
                        'url'            => $this->zettatech->url_check($this->zettatech->random_string(10), 'sliders'),
                        'image'          => $upload_data['file_name']
                    );
                    $this->zettatech->insert('sliders', $values);
                    $this->session->set_flashdata('message','Slider Successfully Added.');
                    redirect('slider/all');
                }
                else if($this->form_validation->run() == true){
                    $data['message_error'] = $this->upload->display_errors();
                }else{
                    $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                }                
                $data['message'] = $this->session->flashdata('message');                    
                
                $data['page_title'] = 'Create Slider';
                $this->zettatech->_render_backend('create', $data);
        }
        function edit($url = NULL){  
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                    redirect('slider/all','refresh');
                }
                $data['slider'] = $this->zettatech->get_where('sliders',array('url' => $url))->row();
                if(empty($data['slider'])){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                    redirect('slider/all', 'refresh');
                }
                $this->form_validation->set_rules('submit', 'Submit', '');  
                $this->load->library('upload');
                $config['upload_path']      = './uploads/contents/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->upload->initialize($config);
                if($this->form_validation->run() == true && $this->upload->do_upload('slider_image')){
                    $upload_data = $this->upload->data();
                    $values = array(
                        'image'          => $upload_data['file_name']
                    );
                    
                    $this->zettatech->update('sliders', $values, array('url' => $url));
                    $this->session->set_flashdata('message','Slider Successfully Updated.');
                    redirect(uri_string());
                }else if($this->form_validation->run() == true){
                    $data['message_error'] = $this->upload->display_errors();
                }else{
                    $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                }
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Edit Slider';
                $this->zettatech->_render_backend('edit', $data);
        }
        function delete($url = NULL){
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                    redirect('slider/all','refresh');
                }
		$slider = $this->zettatech->get_where('sliders',array('url' => $url))->row();
		if(empty($slider)){
                    $this->session->set_flashdata('message_error', 'Slider Not Exists.');
                }else{                    
                    $this->zettatech->delete('sliders',  array('url' => $url));
                    $this->session->set_flashdata('message', 'Slider Successfully Deleted.');
                }
                redirect('slider/all', 'refresh');
	}
}
