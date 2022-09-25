<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


abstract class Connection
{

    abstract public function get($url, $headers);

    abstract public function post($url, $requestBody, $headers);

    abstract public function delete($url, $headers);
}
