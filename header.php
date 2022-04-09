<?php

    if(!isset($_SERVER['HTTP_REFERER'])){ //prevent user url access 
    header('location: home.php');
    exit;   
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="sticky">
    <ul id="menubar">

        <li>
            <a href="index.php">Home</a>
        </li>

        <li>
            <a href="addpost.php">Add Posts</a>
        </li>

        <li>
            <a href="mypost.php">My Posts</a>
        </li>

        <li>
            <a href="purchased.php">Purchased</a>
        </li>

        <li>
            <a href="profile.php">Profile</a>
        </li>

        <li id="logout">
            <a href="logout.php">Log out</a>
        </li>

    </ul>
    </div>
</body>

</html>