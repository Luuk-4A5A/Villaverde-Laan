<?php
	class fileHandler { 
		public $fileName;
		public $extension;
		public $fileSizeInB;
		
		function __construct($fileName) {
			$this->fileName = $fileName;
		}
		
		public function readTheFile($fileName = '') {
			$file = fopen($fileName, "r");
			if(filesize($fileName) < 1 && file_exists($fileName)) {
				return '';
			} else {
				return fread($file, filesize($fileName));
			}
		}
		
		public function createNewFile($fileName, $content) {
			if(file_exists($fileName)) {
				return "this file already exists";
			} else {
				fopen($fileName, "a");
				$this->updateFileContent($fileName, $content);
				return "File has been made.";
			}
		}		
		public function updateFileContent($fileName, $content) {
				$file = fopen($fileName, "w", $content);
				fwrite($file, $content);
				fclose($file);
		}	
		
		public function updateFileName($oldFileName, $newFileName) {
				if(file_exists($newFileName)) {
					return "this file already exists";
				} else {
					rename($oldFileName, $newFileName);
				}
		}

		public function updateAllContent($oldFileName, $newFileName, $content) {
			$this->updateFileName($oldFileName, $newFileName);
			$this->updateFileContent($newFileName, $content);
		}
		
		public function deleteFile() {
			if(file_exists($this->fileName)) {
				unlink($this->fileName);
			}
		}

		public function multipleFiles($array, $path) {
			foreach($array as $fileName) {
				$this->createNewFile($path . $fileName, "");
			}
		}

		public function makeDir($path, $dirName) {
			mkdir($path . $dirName);
		}

		public function file_does_exist($file) {
			return file_exists($file);
		}

		private function getAllDirFiles($path) {
			foreach(glob($path . '/**') as $file) {
				if(is_dir($file)) {
					$this->getAllDirFiles($file);
				} else {
					echo $file . "<br>";
				}
			}
		}

		public function calcSize() {
			return filesize($this->fileName);
		}
		
		public function checkExtension($fileName) {
			return pathinfo($fileName, PATHINFO_EXTENSION);
		}
		
	}

	
	/*
		public function makeSelect($filesArray, $selectName) {
			$string = "<select id='selectId' class='longSelect' name='" . $selectName . "'>";
			foreach($filesArray as $file) {
				$string .= "<option value='" . $file . "'>" . $file . "</option>";
			}
			$string .= "</select>";
			return $string;
		}
	*/