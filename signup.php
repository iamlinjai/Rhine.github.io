<?php
session_start();

include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userid = $_POST['userid'];
    $username = $_POST['userid'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <!--signup form-->
    <form id="form" method="post">
        <input type="button" value="&#8592; Go back" onclick="history.back()">
        <br><br>
        <label id="header">Create an account</label>

        <br><br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid" required>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123@example.com" name="email" required>
            <label for="floatingInput">Email</label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="*********" name="pw" required>
            <label for="floatingInput">Password</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="*********" name="repPassword" required>
            <label for="floatingInput">Confirm password</label>
        </div>
        
        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingInput" placeholder="23330600" name="phone">
            <label for="floatingInput">Phone number(optional)</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Hung Hum" name="address">
            <label for="floatingInput">Address(optional)</label>
        </div>

        <button type="submit" id="submitbtn" value="Signup">Create Account</button>

        <br>

        <label>Already signup? <a id="return" href="login.php">Sign in here</a></label>

    </form>

</body>

</html>