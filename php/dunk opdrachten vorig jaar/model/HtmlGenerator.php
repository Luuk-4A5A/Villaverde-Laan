<?php
class HtmlGenerator {

	public function createSelectbox($array, $selected = 1, $start = 1) {
		$string = '<select>';
		$count = $start;
		foreach($array as $row) {
			if($selected == $count) {
				$string .= '<option selected value="' . array_values($row)[0] . '">';
			} else {
				$string .= '<option value="' . array_values($row)[0] . '">';
			}
			$string .= array_values($row)[1];
			$string .= '</option>';
			$count++;
		}
		$string .= '</select>';
		return $string;
	}

	public function createMultiSelectboxes($array, $selected, $start = 1) {
		$string = '';
		foreach($array as $row) {
			$string .= $this->createSelectbox($row, $selected, $start);
		}
		return $string;
	}

	public function createTable($array, $prefix, $suffix) {
		$count = 0;
		$string = '<table>';
		$string .= '<tr>';
		foreach($array as $key => $value) {
			if($count < 1) {
				foreach($value as $key2 => $value2) {
					$string .= '<th>';
						foreach($prefix as $prefixKey => $prefixValue) {
							if($key2 == $prefixKey) {
								$string .= $prefixValue;
								break;
							}
						}

						$string .= $key2;
						
						foreach($suffix as $suffixKey => $suffixValue) {
							if($key2 == $suffixKey) {
								$string .= $suffixValue;
								break;
							}							
						}
					$string .= '</th>';
				}	
			} else {
				break;
			}
			$count++;
		}
		$string .= '</tr>';

		foreach($array as $key => $value) {
			$string .= '<tr>';
			foreach($value as $row) {
				$string .= '<td>' . $row . '</td>';
			}
			$string .= '</tr>';
		}

		$string .= '</table>';
		return $string;
	}
}