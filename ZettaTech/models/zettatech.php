<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/*** 
* @copyright    Copyright (c) 2017 Zettabyte Technologies
* 
* link:         http://zettatech.io/
*
* Version:      1.0.3
*
* Created:      16.01.2017
* 
* Edited:       09.06.2018
*
* Requirements: PHP5 or above
***/

class Zettatech extends CI_Model
{
	
	public function __construct(){
            date_default_timezone_set('Europe/Rome');
        }
        
        /**
	 * Select
	 *
	 * Generates the SELECT portion of the query
	 *
	 * @param	string
	 * @return	object
	 */
        public function select($select = '*', $escape = NULL){
            $this->db->select($select, $escape);
        }
        // --------------------------------------------------------------------

	/**
	 * Select Max
	 *
	 * Generates a SELECT MAX(field) portion of a query
	 *
	 * @param	string	the field
	 * @param	string	an alias
	 * @return	object
	 */
        public function select_max($select = '', $alias = ''){
            $this->db->select_max($select, $alias);
        }
        // --------------------------------------------------------------------

	/**
	 * Select Min
	 *
	 * Generates a SELECT MIN(field) portion of a query
	 *
	 * @param	string	the field
	 * @param	string	an alias
	 * @return	object
	 */
        public function select_min($select = '', $alias = ''){
            $this->db->select_min($select, $alias);
        }
	// --------------------------------------------------------------------

	/**
	 * Select Average
	 *
	 * Generates a SELECT AVG(field) portion of a query
	 *
	 * @param	string	the field
	 * @param	string	an alias
	 * @return	object
	 */
        public function select_avg($select = '', $alias = ''){
            $this->db->select_avg($select, $alias);
        }
	// --------------------------------------------------------------------

	/**
	 * Select Sum
	 *
	 * Generates a SELECT SUM(field) portion of a query
	 *
	 * @param	string	the field
	 * @param	string	an alias
	 * @return	object
	 */
        public function select_sum($select = '', $alias = ''){
            $this->db->select_sum($select, $alias);
        }
	// --------------------------------------------------------------------

	/**
	 * DISTINCT
	 *
	 * Sets a flag which tells the query string compiler to add DISTINCT
	 *
	 * @param	bool
	 * @return	object
	 */
        public function distinct($val = TRUE){
            $this->db->distinct($val);
        }
        
	// --------------------------------------------------------------------

	/**
	 * From
	 *
	 * Generates the FROM portion of the query
	 *
	 * @param	mixed	can be a string or array
	 * @return	object
	 */
        public function from($from){
            $this->db->from($from);
        }
	// --------------------------------------------------------------------

	/**
	 * Join
	 *
	 * Generates the JOIN portion of the query
	 *
	 * @param	string
	 * @param	string	the join condition
	 * @param	string	the type of join
	 * @return	object
	 */
        public function join($table, $cond, $type = ''){
            $this->db->join($table, $cond, $type);
        } 
	// --------------------------------------------------------------------

	/**
	 * Where
	 *
	 * Generates the WHERE portion of the query. Separates
	 * multiple calls with AND
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function where($key, $value = NULL, $escape = TRUE){
            $this->db->where($key, $value, $escape);
	}
	// --------------------------------------------------------------------

	/**
	 * OR Where
	 *
	 * Generates the WHERE portion of the query. Separates
	 * multiple calls with OR
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function or_where($key, $value = NULL, $escape = TRUE){
            $this->db->where($key, $value, $escape);
	}
	// --------------------------------------------------------------------

	/**
	 * Where_in
	 *
	 * Generates a WHERE field IN ('item', 'item') SQL query joined with
	 * AND if appropriate
	 *
	 * @param	string	The field to search
	 * @param	array	The values searched on
	 * @return	object
	 */
        public function where_in($key = NULL, $values = NULL){
            $this->db->where_in($key, $values);
	}
	// --------------------------------------------------------------------

	/**
	 * Where_in_or
	 *
	 * Generates a WHERE field IN ('item', 'item') SQL query joined with
	 * OR if appropriate
	 *
	 * @param	string	The field to search
	 * @param	array	The values searched on
	 * @return	object
	 */
        public function or_where_in($key = NULL, $values = NULL){
            $this->db->or_where_in($key, $values);
	}
	// --------------------------------------------------------------------

	/**
	 * Where_not_in
	 *
	 * Generates a WHERE field NOT IN ('item', 'item') SQL query joined
	 * with AND if appropriate
	 *
	 * @param	string	The field to search
	 * @param	array	The values searched on
	 * @return	object
	 */
        public function where_not_in($key = NULL, $values = NULL){
            $this->db->where_not_in($key, $values);
	}
	// --------------------------------------------------------------------

