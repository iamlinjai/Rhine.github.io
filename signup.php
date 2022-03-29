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

<!--Show password function-->
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>


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

        <!--signup form-->
        <form id="signup-form" method="post">
            <label id="header">Create an account</label>

            <br><br>

            <label>Username:</label>
            <input type="text" name="userid" placeholder="eg. abc123" required>

            <br><br>

            <label>Email:</label>
            <input type="text" name="email" placeholder="eg. abc123@example.com" required>

            <br><br>

            <label>Password:</label>
            <input id="password" type="password" name="pw" placeholder="Password" required>
            <br>
            <input type="checkbox" onclick="showPassword()"><label>Show Password</label>

            <br><br>

            <label>Confirm password:</label>
            <input type="password" name="repeat-pw" placeholder="Confirm password" required>

            <br><br>

            <label>Phone:</label>
            <br>
            <input type="tel" name="phone" placeholder="2333 0600" required>

            <br><br>

            <label>Address:</label>
            <br>
            <input type="text" name="address" placeholder="Building" required>

            <br>

            <button type="submit" id="submitbtn" value="Signup">Create Account</button>

            <br>

            <label>Already signup? <a id="return" href="login.php">Login here</a></label>

        </form>

</body>
</html>