<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends ZT_Controller{
    
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @author      Tanveer Agmed Ivan
         * @version 	1.0.0
         * 
	 */
    
	function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('user/login', 'refresh');
		}
	}   
        function all($ofset = NULL)
	{       
                $from = $this->input->post('from'); $to = $this->input->post('to');
                // set the flash data error message if there is one
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');

                //list the users
                if(!empty($from) && !empty($to)){
                    $from = strtotime($from);
                    $to = strtotime($to) + (60*60*24)-1;
                    $where = array('PaymentTime >=' => $from , 'PaymentTime <' => $to, 'payment_status'    => 1);
                    $data['payments']   = $this->zettatech->get_where('orders', $where)->result();
                    $tours = $this->zettatech->get('tours')->result();
                    $data['tours'] = array();
                    foreach ($tours as $tour){
                        $data['tours'][$tour->url] = $tour;
                    }
                    $this->zettatech->select_sum('total');
                    $data['total_amount'] = $this->zettatech->get_where('orders', $where)->row()->total;
                }else{
                    $data['payments']   = array();
                    $data['total_amount'] = 0;
                }
                $data['from'] = $this->input->post('from');
                $data['to'] = $this->input->post('to');
                $data['page_title'] = 'All Payments'.((!empty($data['from']) && !empty($data['to'])) ? " From ".$data['from'].' To '.$data['to'] : '' );
                $this->zettatech->_render_backend('all', $data);
		
	}
        function details($url = NULL){
                $where = array(
                    'url'   => $url
                );
                $data['order']   = $this->zettatech->get_where('orders', $where)->row();
                if(empty($data['order'])){
                    redirect('payment/all', 'refresh');
                }
                $where = array(
                    'order_url'   => $url
                );
                $data['order_details'] = $this->zettatech->get_where('order_details', $where)->result();
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = $this->session->flashdata('message_error');
                $data['page_title'] = 'Detail - '.$url;
                $this->zettatech->_render_backend('details', $data);
        }
}
