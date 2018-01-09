<?php
/**
 * Voordelen:
 *  - Je kan maar 1 keer een instance aanmaken, dus (in sommige gevallen) efficienter voor de applicatie.
 * Nadelen:
 *  - Je moet een instance aanmaken voor je eigen class in je eigen class.
 *  - Onoverzichtelijk welke functies je aan moet spreken on een instance te krijgen.
 */
class Logger {
  //Instance your own class(Logger).
  private static $instance = null;

  /**
   * private because we dont want new instances of the object to be made manually or more then once.
   */
  private function __construct(array $params) {
    print_r($params);
  }


    /**
     * only make once instance of this class.
     * @return Logger instance of logger.
     */
  public static function getInstance(...$params) {
    if(static::$instance === null) {
      static::$instance = new Logger($params);
    }
    return static::$instance;
  }

  /**
   * deletes the instance made for the static.
   * @return null
   */
  public static function deleteInstance() {
    static::$instance = null;
  }


  /**
   *  write something on the screen.
   * @param  string $message message you want to print.
   * @return null
   */
  public function write(string $message) {
    echo $message;
  }


  /**
   * make the method private so you cant clone the object.
   * @return null
   */
  private function __clone(){}

  /**
   * private so you cant wake the object up again.
   * @return null
   */
  private function __wakeUp(){}
}


$logger = Logger::getInstance('one', 'two', 'three');
$logger2 = Logger::getInstance('four', 'five', 'six');

var_dump($logger === $logger2);
