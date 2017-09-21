<?php

class SessionHandle {
  public $sessionName;

  //Start the session up and give it a unique name or a default name
  public function __construct($sessionName = SESSION_DEFAULT) {
    session_start();
    $this->sessionName = $sessionName;
  }

  public function readSession() {
    return $_SESSION[$this->sessionName];
  }

  public function readSingleItem($itemName) {
    return (isset($_SESSION[$this->sessionName][$itemName])) ? $_SESSION[$this->sessionName][$itemName] : false;
  }

  public function addSingleItem($name, $content) {
    $_SESSION[$this->sessionName][$name] = $content;
    return $_SESSION[$this->sessionName];
  }

  public function deleteSingleItem($name) {
    unset($_SESSION[$this->sessionName][$name]);
    return $_SESSION[$this->sessionName];
  }

  public function addMultipleItems($itemArray) {
    foreach($itemArray as $key => $value) {
      $_SESSION[$this->sessionName][$key] = $value;
    }
  }
}
