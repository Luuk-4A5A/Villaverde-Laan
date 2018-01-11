<?php

require_once('model/ContactsService.php');
require_once('model/TemplatingSystem.php');


class ContactController {
	private $contactsService = NULL;
	public $id;
	public $orderby;

	public function __construct() {
		$this->contactsService = new contactsService();
		$this->id = isset($_GET['id']) ? $_GET['id'] : '';
		$this->orderby = isset($_GET['orderby']) ? $_GET['orderby'] : '';
	}

	public function handleRequest($array) {
		try {
			switch($array) {
				case 'list':
					$this->readAllData($array);
				break;
				case 'new':
					$this->createData($array);
				break;
				case 'template':
					$this->template($array);
				break;
				case 'delete':
					$this->deleteData($array);
				break;
				case 'show':
					$this->readAllData($array);
				break;
				case 'update':
					$this->updateData($array);
				break;
				case 'select':
					$this->createSelectbox($array);
				break;
				default:
					// $this->showError('Page not found, page operation' . $op . ' was not found');
			}
		} catch(Exception $e) {
			$this->showError('Application error', $e->getMessage());
		}
	}

	public function createSelectbox($paramArray) {
		if(isset($paramArray[1])) {
			$array = $this->contactsService->generateSelectBoxes($paramArray[1]);
			echo $this->contactsService->htmlhandler->createMultiSelectboxes($array, $paramArray[1], $paramArray[2]);
		}
	}

	public function template($array) {
		$template = new TemplatingSystem('view/default.tpl');
		$template->setTemplateData(['content' => 'dit is de content van de site.', 'header' => 'templating system']);
		echo $template->parseTemplate();
	}

	public function readAllData($array) {
		$selectBox = $this->contactsService->createSelectbox();
		$contacts = $this->contactsService->readContacts($array[1], $array[2]);
		$template = new TemplatingSystem('view/contacts.tpl');
		$template->setTemplateData(['contacts' => $contacts, 'selectBox' => $selectBox]);
		echo $template->parseTemplate();
	}

	public function deleteData($array) {
		$value = $this->contactsService->getUser($array[1]);

		if(isset($array[2]) && $array[2] == 'submit') {
			$this->contactsService->deleteContacts($array[1]);
			die();
		}

		$template = new TemplatingSystem('view/deleteuser.tpl');
		$template->setTemplateData(['form' => $value]);

		echo $template->parseTemplate();
	}

	public function createData($array) {
		if(isset($_POST['submit'])) {
			$this->contactsService->createUser($_POST);
		}
		include('view/createcontacts.php');
	}

	public function showError($name, $error) {
		echo $name;
		echo $error;
	}

	public function updateData($array) {
		if(isset($array[2]) && $array[2] == 'submit') {
			$this->contactsService->updateUser($_POST, $array[1]);
		}
		$value = $this->contactsService->getUserupdate($array[1]);
		$template = new TemplatingSystem('view/updateuser.tpl');
		$template->setTemplateData(['form' => $value]);
		echo $template->parseTemplate();
	}
}
