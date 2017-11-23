<?php

function printr($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

abstract Class User {
  private $username;
  private $password;

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
  }


  public function getCredentials() {
    return [$this->username, $this->password];
  }

  /**
  * Check if given password is correct for this user
  * @param string $password
  * @return boolean
  */

  public function checkPassword($password) {
    return password_verify($password, $this->password);
  }

  public function changePassword($oldPassword, $newPassword) {
    if($this->checkPassword($oldPassword)) {
      $this->password = password_hash($newPassword, PASSWORD_BCRYPT);
    } else {
      return false;
    }
    return true;
  }

  abstract public function doSpecificAction($options = []);

}

class Supervisor extends User {
    public function doSpecificAction($options = []) {
      return true;
    }
}

class NormalUser extends User {
    public function doSpecificAction($options = []) {
      return true;
    }
}


$tomas = new NormalUser('tomas', 'legend32');

$tomas->changePassword('legend32', 'Markie123');

if($tomas->checkPassword('Markie123')) {
  printr($tomas->getCredentials());
}



$anna = new Supervisor('anna', 'whatevah96');
$anna->changePassword('whatevah96', 'Markie123');

if($anna->checkPassword('Markie123')) {
  printr($anna->getCredentials());
}