	/**
	 * Where_not_in_or
	 *
	 * Generates a WHERE field NOT IN ('item', 'item') SQL query joined
	 * with OR if appropriate
	 *
	 * @param	string	The field to search
	 * @param	array	The values searched on
	 * @return	object
	 */
        public function or_where_not_in($key = NULL, $values = NULL){
            $this->db->or_where_not_in($key, $values);
	}
	// --------------------------------------------------------------------

	/**
	 * Like
	 *
	 * Generates a %LIKE% portion of the query. Separates
	 * multiple calls with AND
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function like($field, $match = '', $side = 'both'){
	    $this->db->like($field, $match, $side);
	}
	// --------------------------------------------------------------------

	/**
	 * Not Like
	 *
	 * Generates a NOT LIKE portion of the query. Separates
	 * multiple calls with AND
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function not_like($field, $match = '', $side = 'both'){
	    $this->db->not_like($field, $match, $side);
	}
	// --------------------------------------------------------------------

	/**
	 * OR Like
	 *
	 * Generates a %LIKE% portion of the query. Separates
	 * multiple calls with OR
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function or_like($field, $match = '', $side = 'both'){
            $this->db->or_like($field, $match, $side);
	}
	// --------------------------------------------------------------------

	/**
	 * OR Not Like
	 *
	 * Generates a NOT LIKE portion of the query. Separates
	 * multiple calls with OR
	 *
	 * @param	mixed
	 * @param	mixed
	 * @return	object
	 */
        public function or_not_like($field, $match = '', $side = 'both'){
            $this->db->or_not_like($field, $match, $side);
	}
	// --------------------------------------------------------------------

	/**
	 * GROUP BY
	 *
	 * @param	string
	 * @return	object
	 */
        public function group_by($by){
            $this->db->group_by($by);
        }
	// --------------------------------------------------------------------

	/**
	 * Sets the HAVING value
	 *
	 * Separates multiple calls with AND
	 *
	 * @param	string
	 * @param	string
	 * @return	object
	 */
        public function having($key, $value = '', $escape = TRUE){
            $this->db->having($key, $value, $escape);
	}
	// --------------------------------------------------------------------

	/**
	 * Sets the OR HAVING value
	 *
	 * Separates multiple calls with OR
	 *
	 * @param	string
	 * @param	string
	 * @return	object
	 */
        public function or_having($key, $value = '', $escape = TRUE){
            $this->db->or_having($key, $value, $escape);
	}
	// --------------------------------------------------------------------

	/**
	 * Sets the ORDER BY value
	 *
	 * @param	string
	 * @param	string	direction: asc or desc
	 * @return	object
	 */
        public function order_by($orderby, $direction = ''){
            $this->db->order_by($orderby, $direction);
        }
	// --------------------------------------------------------------------

	/**
	 * Sets the LIMIT value
	 *
	 * @param	integer	the limit value
	 * @param	integer	the offset value
	 * @return	object
	 */
        public function limit($value, $offset = ''){
            $this->db->limit($value, $offset);
        }
	// --------------------------------------------------------------------

	/**
	 * Sets the OFFSET value
	 *
	 * @param	integer	the offset value
	 * @return	object
	 */
        public function offset($offset){
            $this->db->offset($offset);
        }
	// --------------------------------------------------------------------

	/**
	 * The "set" function.  Allows key/value pairs to be set for inserting or updating
	 *
	 * @param	mixed
	 * @param	string
	 * @param	boolean
	 * @return	object
	 */
        public function set($key, $value = '', $escape = TRUE){
            $this->db->set($key, $value, $escape);
        }
	// --------------------------------------------------------------------

	/**
	 * Get
	 *
	 * Compiles the select statement based on the other functions called
	 * and runs the query
	 *
	 * @param	string	the table
	 * @param	string	the limit clause
	 * @param	string	the offset clause
	 * @return	object
	 */
        public function get($table = '', $limit = null, $offset = null){
            return $result = $this->db->get($table, $limit, $offset);
        }
	/**
	 * "Count All Results" query
	 *
	 * Generates a platform-specific query string that counts all records
	 * returned by an Active Record query.
	 *
	 * @param	string
	 * @return	string
	 */
        public function count_all_results($table,$where = NULL){
            if(!empty($where))$this->db->where($where);
            return $total = $this->db->count_all_results($table);
        }
	// --------------------------------------------------------------------

