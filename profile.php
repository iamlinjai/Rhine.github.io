<?php
session_start();


if (!isset($_SESSION["userid"])) {
    header("Location: index.php");
}

include 'header.php';
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <br>
    <label id="header">Profile</label>

    <form id="form" action="" method="POST" enctype="multipart/form-data">

        <?php
        $sql = "SELECT * FROM user where userid='{$_SESSION["userid"]}'";
        $result = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($result)

        ?>

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
        
        <input type="file" name="profile_img" id="profile_img" accept="image/png, image/jpeg" >

        

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

</html>