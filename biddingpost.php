<?php

session_start();

include 'connection.php';
include 'function.php';

$sql = "SELECT * FROM item WHERE userid ='" . $_SESSION['userid'] . "'";

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
        </head>

        <body>

            <table id="viewposttable" style="width: 100%;">
                <tr>
                    <td>Image</td>
                    <td>Item</td>
                    <td>Price</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>

                <tr>
                    <td><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>"></td>
                    <td><?php echo $row['item_title']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['item_status']; ?></td>
                    <td><a href = "item-infor.php?view=<?php echo $row['itemid']?>"><button type="button" id="item-infor">View</button></a></td>
                </tr>
            </table>

    <?php
    }
} else {
    echo 'Not Found !';
}
    ?>
        </body>

        </html>