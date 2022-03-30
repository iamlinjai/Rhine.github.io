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
            <title>Product Information</title>
            <link rel="stylesheet" href="style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <div class="content">
                <table id="table">

                    <!--Display photos-->
                    <tr>
                        <td colspan="3" id="blurred-bg">
                            <img src="<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="productimg"></p>
                        </td>
                    </tr>

                    <!--Display Time left / End of date-->
                    <tr>
                        <td id="timeleft" colspan="3">Close date: <?php echo $row['end_date']; ?>
                            <p style="font-size:1em;" id="timer"></p>
                        </td>
                    </tr>

                    <!--Display Item title-->
                    <tr>
                        <td colspan="2" id="information-title"><?php echo $row['item_title']; ?></td>
                        
                        <td rowspan="4" id="status">
                            <label>@Username</label>

                            <br><br><br>

                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control">
                            </div>
                            <button type="submit" id="submitbtn" value=""><label>Offer</label>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="information-price">$ <?php echo $row['price']; ?></td>
                    </tr>

                    <tr>
                        <td colspan="2"><?php echo $row['item_desc']; ?></td>
                    </tr>
                    
            <?php
        }
    } else {
        echo 'Not Found !';
    }
    //}
            ?>
                </Table>
            </div>
        </body>

        </html>