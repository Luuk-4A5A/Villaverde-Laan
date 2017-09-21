<?php

class AjaxModel {
	public function __construct() {
	}

	public function calcBMI($height, $weight) {
		return $weight / ($height * $height);
	}
}
