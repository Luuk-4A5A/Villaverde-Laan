<?php

class IndexModel {
	public $dbhandler;

	public function __construct() {
		$this->dbhandler = new Dbhandler(SERVER_NAME, DB_NAME, DB_USERNAME, DB_PASSWORD);
	}

	public function index() {

	}
}
