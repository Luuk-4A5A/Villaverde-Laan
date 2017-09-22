<?php
require('model/ajax.php');


class Ajax {
	public $ajaxModel;
	public $counter;

	public function __construct() {
		session_start();
		$this->ajaxModel = new AjaxModel();
	}

	public function standard() {
		if(!isset($_POST) || empty($_POST)) {
			header('location: /');
		} else {
			$result = $this->ajaxModel->calcBMI($_POST['height'], $_POST['weight']);
			$guid = $this->gen_uuid();
			$_SESSION[$guid]['height'] = $_POST['height'];
			$_SESSION[$guid]['weight'] = $_POST['weight'];
			$_SESSION[$guid]['result'] = $result;
			echo json_encode(['result' => $_SESSION]);
		}
	}

// HEB IK VAN HET INTERNET GEPAKT VOOR GEMAKKELIJKHEID

	public function gen_uuid() {
	    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
	        // 32 bits for "time_low"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

	        // 16 bits for "time_mid"
	        mt_rand( 0, 0xffff ),

	        // 16 bits for "time_hi_and_version",
	        // four most significant bits holds version number 4
	        mt_rand( 0, 0x0fff ) | 0x4000,

	        // 16 bits, 8 bits for "clk_seq_hi_res",
	        // 8 bits for "clk_seq_low",
	        // two most significant bits holds zero and one for variant DCE1.1
	        mt_rand( 0, 0x3fff ) | 0x8000,

	        // 48 bits for "node"
	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
	    );
	}

}
