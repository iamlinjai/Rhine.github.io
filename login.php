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
                    
                        setcookie('userid', $_SESSION["userid"], time()+3600);
                    
                        header('Location:index.php');
                        die;
                    }
                }
            }
        }
    } 

    if(isset($_POST['signup'])){
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
</head>
<body>

    <br>
    
<label id="header">LogIn</label>

<form id="form" action="" method="POST">
    <input type="text" name="userid" placeholder="User ID..">

    <br><br>

    <input type="password" name="pw" placeholder="Password..">

    <br><br>

    <button type="submit" id="submitbtn" name="submit">LOGIN</button>

    <a id="return" href="signup.php">Do not have account ?</a>

</form>
</body>
</html>

