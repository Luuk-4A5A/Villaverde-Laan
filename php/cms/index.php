<?php

require_once('config.php');

Class Router {
  private $url;
  private $errorPage = 'view/pages/error/404.php';

  public function __construct() {
    $this->url = (isset($_GET['url'])) ? $_GET['url'] : '';
    $this->url = explode('/', $this->url);
    $this->DetermineDestination($this->url);

  }

  private function DetermineDestination($urlArray) {
    $class = (isset(array_values($urlArray)[0]) && array_values($urlArray)[0] !== '') ? array_values($urlArray)[0] : 'Index';
    $method = (isset(array_values($urlArray)[1]) && array_values($urlArray)[1] !== '') ? array_values($urlArray)[1] : 'Index';
    $parameters = [];

    for($i = 2; $i < count($urlArray); $i++) {
      array_push($parameters, $urlArray[$i]);
    }

    $this->SendToDestination($class, $method, $parameters);

  }

  private function SendToDestination($class, $method, $parameters) {

    if(!file_exists('controller/' . $class . '.php')) {
      require_once($this->errorPage);
      return false;
    }

    require_once('controller/' . $class . '.php');

    if(!class_exists($class)) {
      require_once($this->errorPage);
      return false;
    }

    $classInstance = new $class();

    if(!method_exists($classInstance, $method)) {
      require_once($this->errorPage);
      return false;
    }

    call_user_func_array([$classInstance, $method], $parameters);

  }
}

$router = new Router();
