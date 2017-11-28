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
  session_start();
  if(isset($_SESSION) && !empty($_SESSION)) {
    echo generateView($_SESSION['player'], $_SESSION['cups']);
  } else {
      echo startGame();
  }


  ?>

  </body>
</html>
