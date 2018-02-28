<?php include_once('dbConnector.php'); ?>
<?php
    $selectCoins = "SELECT coin from player WHERE id = 1";
    $resultCoins = mysqli_query($connection, $selectCoins);
    $row = mysqli_fetch_assoc($resultCoins);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ye Olde Pub Quiz</title>

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body>
<div class="container">
<p id="question"></p>
<button class="btn btn-primary" type="button" name="button" id="answerA" onclick="showBtnText(this.innerHTML)"></button>
<button class="btn btn-primary" type="button" name="button" id="answerB" onclick="showBtnText(this.innerHTML)"></button>
<button class="btn btn-primary" type="button" name="button" id="answerC" onclick="showBtnText(this.innerHTML)"></button>
<button class="btn btn-primary" type="button" name="button" id="answerD" onclick="showBtnText(this.innerHTML)"></button>
<br><br>
<p>Your current coins are: <span id="score"><?php echo $row['coin']; ?></span></p>

<p><a class="btn btn-danger" href="home.php">Stop</a></p>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="pubScript.js"></script>
</html>
