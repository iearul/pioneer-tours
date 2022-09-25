<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends ZT_Controller{
	/**
         * 
         * @copyright	Copyright (c) 2019 Zettabyte Technologies.
         * @Created     13/09/2019
         * @version 	1.0.0
         * @Updated     N/A
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
                $data['gallerys'] = $this->zettatech->get('gallerys')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Gallery';
                $this->zettatech->_render_frontend('index', $data);
        }
        function all(){                     
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $data['gallerys'] = $this->zettatech->get('gallerys')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Gallery';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){                        
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $this->load->library('upload');
                $this->form_validation->set_rules('submit', 'Submit', '');   
                $config['upload_path']      = './uploads/contents/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->upload->initialize($config);
                if($this->form_validation->run() == true && $this->upload->do_upload('gallery_image')){
                    $upload_data = $this->upload->data();
                    $values = array(
                        'url'            => $this->zettatech->url_check($this->zettatech->random_string(10), 'gallerys'),
                        'image'          => $upload_data['file_name']
                    );
                    $this->zettatech->insert('gallerys', $values);
                    $this->session->set_flashdata('message','Gallery Successfully Added.');
                    redirect('gallery/all');
                }
                else if($this->form_validation->run() == true){
                    $data['message_error'] = $this->upload->display_errors();
                }else{
                    $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                }                
                $data['message'] = $this->session->flashdata('message');                    
                
                $data['page_title'] = 'Create Gallery';
                $this->zettatech->_render_backend('create', $data);
        }
        function edit($url = NULL){                       
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                    redirect('gallery/all','refresh');
                }
                $data['gallery'] = $this->zettatech->get_where('gallerys',array('url' => $url))->row();
                if(empty($data['gallery'])){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                    redirect('gallery/all', 'refresh');
                }
                $this->form_validation->set_rules('submit', 'Submit', '');  
                $this->load->library('upload');
                $config['upload_path']      = './uploads/contents/';
                $config['allowed_types']    = 'jpg|png|jpeg';
                $config['max_size']         = '2048';
                $config['overwrite']        = FALSE;
                $config['encrypt_name']     = TRUE;
                $this->upload->initialize($config);
                if($this->form_validation->run() == true && $this->upload->do_upload('gallery_image')){
                    $upload_data = $this->upload->data();
                    $values = array(
                        'image'          => $upload_data['file_name']
                    );
                    
                    $this->zettatech->update('gallerys', $values, array('url' => $url));
                    $this->session->set_flashdata('message','Gallery Successfully Updated.');
                    redirect(uri_string());
                }else if($this->form_validation->run() == true){
                    $data['message_error'] = $this->upload->display_errors();
                }else{
                    $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                }
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Edit Gallery';
                $this->zettatech->_render_backend('edit', $data);
        }
        function delete($url = NULL){
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                    redirect('gallery/all','refresh');
                }
		$gallery = $this->zettatech->get_where('gallerys',array('url' => $url))->row();
		if(empty($gallery)){
                    $this->session->set_flashdata('message_error', 'Gallery Not Exists.');
                }else{                    
                    $this->zettatech->delete('gallerys',  array('url' => $url));
                    $this->session->set_flashdata('message', 'Gallery Successfully Deleted.');
                }
                redirect('gallery/all', 'refresh');
	}
}