	/**
	 * Get_Where
	 *
	 * Allows the where clause, limit and offset to be added directly
	 *
	 * @param	string	the where clause
	 * @param	string	the limit clause
	 * @param	string	the offset clause
	 * @return	object
	 */
        public function get_where($table = '', $where = null, $limit = null, $offset = null){
            return $result = $this->db->get_where($table, $where, $limit, $offset);
        }
	// --------------------------------------------------------------------

	/**
	 * Insert_Batch
	 *
	 * Compiles batch insert strings and runs the queries
	 *
	 * @param	string	the table to retrieve the results from
	 * @param	array	an associative array of insert values
	 * @return	object
	 */
        public function insert_batch($table = '', $values = NULL){
            return $result = $this->db->insert_batch($table, $values);
        }
	// --------------------------------------------------------------------

	/**
	 * The "set_insert_batch" function.  Allows key/value pairs to be set for batch inserts
	 *
	 * @param	mixed
	 * @param	string
	 * @param	boolean
	 * @return	object
	 */
        public function set_insert_batch($key, $value = '', $escape = TRUE){
            $this->db->set_insert_batch($key, $value, $escape);
        }
	// --------------------------------------------------------------------

	/**
	 * Insert
	 *
	 * Compiles an insert string and runs the query
	 *
	 * @param	string	the table to insert data into
	 * @param	array	an associative array of insert values
	 * @return	object
	 */
        public function insert($table = '', $values = NULL){
            return $result = $this->db->insert($table, $values);
        }
	// --------------------------------------------------------------------

	/**
	 * Replace
	 *
	 * Compiles an replace into string and runs the query
	 *
	 * @param	string	the table to replace data into
	 * @param	array	an associative array of insert values
	 * @return	object
	 */
        public function replace($table = '', $set = NULL){
            return $result = $this->db->replace($table, $set);
        }
	// --------------------------------------------------------------------

	/**
	 * Update
	 *
	 * Compiles an update string and runs the query
	 *
	 * @param	string	the table to retrieve the results from
	 * @param	array	an associative array of update values
	 * @param	mixed	the where clause
	 * @return	object
	 */
        public function update($table = '', $values = NULL, $where = NULL, $limit = NULL){
            return $result = $this->db->update($table, $values, $where, $limit);
        }
	// --------------------------------------------------------------------

	/**
	 * Update_Batch
	 *
	 * Compiles an update string and runs the query
	 *
	 * @param	string	the table to retrieve the results from
	 * @param	array	an associative array of update values
	 * @param	string	the where key
	 * @return	object
	 */
        public function update_batch($table = '', $values = NULL, $index = NULL){
            return $result = $this->db->update_batch($table, $values, $index);
        }
	// --------------------------------------------------------------------

	/**
	 * The "set_update_batch" function.  Allows key/value pairs to be set for batch updating
	 *
	 * @param	array
	 * @param	string
	 * @param	boolean
	 * @return	object
	 */
        
        public function set_update_batch($key, $index = '', $escape = TRUE){
            return $result = $this->db->set_update_batch($key, $index, $escape);
        }
	// --------------------------------------------------------------------

	/**
	 * Empty Table
	 *
	 * Compiles a delete string and runs "DELETE FROM table"
	 *
	 * @param	string	the table to empty
	 * @return	object
	 */
        public function empty_table($table = ''){
            return $result = $this->db->empty_table($table);
        }
	// --------------------------------------------------------------------

	/**
	 * Truncate
	 *
	 * Compiles a truncate string and runs the query
	 * If the database does not support the truncate() command
	 * This function maps to "DELETE FROM table"
	 *
	 * @param	string	the table to truncate
	 * @return	object
	 */
        public function truncate($table = ''){
            return $result = $this->db->truncate($table);
        }
	// --------------------------------------------------------------------

	/**
	 * Delete
	 *
	 * Compiles a delete string and runs the query
	 *
	 * @param	mixed	the table(s) to delete from. String or array
	 * @param	mixed	the where clause
	 * @param	mixed	the limit clause
	 * @param	boolean
	 * @return	object
	 */
	public function delete($table = '', $where = '', $limit = NULL, $reset_data = TRUE){
            return $result = $this->db->delete($table, $where, $limit, $reset_data);
        }        
              
        

        private function makecomma($input){
            // This function is written by some anonymous person - I got it from Google
            if(strlen($input)<=2)
            { return $input; }
            $length=substr($input,0,strlen($input)-2);
            $formatted_input = $this->makecomma($length).",".substr($input,-2);
            return $formatted_input;
        }

