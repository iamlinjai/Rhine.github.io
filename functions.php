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
