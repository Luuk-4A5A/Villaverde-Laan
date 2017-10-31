<?php

class Contact extends Controller {
	public $standard;
	public $dbhandler;
	public $content;

	public function __construct() {
		$this->standard = $this->model('StandardModel');
		$this->content = $this->model('content');
		$this->htmlgenerator = $this->model('htmlgenerator');
	}

	public function standard() {
		$content = $this->content->getContent('contact');
		$menuItems = $this->content->getMenu();
		$menu = $this->htmlgenerator->createMenu($menuItems);


		$this->view('contact/contact.php', [
			'menu' => $menu,
			'content' => $content[0]['content'],
		]);
	}
}
