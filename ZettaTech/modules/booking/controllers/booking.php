<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends ZT_Controller{
	/**
         * 
         * 
         * @Created     28/05/2019
         * @version 	1.0.0
         * @Updated     28/05/2019
         * 
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
                $where = array();
                $this->form_validation->set_rules('tour', 'Tour', 'required');
		$this->form_validation->set_rules('date', 'Date', '');
		$this->form_validation->set_rules('time', 'Time', '');
		$this->form_validation->set_rules('language', 'Language', '');
                if($this->form_validation->run() == true){
                    $where = array(
                        'tour'  => $this->input->post('tour'),
                        'order_details.payment_status'    => 1
                    );
                    
                    if($this->input->post('date')){
                        $where['order_details.dates'] = strtotime($this->input->post('date'));
                    }
                    if($this->input->post('language')){
                        $where['order_details.language'] = $this->input->post('language');
                    }
                    if($this->input->post('time')){
                        $where['order_details.time'] = $this->input->post('time');
                    }
                    $this->db->join("orders","orders.url = order_details.order_url");
                    $this->zettatech->select("order_details.url,"
                            . "order_details.id,"
                            . "order_details.order_url,"
                            . "order_details.tourID,"
                            . "order_details.tour,"
                            . "order_details.language,"
                            . "order_details.time,"
                            . "order_details.dates,"
                            . "order_details.adult_qty,"
                            . "order_details.adult_price,"
                            . "order_details.student_qty,"
                            . "order_details.student_price,"
                            . "order_details.child_qty,"
                            . "order_details.child_price,"
                            . "orders.full_name,"
                            . "orders.email,"
                            . "orders.phone,");
                    $this->zettatech->order_by('order_details.id','ASC');
                    $data['bookings'] = $this->zettatech->get_where('order_details', $where)->result();
                }else{
                    $data['bookings'] = array();
                }
                $data['date'] = array(
                    'class'         => 'form-control',
                    'name'          => 'date',
                    'type'          => 'date',
                    'placeholder'   => 'Date',
                    'value'         => $this->form_validation->set_value('date'),
                );
                $data['time_value'] = array(
                    ''  => 'Select Time'
                );
                if($this->input->post('tour') && $this->input->post('language')){
                    $tour_data = $this->zettatech->get_where('tours',array('url' => $this->input->post('tour')))->row();
                    $tour_times = json_decode($tour_data->tour_time,TRUE);
                    if(!empty($where['order_details.language']) && !empty($tour_times[$where['order_details.language']])){
                        foreach ($tour_times[$where['order_details.language']] as $tour_time){
                            $data['time_value'][$tour_time] = $tour_time;
                        }
                    }
                }
                $data['time_name'] = 'time';
                $data['time_selected'] = $this->form_validation->set_value('time'); 
                $tours = $this->zettatech->get('tours')->result();
                $data['tour_value'] = array(
                    ''  => 'Select Tour'
                );
                foreach ($tours as $tour){
                    $data['tour_value'][$tour->url] = $tour->t_english;
                }
                $data['tour_name'] = 'tour';
                $data['tour_selected'] = $this->form_validation->set_value('tour');  
                $data['language_value'] = array(
                    ''  => 'All Language',
                    'english'  => 'English',
                    'italian'  => 'Italiano',
                    'spanish'  => 'Español',
                    'german'  => 'deutsche',
                    'french'  => 'Française',
                    'russian'  => 'русский',
                );
                $data['language_name'] = 'language';
                $data['language_selected'] = $this->form_validation->set_value('language');  
                $data['dropdown_class'] = 'class="form-control"';
                $data['dropdown_class_required'] = 'class="form-control" required';
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = 'Booking';
                $this->zettatech->_render_backend('all', $data);
        }
        function getTime($url = NULL, $language = null){
                $data['tour'] = $this->zettatech->get_where('tours',array('url' => $url))->row();
                if(empty($data['tour']) || empty($language)){
                    $json = array(
                        'error' => 'Tour Not Exist'
                    );
                    echo json_encode($json);
                } else{
                    $data['language'] = $language;
                    $json = array(
                        'searchData' => $this->load->view('getTime',$data,true)
                    );
                    echo json_encode($json);
                }
        }
}
