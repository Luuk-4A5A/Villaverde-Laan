<?php

Class Index extends Controller {
  private $database;
  private $filehandler;

  public function __construct() {
    $this->database = $this->DatabaseInit();
    $this->filehandler = $this->Model('filehandler', ['filename' => 'view/pages/error/404.php']);
  }

  public function Index() {
    $fileContent = $this->filehandler->CreateFile('controller/newpage.php',

'<?php

 Class Newpage extends Controller {
   private $database;

   public function __construct() {
     $this->database = $this->DatabaseInit();
   }

   public function Index() {
     $result = $this->database->ReadData(["query" => "SELECT * FROM user"]);
     $this->view("view/pages/home/home.php", [
       "result" => $result
     ]);
   }
 }

 ');
    $this->View('view/pages/home/home.php', [
      'fileContent' => $fileContent
    ]);
  }
}
