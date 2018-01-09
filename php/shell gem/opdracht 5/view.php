<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
    <a href="/restart.php">restart gem</a>
  <?php
    if(isset($_SESSION) && !empty($_SESSION['cups']) && !empty($_SESSION['player'])) {
      echo $game->generateView($_SESSION['player'], $_SESSION['cups']);
    } else {
        echo $game->startGame();
    }
  ?>
  </body>
</html>
