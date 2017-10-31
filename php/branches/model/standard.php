<?php

class StandardModel {
	public $treeArray;
	public $sitemap;

	public function __construct() {
		$this->treeArray = [
			['number' => 6, 'parent' => null],
			['number' => 2, 'parent' => 6],
			['number' => 1, 'parent' => 2],
			['number' => 4, 'parent' => 2],
			['number' => 3, 'parent' => 4],
			['number' => 5, 'parent' => 4],
			['number' => 8, 'parent' => 6],
			['number' => 9, 'parent' => 8],
			['number' => 7, 'parent' => 8],
		];

		$this->sitemap = [
			['home' =>
			 	[
					'page 1' => [['title' => 'page one title']],
					'page 2' => [['title' => 'portfolio'], ['page2 portfolio' => 'portfolio'], ['3rd page' => 'awd']],
					'page 3' => [['title' => 'blog page'], ['page 3 portfolio']],
				],
			],
		];

	}



function showArray($array, $page) {
	foreach($array as $row) {
	  $result = $this->getArrayItems($row, $page);
	}

	return $result;
}

private function getArrayItems($array, $page) {
	for($i = 0; $i < count($array); $i++) {
		print_r(array_values($array)[$i]);
	}
}








	// public function findParent($number, $array) {
	// 	foreach($array as $tempArray) {
	// 		if($tempArray['number'] === $number){
	// 			foreach($array as $newTempArray) {
	// 				if($tempArray['parent'] === $newTempArray['number']) {
	// 					return $newTempArray;
	// 				}
	// 			}
	// 		}
	// 	}
	// }
	//
	// private function getChildren($number, $array) {
	// 	$retrunArr = [];
	// 	$counter = 0;
	// 	foreach($array as $tempArray) {
	// 		if($tempArray['parent'] === $number) {
	// 			$retrunArr[$counter] = $tempArray;
	// 			$counter++;
	// 		}
	// 	}
	//
	// 	return $retrunArr;
	// }
	//
	// public function findChildren($number, $array) {
	// 	$returnArray = [];
	// 	$children = $this->getChildren($number, $array);
	//
	// 	foreach($children as $row) {
	// 		array_push($returnArray, $this->getChildren($row['number'], $array));
	// 	}
	//
	// 	echo '<pre>';
	// 	print_R($returnArray);
	// 	echo '</pre>';
	// }
}










/*

$returnArray = [];
$counter = 0;
foreach($array['children'] as $parentNumber) {
	foreach($fullArray as $tempArray) {

		if($tempArray['number'] === $parentNumber) {
			if(is_array($tempArray['children']) && !empty($tempArray['children'])) {
				foreach($tempArray['children'] as $childrenValue) {
					array_push($tempArray, $this->getChildren($childrenValue, $tempArray, $fullArray));
				}
			}
			array_push($returnArray, $tempArray);
			$counter++;
		}
	}
}
return $returnArray;


*/





//
