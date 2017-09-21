<?php

require('model/dbhandler.php');
require('model/HtmlGenerator.php');

class DashboardModel {
	public $dbHandler;
	public $HtmlGenerator;


	public function __construct() {
		$this->HtmlGenerator = new HtmlGenerator();
		$this->dbHandler = new DbHandler(SERVER_NAME, DB_NAME, DB_USERNAME, DB_PASSWORD);

	}

	public function getUsers() {
		$result = $this->dbHandler->readData(['selectQuery' => 'SELECT id, username, GUID, creation_date, status FROM users']);
		return $this->HtmlGenerator->createUserSchema($result, '/dashboard/users/edit/');
	}

	public function editUser($parameters) {
		/*Getting user information via url.*/
		$userInfo = $this->dbHandler->readData(['selectQuery' => 'SELECT username, GUID, creation_date FROM users WHERE id = :id', 'bindParam' => [':id' => $parameters[1]]]);
		/*Get all the status options so we can use it to update the user status.*/
		//$statusInfo = $this->dbhandler->readData(['selectQuery' => 'SELECT id, status FROM status']);

		$editForm = $this->HtmlGenerator->createUpdateForm($userInfo, 'dashboard/one');
	    require('view/pages/dashboard/users/editUser.php');

	}

	public function viewUsers($parameters) {
    	$users = $this->getUsers();
    	require('view/pages/dashboard/users/user.php');
  	}


}