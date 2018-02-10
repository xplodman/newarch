<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    // Configure connection settings
if (isset($_SESSION['5inarch']['old_database']))
{
    $db = $_SESSION['5inarch']['old_database'];
    $_SESSION['5inarch']['old_database_status'] = "true";
    $_SESSION['5inarch']['database_name']=$db;

}else{
    $db = '5inarch';
    $_SESSION['5inarch']['database_name']=$db;
}

    $db_admin = 'root';
    $db_password = 'root';
    $con = mysqli_connect("localhost", "$db_admin", "$db_password", "$db");

    // show arabic result
    $arabicsql= 'SET CHARACTER SET utf8';
    mysqli_query($con,$arabicsql);
?>