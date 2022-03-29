<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $password = $_POST['pw'];
    $email = $_POST['email'];

    if (!empty($username) && !empty($password) && !is_numeric($username) && !empty($userid)) {

        $sql = "INSERT INTO user(userid, username, pw, email) VALUES ('$userid', '$username', '$password', '$email');";

        $result = mysqli_query($connect, $sql);

        header("Location: login.php");
        die;
    }
}

if (isset($_POST['login'])) {
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <br>

    <label id="header">SignUp</label>

    <form id="form" method="post">
        <input type="text" name="userid" placeholder="LoginID...">
        <br>

        <input type="text" name="email" placeholder="Email...">
        <br>
        <input type="text" name="username" placeholder="Nick Name...">
        <br>
        <input type="password" name="pw" placeholder="Password...">
        <br>
        <button type="submit" id="submitbtn" value="Signup">SIGN UP</button>
        <br>
        <a id="return" href="login.php">Alreay have a account ?</a> 

    </form>
</body>

</html>