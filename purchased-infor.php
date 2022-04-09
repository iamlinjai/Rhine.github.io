<?php
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
            <title>Bought Information</title>
            <link rel="stylesheet" href="style.css">
        </head>

        <body>
            <div class="content">
                <table id="table">

                    <!--Display photos-->
                    <tr>
                        <td colspan="3" id="blurred-bg">
                            <img src="<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="productimg"></p>
                        </td>
                    </tr>

                    <!--Display Item title-->
                    <tr>
                        <td colspan="2" id="information-title"><?php echo $row['item_title']; ?></td>

                        <td rowspan="4" id="status">
                            <label>@Username</label>

                            <br><br><br>

                            <p id="sold">Sold</p>
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
            ?>
                </Table>
            </div>
        </body>

        </html>