<?php


class Index extends Controller {
	public $index;
	public $dbhandler;

	public function __construct() {
		$this->index = $this->model('IndexModel');
	}

	public function index() {

		$this->view('home/home.php', [

		]);
	}
}
