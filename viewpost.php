<?php

session_start();

include 'header.php';
include 'connection.php';

$sql = "SELECT * FROM item WHERE userid !='" . $_SESSION['userid'] . "'";

$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Post</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
        <br>
        <label id="header">Current Bidding</label>
            <table id="table" style="width: 100%;">
                <tr>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                

                <tr>
                    <td><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="img"></td>
                    <td><?php echo $row['item_title']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['item_status']; ?></td>
                    <td><a href = "bidding.php?bidnow=<?php echo $row['itemid']; ?>"><button type="button" id="bidnow">Bid Now</button></a></td>
                </tr>
            </table>

    <?php
    }
} else {
    echo 'Do not have auction posts here yet !';
}
    ?>
        </body>
        </html>