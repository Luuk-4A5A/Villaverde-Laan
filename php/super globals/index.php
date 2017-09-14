<?php

require('config.php');

class Router {

  public function __construct() {
    $url = (isset($_GET['url']) && $_GET['url'] != '') ? $_GET['url'] : '';
    $packets = explode('/', $url);
    $this->determineDestination($packets);
  }

  public function determineDestination($packets = '') {
  	$parameters = [];

    $class = (!isset($packets[0]) || $packets[0] == '') ? 'standard' : $packets[0];
    $method = (!isset($packets[1]) || $packets[1] == '') ? 'standard' : $packets[1];

  	for($i = 2; $i < count($packets); $i++) {
		  array_push($parameters, $packets[$i]);
  	}

  	$this->sendToDestination($class, $method, $parameters);
  }

  public function sendToDestination($classname, $method, $params) {
    	require_once('controller/' . $classname . '.php');
     	$obj = new $classname;
      call_user_method($method, $obj, $params);
    }
}

$router = new Router();