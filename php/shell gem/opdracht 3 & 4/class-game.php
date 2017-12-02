<?php

class Game {
  protected $amountPerGame = 20;
  protected $ball;
  protected $player;
  protected $cups;

  /**
   * Sets all objects properties.
   * @param object $ball
   * @param Player object $player
   * @param array $cups
   */
  public function __construct($ball, Player $player, $cups) {
    $this->ball = $ball;
    $this->player = $player;
    $this->cups = $cups;
  }

  public function startGame() {
    $game = $this->generateView($this->player, $this->cups);
    $_SESSION['cups'] = $this->cups;
    // $_SESSION['player'] = $this->player;
    return $game;
  }

  public function generateView($player, $cups) {
    $game = '<div class="cups">';
    $game .= $this->generateLift($cups);
    $game .= '<div class="clear"></div></div>';
    $game .= $player->show();
    return $game;
  }

  private function generateLift($cups) {
    $count = 0;
    $game = '';
    foreach($cups as $row) {
      if(isset($_GET['guess']) && $_GET['guess'] < 3 && $count == $_GET['guess']) {
          if($row->hasBall) {
            $this->player->amount += $this->amountPerGame;
          } else {
            $this->player->amount -= $this->amountPerGame;
          }

          $_SESSION['player'] = $this->player;

          $game .= $row->liftUp();
      } else {
          $game .= $row->putDown();
      }
      $count++;
    }

    return $game;
  }

}
