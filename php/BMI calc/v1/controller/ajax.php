<?php
require('model/ajax.php');


class Ajax {
	public $ajaxModel;

	public function __construct() {
		$this->ajaxModel = new AjaxModel();
	}

	public function standard() {
		if(!isset($_POST) || empty($_POST)) {
			header('location: /');
		} else {
			$result = $this->ajaxModel->calcBMI($_POST['height'], $_POST['weight']);

			echo json_encode(['result' => $result]);
		}
	}
}