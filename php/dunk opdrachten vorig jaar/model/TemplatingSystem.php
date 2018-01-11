<?php

require_once('FileHandler.php');

class TemplatingSystem {
	public $template = 'default.tpl';
	private $errors = [];
	private $fileHandler;
	public $readTemplate = false;


	public function __construct($template) {

		$this->fileHandler = new FileHandler($this->template);

		if(!$this->fileHandler->file_does_exist($template))
			$this->errors['fileExist'] = 'File does not exist';
		if($this->fileHandler->checkExtension($template) !== 'tpl')
			$this->errors['extension'] = 'Not the right extension';

		if(is_array($this->errors) && empty($this->errors)) {
			$this->template = $template;
			$this->readTemplate();
		}

		// print_r($this->errors);
	}

	public function readTemplate() {
		$this->fileString = $this->fileHandler->readTheFile($this->template);

		if($this->fileString) {
			$this->readTemplate = true;
		} else {
			$this->errors['readFile'] = 'file has not been set';
		}
	}

	public function setTemplateData($pattern, $replacement = '') {
		if($this->readTemplate) {
			if(is_array($pattern)) {
				foreach($pattern as $key => $value) {
					$this->fileString = preg_replace('#\{' . $key . '\}#is', $value, $this->fileString);
				}
			} else {
				$this->fileString = preg_replace('#\{' . $pattern . '\}#is', $replacement, $this->fileString);
			}
		}
	}

	public function parseTemplate() {
		if(is_array($this->errors) && empty($this->errors)) {
			if(!$this->readTemplate) {
				$this->readTemplate();
			}

			return $this->fileString;
		} else {
			return $this->errors;
		}

	}

}
