<?php

class Validation {

  //Check if the given username actually is alphanumeric.
  public function validateUsername($username) {
    if(preg_match('/^\w{5,}$/', $username)) {
      return true;
    }
  }

}
