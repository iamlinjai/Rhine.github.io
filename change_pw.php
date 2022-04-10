<?php
session_start();

include ("header.php");
include ("connection.php");
include ('functions.php');

$user_data = check_login($connect);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $pw1 =  $_POST['password'];
    $pw2 =  $_POST['new_password'];
    $pw3 =  $_POST['check_password'];
    $userid = $user_data['userid'];


    if(!empty($pw1) && !empty($pw2) && !empty($pw3))
		{
            if($pw1 == $user_data['pw'] && $pw2 == $pw3){
                $query = "update user set pw = $pw3 where userid = $userid"; //Query to update user password.
                $result = mysqli_query($connect, $query); //run query.
                if(isset($result) > 0){
                    echo "password update successfull!!";
                    header("Location: profile.php");
                }else{
                    echo "Unexpectable error occured!!";
                    header("Location: change_pw.php");
                }
            }else{
                echo "You have typo when entering your password, please try again";
                header("Location: change_pw.php");
            }
        }else{
            header("Location: change_pw.php");
        }
}

        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <form id="form" action="" method="POST">
        <label id="header">Change Password</label>

        <br> <br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="userid" value="<?php  echo $user_data['username']; ?>" disabled>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
<<<<<<< HEAD
        <input type="password" class="form-control" id="floatingInput" name="password" required>
=======
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="password" value="" required>
>>>>>>> 9f46cfbd54f702b9607d048c43e0c42b368d2f3a
            <label for="floatingInput">Current password</label>
        </div>

        <div class="form-floating mb-3">
<<<<<<< HEAD
            <input type="password" class="form-control" id="floatingInput" name="new_password" required>
=======
            <input type="password" class="form-control" id="floatingInput" placeholder="abc123" name="new_password" required>
>>>>>>> 9f46cfbd54f702b9607d048c43e0c42b368d2f3a
            <label for="floatingInput">New password</label>
        </div>

        <div class="form-floating mb-3">
<<<<<<< HEAD
        <input type="password" class="form-control" id="floatingInput" name="check_password" required>
=======
        <input type="text" class="form-control" id="floatingInput" placeholder="abc123" name="check_password" value="" required>
>>>>>>> 9f46cfbd54f702b9607d048c43e0c42b368d2f3a
            <label for="floatingInput">Confirm new password</label>
        </div>


        <button type="submit" name="update" id="submitbtn">Update password</button>
        <label><a id="return" href="index.php">Return</a></label>
    </form>

</body>

</html>