        public function MoneyBDT($num){
            // This is my function
            $pos = strpos((string)$num, ".");
            if ($pos === false) { $decimalpart="00";}
            else { $decimalpart= substr($num, $pos+1, 2); $num = substr($num,0,$pos); }

            if(strlen($num)>3 & strlen($num) <= 12){
                        $last3digits = substr($num, -3 );
                        $numexceptlastdigits = substr($num, 0, -3 );
                        $formatted = $this->makecomma($numexceptlastdigits);
                        $stringtoreturn = $formatted.",".$last3digits ;
            }elseif(strlen($num)<=3){
                        $stringtoreturn = $num ;
            }elseif(strlen($num)>12){
                        $stringtoreturn = number_format($num, 2);
            }

            if(substr($stringtoreturn,0,2)=="-,"){$stringtoreturn = "-".substr($stringtoreturn,2 );}

            return $stringtoreturn;
        }
        
        public function TimeDifference($date){
            
            $diff = $date - time();
            if($diff < 1){
                return $value = array('int'=>0,'string'=>'minutes');
            }
            $temp = $diff/86400; 
            $days = floor($temp); 
            if($days > 1){
                return $value = array('int'=>$days,'string'=>'days'); 
            }
            $temp=24*($temp-$days); 
            $hours = floor($temp); 
            if($hours > 1){
                return $value = array('int'=>$hours,'string'=>'hours'); 
            }
            $temp = 60*($temp-$hours); 
            $minutes = floor($temp); 
            if($minutes > 1){
                return $value = array('int'=>$minutes,'string'=>'minutes');
            }
            return $value = array('int'=>1,'string'=>'minute'); 
        }
        
        public function plural( $count, $text ) { 
            $count = floor($count);
            return $count . ( ( $count == 1 ) ? ( " $text" ) : ( " ${text}s" ) );
        }
 
        public function ago( $date ) {
            $interval = time() - $date;
            if ( ($interval/(60*60*24*365)) >= 1 ) return $this->plural( $interval/(60*60*24*365), 'year' );
            if ( ($interval/(60*60*24*30)) >= 1 ) return $this->plural( $interval/(60*60*24*30), 'month' );
            if ( ($interval/(60*60*24)) >= 1 ) return $this->plural( $interval/(60*60*24), 'day' );
            if ( ($interval/(60*60)) >= 1 ) return $this->plural( $interval/(60*60), 'hour' );
            if ( ($interval/(60)) >= 1 ) return $this->plural( $interval/(60), 'minute' );
            return $this->plural( $interval, 'second' );
        }
        public function getUrlFriendlyString($str){
                $str = trim($str);
                $str = preg_replace('/\s\s+/', ' ', $str);
                $str = str_replace(array(' ','–','”','"','$','.','_','+','!','*',"'",'(',')',',','\\',';','/','?',':','@','=','&','<','>','|','{','}','[',']','^','`','~','।','-'), "-", $str);
                return urlencode($str);
        }
        
        public function url_check($url = '', $table){
                if (empty($url))
                {
                        return FALSE;
                }
                $url = $this->getUrlFriendlyString($url);
                $original_url = $url;
                for($i = 1; $this->db->where('url', $url)->count_all_results($table) > 0; $i++)$url = $original_url.'-'. $i;
                return $url;
        }
        
