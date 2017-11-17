<?php

Class GameCharacterSet {
  protected $standardClass;

  public function setStandardClass($className) {
    $this->standardClass = $className;
  }

}

Class LolCharacter extends GameCharacterSet {
  protected $spriteName;

  public function __construct($spriteName) {
    $this->spriteName = $spriteName;
  }

  public function getHtml($element) {
    $standardClass = (isset($this->standardClass)) ? $this->standardClass . ' ' : ' ';
    return '<' . $element . ' class="' . $standardClass . $this->spriteName . '"></' . $element . '>';
  }

  public function walk() {
    return 'Walking';
  }

}

Class Warwick extends LolCharacter {
  public function __construct() {
    $this->spriteName = get_class($this);
  }

  public function jump() {
    return 'jumping';
  }


}

Class Veigar extends LolCharacter {
  public function __construct() {
    $this->spriteName = get_class($this);
  }

  public function swim() {
    return 'swimming';
  }
}

$warwick = new Warwick();
$warwick->setStandardClass('character');
echo $warwick->walk();
echo '<br>';
echo $warwick->jump();
echo '<br>';
echo $warwick->getHtml('span');

$veigar = new Veigar('secondChar');
$veigar->setStandardClass('character');
echo $veigar->getHtml('span');
echo $veigar->swim();

//
// $FirstCharacter = new Character('firstChar');
// $FirstCharacter->setStandardClass('character');
//
// $SecondCharacter = new Character('secondChar');
// $SecondCharacter->setStandardClass('character');
//
// $ThirdCharacter = new Character('thirdChar');
// $ThirdCharacter->setStandardClass('character');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
  <?php
    //
    // echo $FirstCharacter->getHtml('span');
    // echo $SecondCharacter->getHtml('span');
    // echo $ThirdCharacter->getHtml('span');

$FirstCharacter = null;
$SecondCharacter = null;
$ThirdCharacter = null;

  ?>
    <script src="main.js" charset="utf-8"></script>
  </body>
</html>
