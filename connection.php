<?php

$hostname= "localhost";
$userid= "root";
$password = "";
$db_name = "bidding_system";

$connect = mysqli_connect($hostname, $userid, $password, $db_name);

if (!$connect = mysqli_connect($hostname, $userid, $password, $db_name)) {

    die("Connection failed!");

}