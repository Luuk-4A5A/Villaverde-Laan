<?php

require('model/standard.php');

class Standard {
	public $standard;

	public function __construct() {
		$this->standard = new StandardModel();
	}

	public function standard() {
		echo '<pre>';
		print_r($this->standard->showArray($this->standard->sitemap, 'page 3'));
		echo '</pre>';
		// $findParent = $this->standard->findParent(1, $this->standard->treeArray);
		// $findChildren =  $this->standard->findChildren(6, $this->standard->treeArray);
		require_once('view/pages/home/home.php');
	}
}
