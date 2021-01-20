<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );


require_once "lib/autoload.php";

$_SESSION['user']=[];

session_start();
session_destroy();
session_regenerate_id();
$_SESSION['msgs'][] = "U bent uitgelogd!";
header("Location: login.php"); exit;




?>

