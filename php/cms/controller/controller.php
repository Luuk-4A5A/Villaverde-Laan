<?php



Class Controller {
  public function DatabaseInit() {
    require_once('model/dbhandler.php');
    return new DbHandler(SERVERNAME, DATABASENAME, USERNAME, PASSWORD);;
  }

  public function Model($className, $parameters) {
    require_once('model/' . $className . '.php');
    return new $className($parameters);
  }

  public function View($url, $data) {
    require_once($url);
  }
}
