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

        <script>
            var countDownDate = new Date("<?php echo $row['end_date']; ?>").getTime();

            var x = setInterval(function() {

                var now = new Date().getTime();

                var distance = countDownDate - now;

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("timer").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("timer").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>

        <body>

            <br>

            <label id="header">Details</label>


            <table id="table">

                <tr>
                    <th colspan="3">Time Left:- <p style="font-size:2em;" id="timer"></p>
                    </th>
                </tr>

                <tr>
                    <td colspan="3">End Date: <?php echo $row['end_date']; ?></td>
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

                <tr>
                    <td colspan="3">Status: </td>
                </tr>

                <tr>
                    <td><?php echo $row['item_status']; ?></td>
                </tr>

        <?php
    }
} else {
    echo 'Not Found !';
}
//}
        ?>
            </Table>
        </body>

        </html>