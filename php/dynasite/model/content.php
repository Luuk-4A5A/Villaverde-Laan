<?php

Class Content {
  public $dbhandler;

  public function __construct() {
    $this->dbhandler = new Dbhandler(SERVER_NAME, DB_NAME, DB_USERNAME, DB_PASSWORD);
  }

  public function getContent($page) {
    return $this->dbhandler->readData(['selectQuery' => 'SELECT content.content FROM `content` INNER JOIN pages ON content.pages_page_id = pages.page_id WHERE pages.page_name = :page', 'bindParam' => [':page' => $page]]);
	}

  public function getMenu() {
    return $this->dbhandler->readData(['selectQuery' => 'SELECT pages.page_name, pages.active FROM pages WHERE pages.active = 1']);
  }

}
