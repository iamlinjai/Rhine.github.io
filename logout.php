<?php 

session_start();

session_unset();

session_destroy();

header("Location: home.php");

setcookie('userid', NULL, time()-3600);