<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends ZT_Controller{
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
                $faqs = $this->zettatech->get('faqs')->result_array();
                $data['faqs'] = array();
                foreach ($faqs as $faq){
                    $data['faqs'][$faq['category']][] = $faq;
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $this->lang->line('menu_faq');
                $this->zettatech->_render_frontend('index', $data);
        }
        function all(){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $data['faqs'] = $this->zettatech->get('faqs')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'FAQ';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){ 
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                $this->form_validation->set_rules('category', 'Category', 'required'); 
                if($this->form_validation->run() == true){
                    $values = array(
                        'url'               => $this->zettatech->url_check($this->zettatech->random_string(10), 'faqs'),
                        'category'          => $this->input->post('category'),
                        'q_english'         => $this->input->post('q_english'),
                        'q_italian'         => $this->input->post('q_italian'),
                        'q_spanish'         => $this->input->post('q_spanish'),
                        'q_german'          => $this->input->post('q_german'),
                        'q_french'          => $this->input->post('q_french'),
                        'q_russian'         => $this->input->post('q_russian'),
                        'a_english'         => $this->input->post('a_english'),
                        'a_italian'         => $this->input->post('a_italian'),
                        'a_spanish'         => $this->input->post('a_spanish'),
                        'a_german'          => $this->input->post('a_german'),
                        'a_french'          => $this->input->post('a_french'),
                        'a_russian'         => $this->input->post('a_russian')
                    );
                    $this->zettatech->insert('faqs', $values);
                    $this->session->set_flashdata('message','FAQ Successfully Added.');
                    redirect('faq/all');
                }
                $data['q_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Question',
                    'value'         => $this->form_validation->set_value('q_english'),
                );     
                $data['q_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Question',
                    'value'         => $this->form_validation->set_value('q_italian'),
                );     
                $data['q_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Question',
                    'value'         => $this->form_validation->set_value('q_spanish'),
                );     
                $data['q_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Question',
                    'value'         => $this->form_validation->set_value('q_german'),
                );     
                $data['q_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Question',
                    'value'         => $this->form_validation->set_value('q_french'),
                );     
                $data['q_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Question',
                    'value'         => $this->form_validation->set_value('q_russian'),
                ); 
                $data['a_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Answer',
                    'value'         => $this->form_validation->set_value('a_english'),
                );     
                $data['a_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Answer',
                    'value'         => $this->form_validation->set_value('a_italian'),
                );     
                $data['a_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Answer',
                    'value'         => $this->form_validation->set_value('a_spanish'),
                );     
                $data['a_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Answer',
                    'value'         => $this->form_validation->set_value('a_german'),
                );     
                $data['a_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Answer',
                    'value'         => $this->form_validation->set_value('a_french'),
                );     
                $data['a_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Answer',
                    'value'         => $this->form_validation->set_value('a_russian'),
                ); 
                $data['category_value'] = array(
                    ''                      => 'Select Category',
                    'Payments'              => 'Payments',
                    'Suggestions'           => 'Suggestions',
                    'Recommendations'       => 'Recommendations',
                    'Terms & Conditions'    => 'Terms & Conditions',
                    'Booking'               => 'Booking',
                    'Refund Policy'         => 'Refund Policy',
                );
                $data['category_name'] = 'category';
                $data['category_selected'] = $this->form_validation->set_value('category');  
                $data['dropdown_class'] = 'class="form-control"';
                $data['message'] = $this->session->flashdata('message');                    
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Create FAQ';
                $this->zettatech->_render_backend('create', $data);
        }
        function edit($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'FAQ Not Exists.');
                    redirect('faq/all','refresh');
                }
                $data['faq'] = $this->zettatech->get_where('faqs',array('url' => $url))->row();
                if(empty($data['faq'])){
                    $this->session->set_flashdata('message_error', 'FAQ Not Exists.');
                    redirect('faq/all', 'refresh');
                }
                $this->form_validation->set_rules('category', 'Category', 'required'); 
                if($this->form_validation->run() == true){
                    $values = array(
                        'category'          => $this->input->post('category'),
                        'q_english'         => $this->input->post('q_english'),
                        'q_italian'         => $this->input->post('q_italian'),
                        'q_spanish'         => $this->input->post('q_spanish'),
                        'q_german'          => $this->input->post('q_german'),
                        'q_french'          => $this->input->post('q_french'),
                        'q_russian'         => $this->input->post('q_russian'),
                        'a_english'         => $this->input->post('a_english'),
                        'a_italian'         => $this->input->post('a_italian'),
                        'a_spanish'         => $this->input->post('a_spanish'),
                        'a_german'          => $this->input->post('a_german'),
                        'a_french'          => $this->input->post('a_french'),
                        'a_russian'         => $this->input->post('a_russian'),
                    );
                    $this->zettatech->update('faqs', $values, array('url' => $url));
                    $this->session->set_flashdata('message','FAQ Successfully Updated.');
                    redirect(uri_string());
                }
                $data['q_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Question',
                    'value'         => $this->form_validation->set_value('q_english', $data['faq']->q_english),
                );     
                $data['q_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Question',
                    'value'         => $this->form_validation->set_value('q_italian', $data['faq']->q_italian),
                );     
                $data['q_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Question',
                    'value'         => $this->form_validation->set_value('q_spanish', $data['faq']->q_spanish),
                );     
                $data['q_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Question',
                    'value'         => $this->form_validation->set_value('q_german', $data['faq']->q_german),
                );     
                $data['q_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Question',
                    'value'         => $this->form_validation->set_value('q_french', $data['faq']->q_french),
                );     
                $data['q_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'q_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Question',
                    'value'         => $this->form_validation->set_value('q_russian', $data['faq']->q_russian),
                ); 
                $data['a_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Answer',
                    'value'         => $this->form_validation->set_value('a_english', $data['faq']->a_english),
                );     
                $data['a_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Answer',
                    'value'         => $this->form_validation->set_value('a_italian', $data['faq']->a_italian),
                );     
                $data['a_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Answer',
                    'value'         => $this->form_validation->set_value('a_spanish', $data['faq']->a_spanish),
                );     
                $data['a_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Answer',
                    'value'         => $this->form_validation->set_value('a_german', $data['faq']->a_german),
                );     
                $data['a_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Answer',
                    'value'         => $this->form_validation->set_value('a_french', $data['faq']->a_french),
                );     
                $data['a_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'a_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Answer',
                    'value'         => $this->form_validation->set_value('a_russian', $data['faq']->a_russian),
                ); 
                $data['category_value'] = array(
                    'Payments'              => 'Payments',
                    'Suggestions'           => 'Suggestions',
                    'Recommendations'       => 'Recommendations',
                    'Terms & Conditions'    => 'Terms & Conditions',
                    'Booking'               => 'Booking',
                    'Refund Policy'         => 'Refund Policy',
                );
                $data['category_name'] = 'category';
                $data['category_selected'] = $this->form_validation->set_value('category', $data['faq']->category);  
                $data['dropdown_class'] = 'class="form-control"';   
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Edit FAQ';
                $this->zettatech->_render_backend('edit', $data);
        }
        function delete($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'FAQ Not Exists.');
                    redirect('faq/all','refresh');
                }
		$faq = $this->zettatech->get_where('faqs',array('url' => $url))->row();
		if(empty($faq)){
                    $this->session->set_flashdata('message_error', 'FAQ Not Exists.');
                }else{                    
                    $this->zettatech->delete('faqs',  array('url' => $url));
                    $this->session->set_flashdata('message', 'FAQ Successfully Deleted.');
                }
                redirect('faq/all', 'refresh');
	}
}
