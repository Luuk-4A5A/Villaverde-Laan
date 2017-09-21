<?php

include('model/user.php');
include('model/sessionHandle.php');

class LoginModel {
	private $user;
	private $sessionHandle;

	public function __construct() {
		$this->user = new User();
		$this->sessionHandle = new SessionHandle();
	}

	public function handleLoginRequest() {
		$checkLoginData = $this->user->login($_POST['username'], $_POST['password']);
		if(is_array($checkLoginData) && $checkLoginData != false) {
			//print_r($checkLoginData);
			$this->sessionHandle->addSingleItem('GUID', $checkLoginData[0]['GUID']);
			return json_encode(['location' => '/dashboard']);
		}
	}
}