<?php include_once('dbConnector.php'); ?>

<?php
  // selecting coins from database for showing to the player after the game is over...
  $coins = "SELECT coin FROM player WHERE id = 1";
  $resultCoins = mysqli_query($connection, $coins);

  if($resultCoins) {
    // after retrieving the coins which whill be shown to the player making
    // coin and wrong answer 0 in the database...
    $makeAllZero = "UPDATE player SET coin = 0, w_answer = 0 WHERE id = 1";
    $resultAllZero = mysqli_query($connection, $makeAllZero);
  }

  $row = mysqli_fetch_assoc($resultCoins);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <h1>Your coins are: <?php echo $row['coin']; ?></h1>
      <div>
        <a href="index.php" class="btn btn-success">Play Again</a>
      </div>
    </div>
  </body>
</html>
