<?php
//var_dump(get_defined_vars());
$database_name=$_SESSION['5inarch']['database_name'];

include_once "connection.php";


$character = array(" ", "	", "(", ")", "-", "/");

$materialid=$_GET['materialid'];
$matname=$_POST['matname'];
$matyear=$_POST['matyear'];
$matterm=$_POST['matterm'];

$result1 = mysqli_query($con, "UPDATE `$database_name`.`material` SET `matname` = '$matname', `matyear` = '$matyear', `matterm` = '$matterm' WHERE `material`.`matid` = '$materialid';");


$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
if ($result1) {
mysqli_commit($con);

    header('Location: '.$uri_parts[0].'?backresult=1&materialid='.$materialid);
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;
}
else {

    header('Location: '.$uri_parts[0].'?backresult=0&materialid='.$materialid);
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;}
