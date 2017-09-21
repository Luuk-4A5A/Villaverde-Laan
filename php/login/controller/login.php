<?php
require('model/login.php');


class Login {
	public $loginModel;


	public function __construct() {
		$this->loginModel = new LoginModel();

	}

	public function standard() {
		include('view/pages/login/login.php');
	}

	public function loginrequest() {
		if(!empty($_POST) && is_array($_POST)) {
			echo $this->loginModel->handleLoginRequest($_POST['username'], $_POST['password']);
		} else {
			header('location: /');
		}
		
	}
}
