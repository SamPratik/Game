<?php include_once('dbConnector.php'); ?>
<?php
  $increaseCoin = "UPDATE player SET coin = coin + 10 WHERE id=1";
  $result = mysqli_query($connection, $increaseCoin);

  if($result) {
    echo 'coin increased';
  } else {
    echo 'something went wrong!';
  }
?>
