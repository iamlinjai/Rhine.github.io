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
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid" disabled>
            <label for="floatingInput"><?php  echo $user_data['username']; ?></label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="email" disabled>
            <label for="floatingInput"><?php  echo $user_data['email']; ?></label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="abc123" name="pw" value="<?php  echo $user_data['pw']; ?>" disabled>
            <label for="floatingInput"></label>
        </div>

        <div class="form-floating mb-3">
            <input type="tel" class="form-control" id="floatingInput" placeholder="23330600" name="phone" value="23330600" disabled>
            <label for="floatingInput">Phone number</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Hung Hum" name="address" value="Hung Hom" disabled>
            <label for="floatingInput">Address</label>
        </div>

        <br>

        <div class="mb-3">
            <label for="formFile" class="form-label">Change your profile image: </label>
            <input class="form-control" type="file" id="formFile" name="item_img" accept="image/png, image/jpeg">
        </div>

        <button type="submit" name="update" id="submitbtn">Update</button></a>
        <label><a id="return" href="index.php">Return</a></label>
    </form>

</body>

</html>



<!---------------------------------------------------------Backup code---------------------------------------------------------------->

<!--
<body>
    <form id="form" action="" method="POST" enctype="multipart/form-data">
        <label id="header">MY Profile</label>
        <br><br>

        <?php
        $sql = "SELECT * FROM user where userid='{$_SESSION["userid"]}'";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result)

        ?>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="userid" value="<?php echo $row['userid']; ?>" disabled>
            <label for="floatingInput">Username</label>
        </div>

        <input type="text" name="userid" placeholder="UserID" value="<?php echo $row['userid']; ?>" disabled>
        <br><br>

        <input type="text" name="username" placeholder="Nick Name" value="<?php echo $row['username']; ?>" required>

        <br><br>

        <input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>

        <br><br>

        <input type="password" name="pw" placeholder="Password" value="<?php echo $row['pw']; ?>" required>

        <br><br>

        <label>Profile Image: </label>

        <br>

        <img src="upload/<?php echo $row['profile_image']; ?>" id="img">

        <input type="file" name="profile_img" id="profile_img" accept="image/png, image/jpeg">



        <button type="submit" name="update" id="submitbtn">Update</button></a>

        <?php
        if (isset($_POST['update'])) {

            $newusername = ($_POST["username"]);
            $newpw = ($_POST["pw"]);
            $newemail = ($_POST["email"]);
            $newprofile_image = time() . '_' . $_FILES['profile_img']['name'];

            $target = 'upload/' . $newprofile_image;
            move_uploaded_file($_FILES['profile_img']['tmp_name'], $target);

            $updatesql = "UPDATE user SET username = '$newusername', pw = '$newpw', email = '$newemail', profile_image = '$newprofile_image' WHERE userid='" . $_SESSION['userid'] . "'";

            $updateresult = mysqli_query($connect, $updatesql);

            header("Location: index.php");
            die;
        }

        ?>

    </form>

</body>
-->