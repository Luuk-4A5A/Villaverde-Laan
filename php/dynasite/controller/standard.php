<?php


class Standard extends Controller {
	public $standard;
	public $dbhandler;
	public $content;
	public $htmlgenerator;

	public function __construct() {
		$this->content = $this->model('content');
		$this->standard = $this->model('StandardModel');
		$this->htmlgenerator = $this->model('htmlgenerator');
	}

	public function standard() {
		$content = $this->content->getContent('Home');
		$menuItems = $this->content->getMenu();
		$menu = $this->htmlgenerator->createMenu($menuItems);

		$this->view('home/home.php', [
			'menu' => $menu,
			'content' => $content[0]['content'],
		]);
	}
}
