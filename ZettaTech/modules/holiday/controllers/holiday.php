<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Holiday extends ZT_Controller{
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
        function all(){                     
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $this->zettatech->delete('holidays',  array('date <' => (time()+ (7 * 24 * 60 * 60)), 'rept' => 0));
                $data['holidays'] = $this->zettatech->get('holidays')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Holiday';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){                        
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $this->form_validation->set_rules('date', 'Date', 'required'); 
                if($this->form_validation->run() == true){
                    $values = array(
                        'url'            => $this->zettatech->url_check($this->zettatech->random_string(10), 'holidays'),
                        'title'          => $this->input->post('title'),
                        'date'           => strtotime($this->input->post('date')),
                        'rept'           => $this->input->post('repeat'),
                    );
                    $this->zettatech->insert('holidays', $values);
                    $this->session->set_flashdata('message','Holiday Successfully Added.');
                    redirect('holiday/all');
                }
                $data['date'] = array(
                    'class'         => 'form-control',
                    'name'          => 'date',
                    'type'          => 'date',
                    'placeholder'   => 'Date',
                    'value'         => $this->form_validation->set_value('date'),
                ); 
                $data['title'] = array(
                    'class'         => 'form-control',
                    'name'          => 'title',
                    'type'          => 'text',
                    'placeholder'   => 'Title',
                    'value'         => $this->form_validation->set_value('title'),
                ); 
                $data['repeat_value'] = array(
                    '0'     => 'No',
                    '1'     => 'Yes'
                );
                $data['repeat_name'] = 'repeat';
                $data['repeat_selected'] = $this->form_validation->set_value('repeat', '0');
                $data['dropdown_class'] = 'class="form-control"';
                $data['message'] = $this->session->flashdata('message');                    
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                
                $data['page_title'] = 'Create Holiday';
                $this->zettatech->_render_backend('create', $data);
        }
        function delete($url = NULL){
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Holiday Not Exists.');
                    redirect('holiday/all','refresh');
                }
		$holiday = $this->zettatech->get_where('holidays',array('url' => $url))->row();
		if(empty($holiday)){
                    $this->session->set_flashdata('message_error', 'Holiday Not Exists.');
                }else{                    
                    $this->zettatech->delete('holidays',  array('url' => $url));
                    $this->session->set_flashdata('message', 'Holiday Successfully Deleted.');
                }
                redirect('holiday/all', 'refresh');
	}
        function getHoliday(){
                $holidays = $this->zettatech->get_where('holidays')->result();
                $json = array(
                    'holiday' => array(),
                    'repetHoliday' => array()
                );
                foreach ($holidays as $holiday){
                    if($holiday->rept == 1){
                        $json['repetHoliday'][] = date('d/m' ,$holiday->date);
                    }else{
                        $json['holiday'][] = date('d/m/Y' ,$holiday->date);
                    }
                }
                echo json_encode($json);
        }
}
