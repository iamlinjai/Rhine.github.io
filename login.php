<?php
session_start();

include("connection.php");

if (isset($_POST['submit'])) {

    $userid = $_POST['userid'];
    $password = $_POST['pw'];

    if (!empty($userid) && !empty($password) && is_numeric($userid)) {

        $sql = "SELECT * FROM user WHERE userid = '$userid' limit 1";

        $result = mysqli_query($connect, $sql);

        if ($result) {

            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['pw'] === $password) {

                    $_SESSION["userid"] = $user_data['userid'];

                    setcookie('userid', $_SESSION["userid"], time() + 3600);

                    header('Location:index.php');
                    die;
                }
            }
        }
    }
}

if (isset($_POST['signup'])) {
    header('Location:signup.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <form id="form" action="" method="POST">
        <label id="header">Sign in</label>

        <br><br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid">
            <label for="floatingInput">Login ID</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="abc123" name="pw">
            <label for="floatingInput">Password</label>
        </div>

        <button type="submit" id="submitbtn" name="submit">Sign In</button>

        <label>New to here? <a id="return" href="signup.php">Create an account</a></label>

    </form>
</body>

</html>