<?php

require('model/standard.php');

class Standard {
	public $standard;
	public $cookieBool = false;


	public function __construct() {
		$this->standard = new StandardModel();
		
	}

	public function standard() {

		$form = $this->standard->setForm();
		
		if(isset($_POST['cookiePost'])) {
			echo $this->standard->setTheCookie();
		}


		require_once('view/pages/home/home.php');
	}
}