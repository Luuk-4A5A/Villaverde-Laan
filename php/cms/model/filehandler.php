<?php

Class FileHandler {
	public $fileName;

  public function __construct($fileName) {
    $this->fileName = $fileName['filename'];
  }

  public function ReadFile() {
    $file = fopen($this->fileName, "r");
    if(filesize($this->fileName) < 1 && file_exists($this->fileName)) {
      return "This file has no content";
    } else {
      return file_get_contents($this->fileName);
    }
  }

  public function CreateFile($fileName, $content) {
    if(file_exists($fileName)) {
      return "this file already exists";
    } else {
      fopen($fileName, "a");
      $this->updateFileContent($fileName, $content);
      return "File has been made.";
    }
  }

  public function UpdateFileContent($fileName, $content) {
    $file = fopen($fileName, "w", $content);
    fwrite($file, $content);
    fclose($file);
  }

  public function UpdateFileName($oldFileName, $newFileName) {
    if(file_exists($newFileName)) {
      return false;
    } else {
      rename($oldFileName, $newFileName);
      return true;
    }
  }
}
