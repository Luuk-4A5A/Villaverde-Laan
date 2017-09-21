<?php

require('model/standard.php');

class Standard {
	public $standard;

	public function __construct() {
		setcookie('cookie', '1234', time() + 10000000);
		$this->standard = new StandardModel();
		
	}

	public function standard() {	
	print_r($_GET);
		require_once('view/pages/home/home.php');
	}
}