<?php
session_start();

include ("header.php");
include ("connection.php");
include ('functions.php');

$user_data = check_login($connect);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $pn =  $_POST['phone'];
    $pn_length = strlen((string)$pn);
    $addr =  $_POST['address'];
    $userid = $user_data['userid'];
    
    if(!empty($pn)){
        if(!is_numeric($pn) && $pn_length != 8){
            echo "Please enter a valid value";
        }else{
            $query1 = "update user set phone = $pn where userid = $userid";
            $result1 = mysqli_query($connect, $query1);
        }
    }
    
    if(!empty($addr)){
        if(!preg_match('/^(?:\\d+ [a-zA-Z ]+, ){2}[a-zA-Z ]+$/', $addr)){
            echo "Please enter address in a valid format.";
        }else{
            $query2 = "update user set address = $addr where userid = $userid";
            $result2 = mysqli_query($connect, $query2);}        
    }

    if(isset($result1) > 0 && isset($result2) > 0){
        echo "Information update successful!!";
    }elseif(empty($pn) && isset($result2) > 0){
        echo "Address upadate successful!!";
    }elseif(isset($result1) > 0 && empty($addr)){
        echo "Phone number update successful!!";
    }

}

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
        <label id="header">Change Phone number and address</label>

        <br> <br>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="userid" value="<?php  echo $user_data['username']; ?>" disabled>
            <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingInput" name="phone" >
            <label for="floatingInput">hone number</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="address" >
            <label for="floatingInput">New address</label>
        </div>

        <button type="submit" name="update" id="submitbtn">Update information</button>
        <label><a id="return" href="profile.php">Return</a></label>
    </form>

</body>

</html>



