<?php include('view/includes/head.php'); ?>

<?php

// interface iPerson {
//   public function Talk();
// }
//
// class Person implements iPerson {
//   public $name;
//   private $age;
//
//   public function __construct($name, $age) {
//     $this->name = $name;
//     $this->age = $age;
//   }
//
//   public function Talk($text = 'that I like you.') {
//     return 'he/she is saying ' . $text . ', greetings from ' . $this->name . '<br>';
//   }
//
//   public function getAge() {
//     return $this->age;
//   }
//
//   public function setAge($age) {
//     if($age < 0 || $age > 150) {
//       return false;
//     }
//
//     $this->age = $age;
//     return true;
//   }
//
// }
//
// class Woman extends Person {
//   public function Talk($text = 'that I like you.') {
//     return 'She is saying ' . $text . ', greetings from ' . $this->name . '<br>';
//   }
// }
//
// class Man extends Person {
//   public function Talk($text = 'that I like you.') {
//     return 'He is saying ' . $text . ', greetings from ' . $this->name . '<br>';
//   }
// }
//
//
// $person = new Person('randomperson', 123);
// echo $person->Talk('wefwefwefwef');
//
// $person->setAge(151);
// echo $person->getAge();
// echo '<br>';
//
// $tim = new Man('Tim', 21);
// echo $tim->Talk('that you should say something');
//
// $tim->setAge();
// echo '<br>';
//
// $sharren = new Woman('Sharren', 29);
// echo $sharren->Talk('that you should say something');

?>



<?php



// Class Vehicle {
//   private $database;
//   public $type;
// }
//
// Class Carbrand extends Vehicle {
//   public $brandName;
//
// }
//
// Class Car extends CarBrand {
//   private $color;
//   public $carName;
//   public $fuel;
//
//   public function __construct($carArray) {
//     $this->type = 'Car';
//     $this->color = $carArray['color'];
//     $this->fuel = $carArray['fuel_name'];
//     $this->carName = $carArray['car_name'];
//     $this->brandName = $carArray['brand_name'];
//   }
//
//   public function setColor($color) {
//     $allowedColors = ['Red', 'Green', 'Blue'];
//
//     if(!in_array($color, $allowedColors)) {
//       return false;
//     }
//
//     $this->color = $color;
//     return true;
//   }
//
//   public function showCar() {
//     return 'Fuel: ' . $this->fuel . '<br>' . 'Type: ' . $this->type . '<br>' . 'Brand: ' . $this->brandName . '<br>' . 'Car name: ' . $this->carName . '<br>Color: ' . $this->color;
//   }
//
//   public function checkSustainability() {
//     if($this->fuel !== 'Deisel' && $this->fuel !== 'Gasoline') {
//       return true;
//     } else {
//       return 0;
//     }
//   }
//
//
// }
//
// require_once('model/dbhandler.php');
// $database = new DbHandler('localhost', 'car', 'root', 'root');
// $cars = $database->readData(['selectQuery' => 'SELECT car.car_name, car.color, fuel.fuel_name, brand.brand_name FROM car LEFT JOIN brand ON car.brand_brand_id = brand.brand_id LEFT JOIN fuel ON car.fuel_fuel_id = fuel.fuel_id']);
//
// // echo '<pre>';
// // print_r($cars);
// // echo '</pre>';
//
// $array = [];
// foreach($cars as $key => $value) {
//   array_push($array, new Car($value));
// }
//
// foreach($array as $row) {
//   echo $row->showCar() . '<br>' . 'Sustainability: ' . $row->checkSustainability() .  '<br><br>';
// }
//
// $array[0]->setColor('Red');
// echo $array[0]->showCar();
?>


<?php include('view/includes/footer.php'); ?>
