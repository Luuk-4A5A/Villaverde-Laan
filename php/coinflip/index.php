<?php

$randomNumber = mt_rand(1, 4);


function makeResult($number) {
  switch($number) {
    case 1:
      return 'Kop';
    break;
    case 2:
      return 'Munt';
    break;
    case 3:
    case 4:
      return 'REMISE';
    break;
    default: 
      return 'er is iets mis gegaan.';
  }
  return 0;  
}


echo 'Uw nummer was: ' . $randomNumber . ' en uw uitkomst is: ' . makeResult($randomNumber);