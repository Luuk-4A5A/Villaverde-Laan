<?php

require('model/standard.php');

class Standard {
	public $standard;

	public function __construct() {
		$this->standard = new StandardModel();

	}

	public function ajax() {

	}

	public function standard() {
		if(isset($_POST['subButton'])) {
			echo $this->standard->handleFile($_FILES);
		}


		require_once('view/pages/home/home.php');
	}
}
