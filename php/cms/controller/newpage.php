<?php

 Class Newpage extends Controller {
   private $database;

   public function __construct() {
     $this->database = $this->DatabaseInit();
   }

   public function Index() {
     $result = $this->database->ReadData(["query" => ""]);
     $this->view("view/pages/home/home.php", [
       "result" => $result
     ]);
   }
 }
