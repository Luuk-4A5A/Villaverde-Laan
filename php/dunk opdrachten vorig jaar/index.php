<?php

class Router {

  public function __construct() {
    $url = (isset($_GET['url']) && $_GET['url'] != '') ? $_GET['url'] : '';
    $packets = explode('/', $url);
    $this->determineDestination($packets);
  }

  public function determineDestination($packets = '') {
  	$parameters = [];

  	for($i = 2; $i < count($packets); $i++) {
		  array_push($parameters, $packets[$i]);
  	}

  	$this->sendToDestination($packets[0], $packets[1], $parameters);
  }

  public function sendToDestination($classname, $method, $params) {
  	require_once('controller/' . $classname . '.php');
   	$obj = new $classname;
  	call_user_func_array([$obj, $method], $params);
  }
}

// require_once('model/TemplatingSystem.php');

// $template = new TemplatingSystem('model/default.tpl');

$router = new Router();
