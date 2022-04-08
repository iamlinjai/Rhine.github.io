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
    <title>View Post</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="content">
        <label id="header">Your Product</label>

        <br><br>

        <?php
        $sql = "SELECT * FROM item WHERE userid ='" . $_SESSION['userid'] . "' AND item_status = 'bidding' ";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <a href="productinf-sel.php"><button type="button" id="mypostbtn">
                        <table id="selling-display">

                            <tr>
                                <td><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="smallimg"></td>
                            </tr>

                            <tr>
                                <td>house</td>
                            </tr>

                            <tr>
                                <td id="display-price">$ <?php echo $row['price']; ?></td>
                            </tr>

                            <tr>
                                <td id="selling">On sales</td>
                            </tr>

                        </table>
                    </button></a>

                <a href="purchased-infor.php"><button type="button" id="mypostbtn">
                        <table id="selling-display">

                            <tr>
                                <td><img src="upload/building.jpg" id="smallimg"></td>
                            </tr>

                            <tr>
                                <td><?php echo $row['item_title']; ?></td>
                            </tr>

                            <tr>
                                <td>$ 1000</td>
                            </tr>

                            <tr>
                                <td id="sold">Sold</td>
                            </tr>

                        </table>
                    </button></a>

        <?php
            }
        }
        ?>
    </div>
</body>

</html>



<!---------------------------------------------------------------Backup Code------------------------------------------------------------------------------->

<!--
<body>
    <br>
    <label id="header">My Posts</label>
    <table id="table" style="width: 100%;">
        <tr>
            <th id="imgt">Image</th>
            <th id="itemt">Item</th>
            <th id="pricet">Price</th>
            <th id="statust">Status</th>
            <th id="actiont"></th>
        </tr>

        <?php
        $sql = "SELECT * FROM item WHERE userid ='" . $_SESSION['userid'] . "' AND item_status = 'bidding' ";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>


                <table id="table" style="width: 100%;">
                    <tr>
                        <td id="imgt"><img src="upload/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_title']; ?>" id="img"></td>
                        <td id="itemt"><?php echo $row['item_title']; ?></td>
                        <td id="pricet">$ <?php echo $row['price']; ?></td>
                        <td id="statust"><?php echo $row['item_status']; ?></td>
                        <td id="actiont">
                            <a href="item-infor.php?view=<?php echo $row['itemid'] ?>"><button type="button" id="submitbtn">View</button></a>
                            <br><br>
                            <form method="POST" action="">
                                <button type="submit" name="cancelbid" id="cancelbtn">Complete Auction</button>


                                <?php


                                if (isset($_POST['cancelbid'])) {

                                    $curitemid = $row['itemid'];
                                    $updatesql = "UPDATE item SET item_status = 'Completed' WHERE itemid = '$curitemid'";
                                    mysqli_query($connect, $updatesql);

                                    header('Location: index.php');
                                    die;
                                }

                                ?>
                            </form>
                        </td>
                    </tr>
                </table>

        <?php
            }
        }
        ?>
</body>

</html>
    -->