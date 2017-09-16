<?php
session_start();
if (!isset($_SESSION['5inarch']['authenticate']) and $_SESSION['5inarch']['authenticate']!="true")
{
    header('Location: login.php');
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
}
/**
 * check user is authenticated
 */
if (($_SESSION['5inarch']['authenticate']))
{
    if(time() - $_SESSION['5inarch']['timestamp'] > 900) { //subtract new timestamp from the old one
        header('Location: php/logout.php');
    } else {
        $_SESSION['5inarch']['timestamp'] = time(); //set new timestamp
    }
}

$highsecurity = array("NT", "professor.php", "Irix", "Linux");
$lowsecurity = array("NT", "Irix", "Linux");

// Validate user is authorize to access this page
if (in_array(basename($_SERVER['PHP_SELF']), $highsecurity)) {
    if ($_SESSION['5inarch']['role'] > 1){
        header("location:javascript://history.go(-1)");
        exit;
    }
}

if (in_array(basename($_SERVER['PHP_SELF']), $lowsecurity)) {
    if ($_SESSION['5inarch']['role'] > 2){
        header("location:javascript://history.go(-1)");
        exit;
    }
}
