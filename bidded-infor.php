<?php

//if(isset(isset['view'])){

include 'connection.php';
include 'header.php';


$itemid = $_GET['view'];

$sql = "SELECT * FROM item WHERE itemid ='$itemid'";

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
            <title>Item Information</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>

            <br>

            <label id="header">Details</label>


            <table id="table">

                <tr>
                    <th colspan="3">Selling</th>
                </tr>

                <tr>
                </tr>

                <tr>
                    <td colspan="3"><img src="upload/car.jpg" alt="Car" id="img"></td>
                </tr>

                <tr>
                    <td colspan="3">Title: </td>
                </tr>

                <tr>
                    <td>Car</td>
                </tr>

                <tr>
                    <td colspan="3">Description: </td>
                </tr>

                <tr>
                    <td>It is car!</td>
                </tr>

                <tr>
                    <td colspan="3">Price: </td>
                </tr>

                <tr>
                    <td>$ 100</td>
                </tr>



                <!--
                <tr>
                    <th colspan="3">
                        <?php echo $row['item_status']; ?>
                    </th>
                </tr>

                <tr>
                </tr>

                <tr>
                    <td colspan="3"><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="img"></td>
                </tr>

                <tr>
                    <td colspan="3">Title: </td>
                </tr>

                <tr>
                    <td><?php echo $row['item_title']; ?></td>
                </tr>

                <tr>
                    <td colspan="3">Description: </td>
                </tr>

                <tr>
                    <td><?php echo $row['item_desc']; ?></td>
                </tr>

                <tr>
                    <td colspan="3">Price: </td>
                </tr>

                <tr>
                    <td>$ <?php echo $row['price']; ?></td>
                </tr>
    -->
        <?php
    }
} else {
    echo 'Not Found !';
}
        ?>
            </Table>
        </body>

        </html>