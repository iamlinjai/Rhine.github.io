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
        <label id="header">MY Profile</label>

        <br><br>

        <img src="upload/selfie.jpg" id="profile-img">

        <p id="profile-userid"><?php  echo $user_data['userid']; ?></p> 

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid" value="<?php  echo $user_data['username']; ?>" disabled>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="email" value="<?php  echo $user_data['email']; ?>" disabled>
            <label for="floatingInput">Email</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="abc123" name="pw" value="<?php echo password_hash($user_data['pw'], PASSWORD_DEFAULT); ?>" disabled>
            <label for="floatingInput">Current password</label>
        </div>

        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingInput" placeholder="23330600" name="phone" value="<?php if(is_null($user_data['phone'])){ echo "N/A";}else{echo $user_data['phone'];};?>" disabled>
            <label for="floatingInput">Phone number</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Hung Hum" name="address" value="<?php if(is_null($user_data['address'])){ echo "N/A";}else{echo $user_data['address'];};?>" disabled>
            <label for="floatingInput">Address</label>
        </div>

        <br>

        <div class="mb-3">
            <label for="formFile" class="form-label">Change your profile image: </label>
            <input class="form-control" type="file" id="formFile" name="item_img" accept="image/png, image/jpeg">
        </div>

        <button type="submit" name="update" id="submitbtn">Update</button>
        <a href="change_pw.php?view=<?php echo $user_data['userid']; ?>"><input type="button" value="Change password" id="submitbtn"></button></a>

        <label><a id="return" href="index.php">Return</a></label>
    </form>

</body>

</html>



