<?php

require('model/standard.php');

class Standard {
	public $standard;

	public function __construct() {
		$this->standard = new StandardModel();
		
	}

	public function standard() {
		

		require_once('view/pages/home/home.php');
	}
}