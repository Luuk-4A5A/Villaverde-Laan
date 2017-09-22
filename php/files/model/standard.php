<?php

class StandardModel {

	public function __construct() {

	}

	public function handleFile($file) {
		print_r($file);
		if(array_values($file)[0]['type'] == 'image/png' || array_values($file)[0]['type'] == 'image/jpeg') {
			$moveFile = $this->moveFile($file);
			if($moveFileS) {
				return '<br><img src="/view/css/images/' . array_values($file)[0]['name'] . '"><br>';
			} else {
				return 'something went wrong.';
			}
		}
	}

	public function moveFile($file) {
		if(move_uploaded_file(array_values($file)[0]['tmp_name'], 'D:/apache24/htdocs/view/css/images/' . array_values($file)[0]['name'])) {
			return 'D:/apache24/view/css/images';
		} else {
			return false;
		}
	}

}
