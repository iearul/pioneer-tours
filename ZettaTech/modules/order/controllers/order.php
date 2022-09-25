<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends ZT_Controller{
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
        
        function cart(){                
                $data['cart'] = $this->cart->contents();
                $data['subtotalPrice'] = sprintf('%0.2f', $this->cart->total());
                $data['totalFees'] = $data['subtotalPrice'] > 0 ? $this->totalFees($data['subtotalPrice']) : 0.00;
                $data['totalPrice'] = sprintf('%0.2f', $data['subtotalPrice'] + $data['totalFees']);
                $data['message'] = $this->session->flashdata('message');
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['page_title'] = $this->lang->line('tour_title');
                $this->zettatech->_render_frontend('cart', $data);
        }
        
        function makePayment(){                
                    $this->form_validation->set_rules('full_name', $this->lang->line('tour_detail_fullname'), 'required'); 
                    $this->form_validation->set_rules('email',  $this->lang->line('email_title'), 'required'); 
                    $this->form_validation->set_rules('phone',  $this->lang->line('tour_detail_mobile'), 'required'); 
                    if($this->form_validation->run() == true){
                        $cart = $this->cart->contents();
                        $subtotalPrice = sprintf('%0.2f', $this->cart->total());
                        $totalFees = $subtotalPrice ? $this->totalFees($subtotalPrice) : 0;
                        $totalPrice = sprintf('%0.2f', $subtotalPrice + $totalFees);
                        $values = array(
                            'url'               => $this->zettatech->url_check($this->zettatech->random_string(10), 'orders'),
                            'full_name'         => $this->input->post('full_name'),
                            'email'             => $this->input->post('email'),
                            'phone'             => $this->input->post('phone'),
                            'fees'              => $totalFees,
                            'total'             => $totalPrice,
                            'payment_status'    => 0
                        );
                        $this->zettatech->insert('orders', $values);
                        
                        
                        foreach ($cart as $item){
                            $totalQty = $item['adult_qty']+$item['student_qty']+$item['child_qty'];
                            $tourID = $this->getTourID($item['language'],$item['time'],strtotime($item['dates']), $totalQty);
                            $where = array(
                                'tour'  => $item['tour'],
                                'dates' => strtotime($item['dates']),
                                'time'  => $item['time']
                            );
                            $totalOrders = $this->zettatech->count_all_results('order_details', $where);    
                            $valuesCart = array(
                                'url'               => $this->zettatech->url_check($this->zettatech->random_string(10), 'order_details'),
                                'order_url'         => $values['url'],
                                'tourID'            => $tourID.'-'.sprintf('%02d', $totalOrders+1),
                                'tour'              => $item['tour'],
                                'language'          => $item['language'],
                                'time'              => $item['time'],
                                'dates'             => strtotime($item['dates']),
                                'adult_qty'         => $item['adult_qty'],
                                'adult_price'       => $item['adult_price'],
                                'student_qty'       => $item['student_qty'],
                                'student_price'     => $item['student_price'],
                                'child_qty'         => $item['child_qty'],
                                'child_price'       => $item['child_price']
                            );
                            $this->zettatech->insert('order_details', $valuesCart);
                        }
                        $this->destroy();
                        // Alias e chiave segreta 
//                        $ALIAS = 'ALIAS_WEB_00019986'; // Sostituire con il valore fornito da Nexi
//                        $CHIAVESEGRETA = 'MC49M46ZJIZ0K6IPSOL34V57BR3YHWOK'; // Sostituire con il valore fornito da Nexi
//
//                        $requestUrl = "https://int-ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";
                        $ALIAS = 'payment_2096587'; // Sostituire con il valore fornito da Nexi
                        $CHIAVESEGRETA = 'QBBv323EdE616428644b1D021r2g6Y2M4PU233S5'; // Sostituire con il valore fornito da Nexi

                        $requestUrl = "https://ecommerce.nexi.it/ecomm/ecomm/DispatcherServlet";
                        $merchantServerUrl = base_url(). "order/";

                        $codTrans = $values['url'];
                        $divisa = "EUR";
                        $importo = $totalPrice*100;

                        // Calcolo MAC
                        $mac = sha1('codTrans=' . $codTrans . 'divisa=' . $divisa . 'importo=' . $importo . $CHIAVESEGRETA);

                        // Parametri obbligatori
                        $obbligatori = array(
                            'alias' => $ALIAS,
                            'importo' => $importo,
                            'divisa' => $divisa,
                            'codTrans' => $codTrans,
                            'url' => $merchantServerUrl . "paymentCheck",
                            'url_back' => $merchantServerUrl . "paymentError",
                            'mac' => $mac,   
                        );

                        // Parametri facoltativi
                        $facoltativi = array(
                            'descrizione' => "Pioneer Tours Payment ID - ".$values['url'],
                        );
                        
                        $requestParams = array_merge($obbligatori, $facoltativi);

                        $aRequestParams = array();
                        foreach ($requestParams as $param => $value) {
                            $aRequestParams[] = $param . "=" . $value;
                        }

                        $stringRequestParams = implode("&", $aRequestParams);

                        $redirectUrl = $requestUrl . "?" . $stringRequestParams;
                        echo '<script type="text/javascript">
                                window.location = "'.$redirectUrl.'"
                           </script>';              
                        
//                        $checkoutRequest = array(
//                            'charge' => array(
//                                    'amount'        => $total*100,
//                                    'currency'      => 'EUR'
//                            )
//                        );
//                        $data['signedCheckoutRequest'] = $this->signCheckoutRequest($checkoutRequest);
//                        $data['publicKey'] = $this->publicKey;
//                        $data['tour'] = $this->zettatech->get_where('tours',array('url' => $url))->row_array();
//                        $data['order'] = $this->zettatech->get_where('orders',array('url' => $values['url']))->row();
//                        $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
//                        $data['message'] = $this->session->flashdata('message');
//                        $data['page_title'] = 'Confirm Payment';
//                        $this->zettatech->_render_frontend('makePayment', $data);
                    }
                    
            
                
        }
        public function paymentCheck(){
                $responseData = $this->input->get();
                if($responseData['messaggio'] == 'Message OK'){
                    $orderURL = $responseData['codTrans'];
                    $data['order'] = $this->zettatech->get_where('orders',array('url' => $orderURL))->row();
                    if(empty($data['order'])){
                        $this->paymentError();
                    }
                    if($responseData['importo'] == $data['order']->total*100){
                        $values = array(
                            'paymentID'         => $responseData['mac'],
                            'PaymentTime'       => time(),
                            'payment_status'    => 1,
                        );
                        $this->zettatech->update('orders', $values, array('url' => $data['order']->url));
                        $values = array(
                            'payment_status'    => 1,
                        );
                        $this->zettatech->update('order_details', $values, array('order_url' => $data['order']->url));
                        $this->sendEmail($data['order']->url);
                        $data['order_details'] = $this->zettatech->get_where('order_details',array('order_url' => $data['order']->url))->result();
                        $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                        $data['message'] = $this->session->flashdata('message');
                        $data['page_title'] = $this->lang->line('paymentSuccess_success');
                        $this->zettatech->_render_frontend('payment_success', $data);
                    }else{
                        $this->paymentError();
                    }
                }else{
                    $this->paymentError();
                }
                
        }
        public function paymentError(){
                $data['message_error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message_error');
                $data['message'] = $this->session->flashdata('message');
                $data['page_title'] = 'Payment Error!';
                $this->zettatech->_render_frontend('payment_error', $data);
        }
        private function totalFees($subtotalPrice){
            return sprintf('%0.2f', (($subtotalPrice * 4.9)/100)+ .35);
        }

        public function sendEmail($url){
                $data['order'] = $this->zettatech->get_where('orders',array('url' => $url,'payment_status' => 1))->row();
                if(empty($data['order'])){
                    return 0;
                }
                $orderDetails = $this->zettatech->get_where('order_details',array('order_url' => $url))->result();
                $data['site'] = $this->zettatech->get('site')->row();
                $message = $this->load->view('sendEmailHeader', $data,true);
                foreach($orderDetails as $orderDetail){
                    $data['tour'] = $this->zettatech->get_where('tours',array('url' => $orderDetail->tour))->row();
                    $data['order_detail'] = $orderDetail;
                    $message .= $this->load->view('sendEmail', $data,true);
                }
                $message .= $this->load->view('sendEmailFooter', $data,true);
                $this->load->library('email');
                $this->email->clear();
                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                $this->email->to($data['order']->email);
                $this->email->subject('Pioneer Tours - Ticket Confirmation');
                $this->email->message($message);
                $this->email->send();
                
        }
        public function downloadTicket($url){
                $data['order_detail'] = $this->zettatech->get_where('order_details',array('url' => $url))->row();
                if(empty($data['order_detail'])){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour', 'refresh');
                }
                $data['order'] = $this->zettatech->get_where('orders',array('url' => $data['order_detail']->order_url,'payment_status' => 1))->row();
                if(empty($data['order'])){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour', 'refresh');
                }
                $this->load->library('dompdf_gen');
                $path_to_file = 'uploads/tickets/ticket_'.$url. '.txt';
                if(!file_exists($path_to_file)){
                    $data['tour'] = $this->zettatech->get_where('tours',array('url' => $data['order_detail']->tour))->row();
                    $html = $this->load->view('downloadTicket', $data, true);
                    $this->load->view('downloadTicket', $data);
                    $fp = fopen($path_to_file, 'x+');
                    fwrite($fp, $html);
                    fclose($fp);
                }
                $this->dompdf->load_html(file_get_contents(base_url() . $path_to_file));
                $this->dompdf->render();
                if (!empty($from) && !empty($to)) {
                    $name .= date('d-m-Y', $from) . '-to-' . date('d-m-Y', $to);
                } else {
                    $name .= date('d-m-Y');
                }
                $this->dompdf->stream('ticket_'.$url. '.pdf');                
        }

        private function buildHeaders($headers){
            $result = array();

            foreach ($headers as $name => $value) {
                $result[] = $name . ': ' . $value;
            }

            return $result;
        }
        private function signCheckoutRequest($request) {
            $data = json_encode($request);

            $signarute = hash_hmac('sha256', $data, $this->privateKey);

            return base64_encode($signarute . "|" . $data);
        }
        private function getTourID($language, $time, $date, $qty){
            if($language == 'english'){
                $id = 'E';
            }else if($language == 'italian'){
                $id = 'I';
            }else if($language == 'spanish'){
                $id = 'S';
            }else if($language == 'german'){
                $id = 'G';
            }else if($language == 'french'){
                $id = 'F';
            }else if($language == 'russian'){
                $id = 'R';
            }else{
                $id = 'T';
            }
            $id .= str_replace(':', '', $time) . date('dmy',$date) . $qty;
            return $id;
        }
        function add_cart($url = NULL){
                $tour = $this->zettatech->get_where('tours',array('url' => $url))->row();
		if(empty($tour)){
                    $this->session->set_flashdata('message_error', 'Tour Not Exists.');
                    redirect('tour', 'refresh');
                }else{
                    $this->form_validation->set_rules('dates',  $this->lang->line('tour_detail_when'), 'required'); 
                    $this->form_validation->set_rules('time', $this->lang->line('tour_detail_select_time'), 'required'); 
                    if($this->form_validation->run() == true){
                        $qty = $this->input->post('qtyInput');
                        $total_price_adult = $qty[0]*$tour->price_adult;
                        $total_price_student = $qty[1]*$tour->price_student;
                        $total_price_child = $qty[2]*$tour->price_child;
                        $total = $total_price_adult + $total_price_student + $total_price_child;
                        $totalQty = $qty[0]+$qty[1]+$qty[2];
                         
                        $cart_data = array(
                            'id'            => $tour->url,
                            'qty'           => 1,
                            'price'         => $total,
                            'tour'          => $tour->url,
                            'name'          => $tour->t_english,
                            'language'      => $this->input->post('language'),
                            'dates'         => $this->input->post('dates'),
                            'time'          => $this->input->post('time'),
                            'adult_qty'     => $qty[0],
                            'adult_price'   => $total_price_adult,
                            'student_qty'   => $qty[1],
                            'student_price' => $total_price_student,
                            'child_qty'     => $qty[2],
                            'child_price'   => $total_price_child,
                        );
                        $data['rowid'] = $this->cart->insert($cart_data);
                        redirect('order/cart', 'refresh');
                    }
                    
                }
                
                
        }      
        function remove_cart($url = NULL){                
                if(empty($url)){
                    die();
                }
                $data = array(
                    'rowid'   => $url,
                    'qty'     => 0
                );
                $this->cart->update($data);  
                redirect('order/cart', 'refresh');
        }        
        function get_cart(){
                $cart = $this->cart->contents();
                $data['products'] = array();
                foreach($cart as $row_id => $row){
                    $data['cart'][] = array(
                            'rowid'         => $row['rowid'],
                            'id'            => $row['id'],
                            'qty'           => $row['qty'],
                            'price'         => $row['price'],
                            'tour'          => $row['tour'],
                            'name'          => $row['name'],
                            'dates'         => $row['dates'],
                            'time'          => $row['time'],
                            'adult_qty'     => $row['adult_qty'],
                            'adult_price'   => $row['adult_price'],
                            'student_qty'   => $row['student_qty'],
                            'student_price' => $row['student_price'],
                            'child_qty'     => $row['child_qty'],
                            'child_price'   => $row['child_price'],
                    );
                }
                $data['totalItems'] = $this->cart->total_items();
                $data['totalPrice'] = $this->cart->total();
                echo json_encode($data);
        }
        function destroy($url = NULL){                
                $this->cart->destroy();
        } 
        
}
