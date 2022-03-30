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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <form id="form" action="addpost.php" method="post" enctype="multipart/form-data">
        <label id="header">Sell your items</label>

        <br><br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Mobile phone" name="title">
            <label for="floatingInput">Item name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="$ 100" name="price">
            <label for="floatingInput">Price</label>
        </div>

        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" value="DD/MM/YYYY" name="end_date">
            <label for="floatingInput">End of Date</label>
        </div>

        <div class="form-floating">
            <textarea class="form-control" placeholder="Gives some description for your item" id="floatingTextarea2" style="height: 100px" name="item_desc"></textarea>
            <label for="floatingTextarea2">Description</label>
        </div>

        <br><br>

        <div class="mb-3">
            <label for="formFile" class="form-label">Item image: </label>
            <input class="form-control" type="file" id="formFile" name="item_img" accept="image/png, image/jpeg">
        </div>


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