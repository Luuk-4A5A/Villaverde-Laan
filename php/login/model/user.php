<?php

require('model/dbhandler.php');
require('model/validation.php');

class User {
  private $dbhandler;

  public function __construct() {
    $this->validation = new Validation();
    $this->dbhandler = new DbHandler(SERVER_NAME, DB_NAME, DB_USERNAME, DB_PASSWORD);
  }

  public function login($username, $password) {
    //Get information from a username, then check if the password is equal to the hashed password in the database.
    $loginData = $this->dbhandler->ReadData(['selectQuery' => 'SELECT id, password, GUID FROM users WHERE username = :username', 'bindParam' => [':username' => $username]]);
    //If the given password doesnt match, this will be given back.
    if(!is_array($loginData) || empty($loginData)){return false;}
    if(password_verify($password, $loginData[0]['password'])){return $loginData;} else {return false;}
  }

  public function logout() {

  }

// Create a new user for in the database
  public function createUser($username, $password, $status) {
    $error = [];
    //Validate the username so the username is alphanumeric.
    if(!$this->validation->validateUsername($username)){
      $error['username'] = true;
    }



    // Create a unique GUID to differentiate all the users.
    $guid =  md5(uniqid(rand(), true));
    //Create a timestamp thats simple but effective.
    $date = date('Y-m-d H:i:s');
    //Hash the password do its not easy to read even if the database is hacked.
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    //Insert the new user in the database.
    return $this->dbhandler->createdata('INSERT INTO users (username, password, GUID, creation_time) VALUES ("' . $username . '")');

  }

  public function deleteUser() {

  }

  public function editUser() {

  }

}
