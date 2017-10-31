<?php

class About extends Controller {
	public $standard;
	public $dbhandler;
	public $content;

	public function __construct() {
		$this->content = $this->model('content');
		$this->standard = $this->model('StandardModel');
		$this->htmlgenerator = $this->model('htmlgenerator');
	}

	public function standard() {
		$content = $this->content->getContent('about');
		$menuItems = $this->content->getMenu();
		$menu = $this->htmlgenerator->createMenu($menuItems);

		$this->view('about/about.php', [
			'menu' => $menu,
			'content' => $content[0]['content'],
		]);
	}
}
