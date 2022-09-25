<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends ZT_Controller{
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
        function index(){                
                $data['tours'] = $this->zettatech->get('tours')->result_array();
                $this->db->group_by('tour');
                $tour_images = $this->zettatech->get('tour_images')->result();
                $data['tour_images'] = array();
                foreach ($tour_images as $tour_image){
                    $data['tour_images'][$tour_image->tour] = $tour_image->image;
                }
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $this->lang->line('tour_title');
                $this->zettatech->_render_frontend('index', $data);
        }
        function detail($url = NULL){
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour/all','refresh');
                }
                $data['tour'] = $this->zettatech->get_where('tours',array('url' => $url))->row_array();
                if(empty($data['tour'])){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour/all', 'refresh');
                }                
                $data['tour_images'] = $this->zettatech->get_where('tour_images',array('tour' => $url))->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $data['tour']['t_english'];
                $this->zettatech->_render_frontend('detail', $data);
        }
        
        
        function all(){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                $data['tours'] = $this->zettatech->get('tours')->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Tour';
                $this->zettatech->_render_backend('all', $data);
        }
        function create(){ 
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                $this->form_validation->set_rules('t_english', 'English Title', 'required'); 
                if($this->form_validation->run() == true){                    
                    $times = $this->input->post('tour_time');
                    $tour_time = array();
                    foreach ($times as $key => $lan){
                        foreach ($lan as $time){
                            if(!empty($time))
                            $tour_time[$key][] = $time;
                        }
                    }
                    $values = array(
                        'url'               => $this->zettatech->url_check($this->input->post('t_english'), 'tours'),
                        'type'              => $this->input->post('type'),
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
                        'd_russian'         => $this->input->post('d_russian'),
                        'featured'          => $this->input->post('featured'),
                        'capacity'          => $this->input->post('capacity'),
                        'price_adult'       => $this->input->post('price_adult'),
                        'price_student'     => $this->input->post('price_student'),
                        'price_child'       => $this->input->post('price_child'),
                        'duration_english'  => $this->input->post('duration_english'),
                        'duration_italian'  => $this->input->post('duration_italian'),
                        'duration_spanish'  => $this->input->post('duration_spanish'),
                        'duration_german'   => $this->input->post('duration_german'),
                        'duration_french'   => $this->input->post('duration_french'),
                        'duration_russian'  => $this->input->post('duration_russian'),
                        'tour_time'         => json_encode($tour_time)
                    );
                    $this->zettatech->insert('tours', $values);
                    
                    $files = $_FILES['tour_image'];
                    $this->load->library('upload');  
                    $config['upload_path']      = './uploads/contents/';
                    $config['allowed_types']    = 'jpg|png|jpeg';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->upload->initialize($config);
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images']['name']= $files['name'][$key];
                        $_FILES['images']['type']= $files['type'][$key];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
                        $_FILES['images']['error']= $files['error'][$key];
                        $_FILES['images']['size']= $files['size'][$key];
                        if ($this->upload->do_upload('images')) {
                            $file = $this->upload->data();

                            $valuesImage = array(
                                'url'           => $this->zettatech->url_check($this->zettatech->random_string(10), 'tour_images'),
                                'tour'          => $values['url'],
                                'image'         => $file['file_name']
                            );
                            $this->zettatech->insert('tour_images', $valuesImage);
                        } 
                    }
                    $this->session->set_flashdata('message','Tour Successfully Added.');
                    redirect('tour/all');
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
                $data['capacity'] = array(
                    'class'         => 'form-control',
                    'name'          => 'capacity',
                    'type'          => 'number',
                    'min'           => 1,
                    'placeholder'   => 'Tour Capacity',
                    'value'         => $this->form_validation->set_value('capacity'),
                );                  
                $data['price_adult'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_adult',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Adult',
                    'value'         => $this->form_validation->set_value('price_adult'),
                );                
                $data['price_student'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_student',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Student',
                    'value'         => $this->form_validation->set_value('price_student'),
                );                           
                $data['price_child'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_child',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Children',
                    'value'         => $this->form_validation->set_value('price_child'),
                );                
                                
                $data['tour_time_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[english][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[italian][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[spanish][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[german][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[french][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[russian][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                ); 
                $data['duration_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_english'),
                ); 
                $data['duration_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_italian'),
                ); 
                $data['duration_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_spanish'),
                ); 
                $data['duration_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_german'),
                ); 
                $data['duration_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_french'),
                ); 
                $data['duration_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_russian'),
                );                  
                $data['featured_value'] = array(
                    '1'     => 'Yes',
                    '0'     => 'No'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', '0');
                $data['type_value'] = array(
                    'Regular Tour'  => 'Regular Tour',
                    'Ticket'        => 'Ticket'
                );
                $data['type_name'] = 'type';
                $data['type_selected'] = $this->form_validation->set_value('type', 'Regular Tour');
                $data['dropdown_class'] = 'class="form-control"';
                $data['message'] = $this->session->flashdata('message');                    
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Create Tour';
                $this->zettatech->_render_backend('create', $data);
        }
        function edit($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }    
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour/all','refresh');
                }
                $data['tour'] = $this->zettatech->get_where('tours',array('url' => $url))->row();
                if(empty($data['tour'])){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour/all', 'refresh');
                }                
                $data['tour_images'] = $this->zettatech->get_where('tour_images',array('tour' => $url))->result();
                $this->form_validation->set_rules('t_english', 'English Title', 'required'); 
                if($this->form_validation->run() == true){
                    
                    $times = $this->input->post('tour_time');
                    $tour_time = array();
                    foreach ($times as $key => $lan){
                        foreach ($lan as $time){
                            if(!empty($time))
                            $tour_time[$key][] = $time;
                        }
                    }
                    $values = array(
                        'type'              => $this->input->post('type'),
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
                        'd_russian'         => $this->input->post('d_russian'),
                        'featured'          => $this->input->post('featured'),
                        'capacity'          => $this->input->post('capacity'),
                        'price_adult'       => $this->input->post('price_adult'),
                        'price_student'     => $this->input->post('price_student'),
                        'price_child'       => $this->input->post('price_child'),
                        'duration_english'  => $this->input->post('duration_english'),
                        'duration_italian'  => $this->input->post('duration_italian'),
                        'duration_spanish'  => $this->input->post('duration_spanish'),
                        'duration_german'   => $this->input->post('duration_german'),
                        'duration_french'   => $this->input->post('duration_french'),
                        'duration_russian'  => $this->input->post('duration_russian'),
                        'tour_time'         => json_encode($tour_time)
                    );
                    $this->zettatech->update('tours', $values, array('url' => $url));
                    $files = $_FILES['tour_image'];
                    $this->load->library('upload');  
                    $config['upload_path']      = './uploads/contents/';
                    $config['allowed_types']    = 'jpg|png|jpeg';
                    $config['max_size']         = '2048';
                    $config['overwrite']        = FALSE;
                    $config['encrypt_name']     = TRUE;
                    $this->upload->initialize($config);
                    foreach ($files['name'] as $key => $image) {
                        $_FILES['images']['name']= $files['name'][$key];
                        $_FILES['images']['type']= $files['type'][$key];
                        $_FILES['images']['tmp_name']= $files['tmp_name'][$key];
                        $_FILES['images']['error']= $files['error'][$key];
                        $_FILES['images']['size']= $files['size'][$key];
                        if ($this->upload->do_upload('images')) {
                            $file = $this->upload->data();

                            $valuesImage = array(
                                'url'           => $this->zettatech->url_check($this->zettatech->random_string(10), 'tour_images'),
                                'tour'          => $url,
                                'image'         => $file['file_name']
                            );
                            $this->zettatech->insert('tour_images', $valuesImage);
                        } 
                    }
                    $this->session->set_flashdata('message','Tour Successfully Updated.');
                    redirect(uri_string());
                }
                $data['t_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Title',
                    'value'         => $this->form_validation->set_value('t_english', $data['tour']->t_english),
                );     
                $data['t_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Title',
                    'value'         => $this->form_validation->set_value('t_italian', $data['tour']->t_italian),
                );     
                $data['t_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Title',
                    'value'         => $this->form_validation->set_value('t_spanish', $data['tour']->t_spanish),
                );     
                $data['t_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Title',
                    'value'         => $this->form_validation->set_value('t_german', $data['tour']->t_german),
                );     
                $data['t_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Title',
                    'value'         => $this->form_validation->set_value('t_french', $data['tour']->t_french),
                );     
                $data['t_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 't_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Title',
                    'value'         => $this->form_validation->set_value('t_russian', $data['tour']->t_russian),
                ); 
                $data['d_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_english',
                    'id'            => 'redactor_description_english',
                    'placeholder'   => 'English Description',
                    'value'         => $this->form_validation->set_value('d_english', $data['tour']->d_english),
                ); 
                $data['d_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_italian',
                    'id'            => 'redactor_description_italian',
                    'placeholder'   => 'Italian Description',
                    'value'         => $this->form_validation->set_value('d_italian', $data['tour']->d_italian),
                ); 
                $data['d_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_spanish',
                    'id'            => 'redactor_description_spanish',
                    'placeholder'   => 'Spanish Description',
                    'value'         => $this->form_validation->set_value('d_spanish', $data['tour']->d_spanish),
                ); 
                $data['d_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_german',
                    'id'            => 'redactor_description_german',
                    'placeholder'   => 'German Description',
                    'value'         => $this->form_validation->set_value('d_german', $data['tour']->d_german),
                ); 
                $data['d_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_french',
                    'id'            => 'redactor_description_french',
                    'placeholder'   => 'French Description',
                    'value'         => $this->form_validation->set_value('d_french', $data['tour']->d_french),
                ); 
                $data['d_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'd_russian',
                    'id'            => 'redactor_description_russian',
                    'placeholder'   => 'Russian Description',
                    'value'         => $this->form_validation->set_value('d_russian', $data['tour']->d_russian),
                );                  
                $data['capacity'] = array(
                    'class'         => 'form-control',
                    'name'          => 'capacity',
                    'type'          => 'number',
                    'min'           => 1,
                    'placeholder'   => 'Tour Capacity',
                    'value'         => $this->form_validation->set_value('capacity', $data['tour']->capacity),
                );                  
                $data['price_adult'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_adult',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Adult',
                    'value'         => $this->form_validation->set_value('price_adult', $data['tour']->price_adult),
                );                
                $data['price_student'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_student',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Student',
                    'value'         => $this->form_validation->set_value('price_student', $data['tour']->price_student),
                );                           
                $data['price_child'] = array(
                    'class'         => 'form-control',
                    'name'          => 'price_child',
                    'type'          => 'number',
                    'step'          => 0.01,
                    'min'           => 0.01,
                    'placeholder'   => 'Price Children',
                    'value'         => $this->form_validation->set_value('price_child', $data['tour']->price_child),
                );                
                $data['tour_time_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[english][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[italian][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[spanish][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[german][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[french][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                );                
                $data['tour_time_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'tour_time[russian][]',
                    'type'          => 'time',
                    'placeholder'   => 'Time',
                    'value'         => $this->form_validation->set_value('tour_time'),
                ); 
                                
                $data['tour_time'] = array(
                    'class'         => 'form-control',
                    'type'          => 'time',
                    'placeholder'   => 'Time'
                ); 
                $data['duration_english'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_english',
                    'type'          => 'text',
                    'placeholder'   => 'English Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_english', $data['tour']->duration_english),
                ); 
                $data['duration_italian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_italian',
                    'type'          => 'text',
                    'placeholder'   => 'Italian Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_italian', $data['tour']->duration_italian),
                ); 
                $data['duration_spanish'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_spanish',
                    'type'          => 'text',
                    'placeholder'   => 'Spanish Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_spanish', $data['tour']->duration_spanish),
                ); 
                $data['duration_german'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_german',
                    'type'          => 'text',
                    'placeholder'   => 'German Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_german', $data['tour']->duration_german),
                ); 
                $data['duration_french'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_french',
                    'type'          => 'text',
                    'placeholder'   => 'French Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_french', $data['tour']->duration_french),
                ); 
                $data['duration_russian'] = array(
                    'class'         => 'form-control',
                    'name'          => 'duration_russian',
                    'type'          => 'text',
                    'placeholder'   => 'Russian Tour Duration',
                    'value'         => $this->form_validation->set_value('duration_russian', $data['tour']->duration_russian),
                ); 
                $data['featured_value'] = array(
                    '1'   => 'Yes',
                    '0'  => 'No'
                );
                $data['featured_name'] = 'featured';
                $data['featured_selected'] = $this->form_validation->set_value('featured', $data['tour']->featured);                
                $data['type_value'] = array(
                    'Regular Tour'  => 'Regular Tour',
                    'Ticket'        => 'Ticket'
                );
                $data['type_name'] = 'type';
                $data['type_selected'] = $this->form_validation->set_value('type', $data['tour']->type);
                $data['dropdown_class'] = 'class="form-control"';
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Edit Tour';
                $this->zettatech->_render_backend('edit', $data);
        }
        function delete($url = NULL){
                if(!$this->ion_auth->logged_in()){
                        redirect('', 'refresh');
                }  
                if(empty($url)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour/all','refresh');
                }
		$tour = $this->zettatech->get_where('tours',array('url' => $url))->row();
		if(empty($tour)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                }else{                    
                    $this->zettatech->delete('tours',  array('url' => $url));
                    $this->session->set_flashdata('message', 'Tour Successfully Deleted.');
                }
                redirect('tour/all', 'refresh');
	}
        function deleteImage($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
                $where = array('url' => $url);
                $data['file'] = $this->zettatech->get_where('tour_images', $where)->row();
                if(empty($data['file'])){
                    $this->session->set_flashdata('message_error', 'Image not Exists.');
                    redirect('tour/all', 'refresh');
                }

                $where = array(
                    'id' => $data['file']->id
                );
                $file='uploads/contents/'.$data['file']->image; 
                if(file_exists($file)){
                    unlink($file);
                }
                $this->zettatech->delete('tour_images', $where);
                $this->session->set_flashdata('message', 'Image has been deleted.');
                redirect('tour/edit/'.$data['file']->tour, 'refresh');
        }
        
        function featured($url = NULL){ 
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }      
                $tour = $this->zettatech->get_where('tours',array('url' => $url))->row();
		if(empty($tour)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 1
                    );
                    $this->zettatech->update('tours', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Tour Successfully Featured.');
                }
                redirect('tour/all', 'refresh');
	}

	function un_featured($url = NULL){
                if(!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('user/login', 'refresh');
                }
		$tour = $this->zettatech->get_where('tours',array('url' => $url))->row();
		if(empty($tour)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                }else{
                    $values = array(
                        'featured'  => 0
                    );
                    $this->zettatech->update('tours', $values, array('url' => $url));
                    $this->session->set_flashdata('message', 'Tour Successfully Un-Featured.');
                }
                redirect('tour/all', 'refresh');
	}
        
        function getTime($url = NULL){
                $data['tour'] = $this->zettatech->get_where('tours',array('url' => $url))->row();
                if(empty($data['tour'])){
                    $json = array(
                        'error' => 'Tour Not Exist'
                    );
                    echo json_encode($json);
                } else{
                    $data['language'] = $this->input->post('language');
                    $json = array(
                        'searchData' => $this->load->view('getTime',$data,true)
                    );
                    echo json_encode($json);
                }
        }
        
        
}
