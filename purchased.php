<?php

session_start();

include 'header.php';
include 'connection.php';
include 'functions.php';

$user_data = check_login2($connect); //User without login will redirect to login.php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Items</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="content">
        <br>
        <label id="header">My Purcased</label>
        <br><br>

        <?php
        $sql = "SELECT * FROM item WHERE buyer_id ='" . $_SESSION['userid'] . "' AND item_status = 'Completed'";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <a href="purchased-infor.php"><button type="button" id="displaybtn">
                        <table id="selling-display">

                            <tr>
                                <td><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="smallimg"></td>
                            </tr>

                            <tr>
                                <td></td>
                            </tr>

                            <tr>
                                <td id="display-title"><?php echo $row['item_title']; ?></td>
                            </tr>

                            <tr>
                                <td id="display-price">$ <?php echo $row['price']; ?></td>
                            </tr>

                        </table>
                    </button></a>

        <?php
            }
        }
        ?>
</body>

</html>