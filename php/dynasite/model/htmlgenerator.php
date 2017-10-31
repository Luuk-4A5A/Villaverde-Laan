<?php

Class Htmlgenerator {
  public function createMenu($array) {
    $string = '<ul>';
    foreach($array as $row) {
      foreach($row as $key => $value) {
        if($key === 'page_name' && $value !== 'home') {
          $string .= '<li><a href="/' . $value . '">' . $value . '</a></li>';
        } elseif($key === 'page_name' && $value === 'home') {
          $string .= '<li><a href="/">' . $value . '</a></li>';
        }
      }
    }

    $string .= '</ul>';
    return $string;
  }
}
