<?php

//if(isset(isset['view'])){

include 'connection.php';
include 'function.php';

$itemid = $_GET['bidnow'];

$sql = "SELECT * FROM item WHERE itemid ='$itemid'";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $sql = "SELECT price FROM item WHERE itemid ='$itemid'";
    $result = mysqli_query($connect, $sql);


    $price = $_POST['price'];
    $totalprice = $price + $result;
    header("Location: bidding.php");
}


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

            <h2>Post Information</h2>


            <Table>
                <tr>
                    <th colspan="3">Details</th>
                </tr>

                <tr>
                    <th colspan="3">Time Left:- <p style="font-size:2em;" id="timer"></p></th>
                </tr>

                <tr>
                    <td colspan="3">End Date: <?php echo $row['end_date']; ?></td>
                </tr>

                <tr>
                    <td><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="img"></td>
                </tr>

                <tr>
                    <form method="post">

                        <input type="text" id="price" name="price" placeholder="Price..." required>

                        <td><a href="submit"><button type="button" id="bidamount">Bid Now</button></a></td>
                    </form>
                </tr>

        <?php
    }
} else {
    echo 'Not Found !';
}
        ?>
            </Table>
        </body>

        </html>