<?php

require_once('model/HtmlGenerator.php');
require_once('model/dbhandler.php');



class ContactsService {
	public $htmlhandler;

	public function __construct() {
		$this->htmlhandler = new HtmlGenerator();
	}

	public function setDbHandler() {
		return new DbHandler('localhost', 'mvc', 'root', '');
	}

	public function createSelectbox($selected = 0) {
		$dbhandler = $this->setDbHandler();
		$returnValue = $dbhandler->readData(['selectQuery' => 'SELECT person.id, person.name FROM person']);
		return $this->htmlhandler->createSelectbox($returnValue, $selected);
	}

	public function readContacts($orderby, $id) {
		$this->dbhandler = $this->setDbHandler();
		$id = htmlentities($id);
		$id = mysql_real_escape_string($id);


		if(isset($id) && $id == '') {
			$data = $this->dbhandler->ReadData(['selectQuery' => 'SELECT * FROM person ORDER BY ' . $orderby]);
			$count = 0;

			$prefix = ['name' => '<a href="/?op=list&orderby=name">', 'phone' => '<a href="/?op=list&orderby=phone">', 'email' => '<a href="/?op=list&orderby=email">'];
			$suffix = ['name' => '</a>', 'phone' => '</a>', 'email' => '</a>'];

			$personData = $this->htmlhandler->createTable($data, $prefix, $suffix);
				
			return $personData;
		} elseif(isset($id) && $id != '') {
			$personData = $this->htmlhandler->createTable($this->dbhandler->ReadData(['selectQuery' => 'SELECT * FROM person WHERE id = ' . $id]), [], []);
			return $personData;
		}	
	}

	public function generateSelectBoxes($id) {
		$dbhandler = $this->setDbHandler();
		$array = [];
		$nameArray = $dbhandler->readData(['selectQuery' => 'SELECT person.id, person.name FROM person']);
		$emailArray = $dbhandler->readData(['selectQuery' => 'SELECT person.id, person.email FROM person']);
		$phoneArray = $dbhandler->readData(['selectQuery' => 'SELECT person.id, person.phone FROM person']);
		$array[0] = $nameArray;
		$array[1] = $emailArray;
		$array[2] = $phoneArray;
		return $array;
	}

	public function createUser($array) {
		$dbhandler = $this->setDbHandler();
		$sql = 'INSERT INTO person (name, email, phone, adress) VALUES ("' . $array['name'] . '", "' . $array['email'] . '", "' . $array['phone'] . '", "' . $array['city'] . '");';
		$dbhandler->createdata($sql);
	}

	public function updateUser($array, $id) {
		$dbhandler = $this->setDbHandler();
		$sql = 'UPDATE `person` SET `name`= "' . $array['name'] . '",`phone`= "' . $array['phone'] . '" ,`email`="' . $array['email'] . '",`adress`="' . $array['city'] . '"  WHERE id = ' . $id;
		$dbhandler->UpdateData($sql);
	}

	public function getUser($id) {
		$dbhandler = $this->setDbHandler();
		$return = $dbhandler->readData(['selectQuery' => 'SELECT * FROM person WHERE id = ' . $id]);
		$string = '<form>';
		$string .= '<input disabled type="text" value="' . $return[0]['name'] . '"><br><br>';
		$string .= '<input disabled type="text" value="' . $return[0]['email'] . '"><br><br>';
		$string .= '<input disabled type="text" value="' . $return[0]['adress'] . '"><br><br>';
		$string .= '<input disabled type="text" value="' . $return[0]['phone'] . '"><br><br>';
		$string .= '<a onclick="processDelete(' . $return[0]['id'] . ')" href="javascript:;">Delete user</a>';
		$string .= '</form>';
		return $string;
	}

	public function getUserupdate($id) {
		$dbhandler = $this->setDbHandler();
		$return = $dbhandler->readData(['selectQuery' => 'SELECT * FROM person WHERE id = ' . $id]);
		$string = '<form>';
		$string .= '<input type="text" value="' . $return[0]['name'] . '"><br><br>';
		$string .= '<input type="text" value="' . $return[0]['email'] . '"><br><br>';
		$string .= '<input type="text" value="' . $return[0]['adress'] . '"><br><br>';
		$string .= '<input type="text" value="' . $return[0]['phone'] . '"><br><br>';
		$string .= '<a onclick="processUpdate(' . $return[0]['id'] . ')" href="javascript:;">Update user</a>';
		$string .= '</form>';
		return $string;
	}

	public function deleteContacts($id) {
		$dbhandler = $this->setDbHandler();
		$return = $dbhandler->deleteData('DELETE FROM `person` WHERE id = ' . $id);
		return $return;
	}
}