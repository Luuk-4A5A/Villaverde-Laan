<?php

require('cookie.class.php');

class StandardModel {
	public $cookieHandler;

	public function __construct() {
		$this->cookieHandler = new CookieHandler('testCookie');
		if(!$this->cookieHandler->cookieIsset()) {
			$this->cookieHandler->SetCookie(['formcookie' => '']);
		}
	}

	public function setForm() {
		 $cookie = $this->cookieHandler->readCookie(); 
		return (isset($cookie['formcookie']) && $cookie['formcookie'] === 'done it') ? '' : '<form method="post"><input type="submit" name="cookiePost" value="accept cookie plz"></form>';
	}

	public function SetTheCookie() {
		$this->cookieHandler->updateCookie(['formcookie' => 'done it']);
		// $this->cookieHandler->unsetCookie();
	}
}