        public function _render_backend($view, $data=null, $render=false){
		$viewdata               = (empty($data)) ? array() : $data;
                $viewdata['site']       = $this->get('site')->row();
                $viewdata['controller'] = $this->uri->segment(1, 'dashboard');
                $viewdata['method']     = $this->uri->segment(2, 'index');
                $viewdata['url']        = $this->uri->segment(3, '');
                $viewdata['user']       = $this->ion_auth->user()->row();
                $view_html              = $this->load->view('backend/header', $viewdata, $render);
		$view_html             .= $this->load->view($view);
                $view_html             .= $this->load->view('backend/footer');
		if (!$render) return $view_html;
	}
        public function _render_frontend($view, $data=null, $render=false){
		$viewdata                   = (empty($data)) ? array() : $data;
                $viewdata['site']           = $this->get('site')->row();
                $viewdata['controller']     = $this->uri->segment(1, 'home');
                $viewdata['method']         = $this->uri->segment(2, 'index');
                $viewdata['url']            = $this->uri->segment(3, '');
                $viewdata['user']           = $this->ion_auth->user()->row();
                $viewdata['zetta_language'] = $this->session->userdata('zetta_language') ? $this->session->userdata('zetta_language') : 'english';
                $view_html                  = $this->load->view('frontend/header', $viewdata, $render);
		$view_html                 .= $this->load->view($view);
                $view_html                 .= $this->load->view('frontend/footer');
		if (!$render) return $view_html;
	}        
        public function textToHTML($str){
                $order   = array("  ");
                $replace = '&nbsp;&nbsp;';
                $str = str_replace($order, $replace, $str);
                $order   = array("\r\n", "\n", "\r");
                $replace = '<br />';
                $str = str_replace($order, $replace, $str);
                $order   = array("\t");
                $replace = '<br />';
                $newstr = str_replace($order, $replace, $str);
                return $newstr;
        }
        public function send_sms($phone, $text){
        }
        function random_string($qtd){ 
            $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZabcdefghijklmnopqrstuvwxyz'; 
            $QuantidadeCaracteres = strlen($Caracteres); 
            $QuantidadeCaracteres--; 

            $Hash=NULL; 
                for($x=1;$x<=$qtd;$x++){ 
                    $Posicao = rand(0,$QuantidadeCaracteres); 
                    $Hash .= substr($Caracteres,$Posicao,1); 
                } 

            return $Hash; 
        }
        function random_number($qtd){ 
            $Caracteres = '0123456789'; 
            $QuantidadeCaracteres = strlen($Caracteres); 
            $QuantidadeCaracteres--; 

            $Hash=NULL; 
                for($x=1;$x<=$qtd;$x++){ 
                    $Posicao = rand(0,$QuantidadeCaracteres); 
                    $Hash .= substr($Caracteres,$Posicao,1); 
                } 

            return $Hash; 
        }
        function convert_number_to_words($number){
                $hyphen      = '-';
                $conjunction = ' and ';
                $separator   = ', ';
                $negative    = 'negative ';
                $decimal     = ' point ';
                $dictionary  = array(
                    0                   => 'zero',
                    1                   => 'one',
                    2                   => 'two',
                    3                   => 'three',
                    4                   => 'four',
                    5                   => 'five',
                    6                   => 'six',
                    7                   => 'seven',
                    8                   => 'eight',
                    9                   => 'nine',
                    10                  => 'ten',
                    11                  => 'eleven',
                    12                  => 'twelve',
                    13                  => 'thirteen',
                    14                  => 'fourteen',
                    15                  => 'fifteen',
                    16                  => 'sixteen',
                    17                  => 'seventeen',
                    18                  => 'eighteen',
                    19                  => 'nineteen',
                    20                  => 'twenty',
                    30                  => 'thirty',
                    40                  => 'fourty',
                    50                  => 'fifty',
                    60                  => 'sixty',
                    70                  => 'seventy',
                    80                  => 'eighty',
                    90                  => 'ninety',
                    100                 => 'hundred',
                    1000                => 'thousand',
                    1000000             => 'million',
                    1000000000          => 'billion',
                    1000000000000       => 'trillion',
                    1000000000000000    => 'quadrillion',
                    1000000000000000000 => 'quintillion'
                );

                if (!is_numeric($number)) {
                    return false;
                }

                if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
                    // overflow
                    trigger_error(
                        '$this->convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                        E_USER_WARNING
                    );
                    return false;
                }

                if ($number < 0) {
                    return $negative . $this->convert_number_to_words(abs($number));
                }

                $string = $fraction = null;

                if (strpos($number, '.') !== false) {
                    list($number, $fraction) = explode('.', $number);
                }

                switch (true) {
                    case $number < 21:
                        $string = $dictionary[$number];
                        break;
                    case $number < 100:
                        $tens   = ((int) ($number / 10)) * 10;
                        $units  = $number % 10;
                        $string = $dictionary[$tens];
                        if ($units) {
                            $string .= $hyphen . $dictionary[$units];
                        }
                        break;
                    case $number < 1000:
                        $hundreds  = $number / 100;
                        $remainder = $number % 100;
                        $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                        if ($remainder) {
                            $string .= $conjunction . $this->convert_number_to_words($remainder);
                        }
                        break;
                    default:
                        $baseUnit = pow(1000, floor(log($number, 1000)));
                        $numBaseUnits = (int) ($number / $baseUnit);
                        $remainder = $number % $baseUnit;
                        $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                        if ($remainder) {
                            $string .= $remainder < 100 ? $conjunction : $separator;
                            $string .= $this->convert_number_to_words($remainder);
                        }
                        break;
                }

                if (null !== $fraction && is_numeric($fraction)) {
                    $string .= $decimal;
                    $words = array();
                    foreach (str_split((string) $fraction) as $number) {
                        $words[] = $dictionary[$number];
                    }
                    $string .= implode(' ', $words);
                }

                return $string;
        }
}