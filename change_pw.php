<?php
session_start();

include ("header.php");
include ("connection.php");
include ('functions.php');

$user_data = check_login($connect);





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form id="form" action="" method="POST" enctype="multipart/form-data">
        <label id="header">Change Password</label>

        <br> <br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid" value="<?php  echo $user_data['username']; ?>" disabled>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="email" required>
            <label for="floatingInput">Current password</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="abc123" name="pw"  required>
            <label for="floatingInput">New password</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="email" required>
            <label for="floatingInput">Confirm new password</label>
        </div>


        <button type="submit" name="update" id="submitbtn">Update password</button>
        <label><a id="return" href="index.php">Return</a></label>
    </form>

</body>

</html>



