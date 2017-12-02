<?php


class Standard extends Controller {
	public $standard;
	public $dbhandler;

	public function __construct() {
		$this->standard = $this->model('StandardModel');
	}

	public function standard() {



		$this->view('home/home.php', [
			'hoi' => 'mark',
		]);
	}
}
