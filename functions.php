<?php

function check_login($connect)
{

    if(isset($_SESSION['userid']))
    {
        $id = $_SESSION['userid'];
        $query = "select * from user where userid = '$id' limit 1";

        $result = mysqli_query($connect, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: home.php");
    die;

}

function check_login2($connect)
{

    if(isset($_SESSION['userid']))
    {
        $id = $_SESSION['userid'];
        $query = "select * from user where userid = '$id' limit 1";

        $result = mysqli_query($connect, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    echo "Please login!!";
    die;

}



function ran_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);
    for ($i=0; $i < $len; $i++){

        $text .= rand(0,9);

    }

    return $text;
}

function image_upload($connect)
{
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $image = $_FILES['image']['name'];
        $id = $user_data['user_id'];

        $target = "profile/".basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $query = "update users set profile_image = '$image' where userid =  $id ";
        $result = mysqli_query($connect, $query);

        if($result != 1){
                header('Location: error.php');
            }else{
                header('Location: profile.php');
            }
    }
}


?>