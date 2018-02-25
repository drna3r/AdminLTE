<?php
//DataBase Connection Information

session_start();
if (isset($_SESSION['user'])){
    $dbname = 'loyax_'.$_SESSION['user'];
}else{
    header("Location: login.php"); /* Redirect browser */
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";