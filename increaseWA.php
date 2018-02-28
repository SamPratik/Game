<?php include_once('dbConnector.php'); ?>
<?php
    // increasing the number of wrong answer...
    $increaseWA = "UPDATE player SET w_answer = w_answer + 1 WHERE id = 1";
    $result = mysqli_query($connection, $increaseWA);

    if($result) {
        // selecting the number of wrong answer...
        $selectWA = "SELECT w_answer FROM player WHERE id = 1";
        $resultWA = mysqli_query($connection, $selectWA);

        $row = mysqli_fetch_assoc($resultWA);

        // checking if the number of wrong answer is 3? ...
        if($row['w_answer'] == 3) {
            // setting the wrong answer counter to 0 in the database...
            $updateZero = "UPDATE player SET w_answer = 0, coin = 0 WHERE id = 1";
            $resultZero = mysqli_query($connection, $updateZero);
            if($resultZero) {
                echo "lost";
            }
        } else {
            echo "continue";
        }
    }
?>
