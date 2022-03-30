<?php
session_start();

include("header.php");

if (isset($_POST['post'])) {

    include("connection.php");


    $item_title = $_POST['title'];
    $item_image = $_FILES['item_img']['name'];
    $item_desc = $_POST['item_desc'];
    $price = $_POST['price'];
    $end_date = $_POST['end_date'];
    $userid = $_SESSION['userid'];
    $status = '"Bidding"';


    $target = "upload/" . basename($item_image);
    move_uploaded_file($_FILES['item_img']['tmp_name'], $target);

    $sql = "INSERT INTO item(item_title, item_desc, item_img, price, end_date, userid, item_status) VALUES ('$item_title', '$item_desc', '$item_image', '$price', '$end_date', '$userid', $status);";

    $result = mysqli_query($connect, $sql);

    //if (mysqli_num_rows($result) == 1) {
    header("Location: index.php");
    exit();
    //} else {
    //echo 'Error !';
    //}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form id="form" action="addpost.php" method="post" enctype="multipart/form-data">
        <label id="header">Sell your items</label>

        <br><br>

        <label id="itemname">Item Name:</label>
        <br>
        <input type="text" id="itemname" name="title" placeholder="eg. phone" required>

        <br><br>

        <label id="price">Price:</label>
        <br>
        <input type="text" id="price" name="price" placeholder="eg. $100" required>

        <br><br>

        <label>End of date: </label>
        <br>
        <input type="date" id="date" name="end_date" value="2021-01-01" required>

        <br><br>

        <label>Description: </label>
        <br>
        <textarea name="item_desc" placeholder="Gives some description for your item"></textarea>

        <br><br>

        <label>Your item image: </label>
        <br>
        <input type="file" id="image" name="item_img" accept="image/png, image/jpeg" required>

        <br>

        <input id="submitbtn" type="submit" name="post" value="Post">

        <a id="return" href="index.php">Back to home page</a>

        <p id="forfunction"></p>

        <script>
            function myFunction() {
                var x = document.getElementById("end_date").value;
                document.getElementById("forfunction").innerHTML = x;
            }
        </script>

        

    </form>
</body>

</html>