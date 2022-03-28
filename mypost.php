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