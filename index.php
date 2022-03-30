<?php

session_start();

include 'header.php';
include 'connection.php';

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
    <div class="content">
        <br>
        <label id="header">Current Auction</label>
        <br><br>

        <?php
        $sql = "SELECT * FROM item WHERE userid !='" . $_SESSION['userid'] . "' AND item_status = 'Bidding' ";

        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

<!-----------------------------------------------------------Test Code---------------------------------------->
                <a href="login.php"><button type="button" id="displaybtn">
                        <table id="selling-display">

                            <tr>
                                <td><img src="upload/building.jpg" id="smallimg"></td>
                            </tr>

                            <tr>
                                <td></td>
                            </tr>

                            <tr>
                                <td>house</td>
                            </tr>

                            <tr>
                                <td>$ 1000</td>
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


<!------------------------------------------------------------------------Back Up Code-------------------------------------------------------------------------------->

<!--
<?php
$sql = "SELECT * FROM item WHERE userid !='" . $_SESSION['userid'] . "' AND item_status = 'Bidding' ";

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
                                <input type="text" name="newprice" placeholder="Bid Price.." required>
                                <button type="submit" name="bidprice" id="bidbtn">Bid Now</button></a>
                                <?php
                                if (isset($_POST['bidprice'])) {
                                    $newprice = $_POST['newprice'];

                                    if ($newprice > $row['price']) {

                                        $updatesql = "UPDATE item SET price = '$newprice', buyer_id = '" . $_SESSION['userid'] . "' WHERE itemid = '" . $row['itemid'] . "'";
                                        $updateresult = mysqli_query($connect, $updatesql);

                                        header('Location: index.php');
                                        die;
                                    }
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
-->