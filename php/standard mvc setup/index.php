<?php
// ini_set('display_errors',1); ini_set('display_startup_errors',1); error_reporting(-1);
require('config.php');

class Router {

  public function __construct() {
    $url = (isset($_GET['url']) && $_GET['url'] != '') ? $_GET['url'] : '';
    $packets = explode('/', $url);
    $this->determineDestination($packets);
  }

  public function determineDestination($packets = '') {
  	$parameters = [];

    $class = (!isset($packets[0]) || $packets[0] == '') ? 'index' : $packets[0];
    $method = (!isset($packets[1]) || $packets[1] == '') ? 'index' : $packets[1];

  	for($i = 2; $i < count($packets); $i++) {
		  array_push($parameters, $packets[$i]);
  	}

  	$this->sendToDestination($class, $method, $parameters);
  }

  public function sendToDestination($classname, $method, $params) {
      if(file_exists('controller/' . $classname . '.php')) {
        require_once('controller/' . $classname . '.php');
       	$obj = new $classname;
      } else {
        require_once('view/pages/error/404.php');
        return false;
      }

      if(method_exists($obj, $method)) {
        call_user_func_array([$obj, $method], $params);
        return true;
      } else {
        require_once('view/pages/error/404.php');
      }
    }
}

$router = new Router();
