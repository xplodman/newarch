<?php
include_once "connection.php";
//var_dump(get_defined_vars());
$database_name=$_SESSION['5inarch']['database_name'];
$receipttype=$_POST['receipttype'];
$receiptid=$_GET['receiptid'];

if ($receipttype=="1"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $date=$_POST['date'];
    $reason=$_POST['reason'];
    $description=$_POST['description'];

    $result1 = mysqli_query($con, "UPDATE `$database_name`.`tickets` SET `tirecipient` = '$recipient', `tirealdate` = '$date', `tinumber` = '$number', `tidescription` = '$description' WHERE `tickets`.`tiid` = $receiptid;");


}elseif ($receipttype=="2"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $donor=$_POST['donor'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];
    $reason=$_POST['reason'];

    $result1 = mysqli_query($con, "UPDATE `$database_name`.`tickets` SET `tiamount` = '$amount', `tidonor` = '$donor', `tirecipient` = '$recipient', `tirealdate` = '$date', `tireason` = '$reason', `tinumber` = '$number', `tidescription` = '$description' WHERE `tickets`.`tiid` = $receiptid;");

}elseif ($receipttype=="99"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $donor=$_POST['donor'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];
    $reason="99";

    $result1 = mysqli_query($con, "UPDATE `$database_name`.`tickets` SET `tiamount` = '$amount', `tidonor` = '$donor', `tirecipient` = '$recipient', `tirealdate` = '$date', `tireason` = '$reason', `tinumber` = '$number', `tidescription` = '$description' WHERE `tickets`.`tiid` = $receiptid;");

}elseif ($receipttype=="3"){
    $number=$_POST['number'];
    $donor=$_POST['donor'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    $titype=$_POST['titype'];

    $result1 = mysqli_query($con, "UPDATE `$database_name`.`tickets` SET `tidonor` = '$donor', `tirealdate` = '$date', `tinumber` = '$number', `tidescription` = '$description' WHERE `tickets`.`tiid` = $receiptid;");
}


$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
if ($result1) {
    mysqli_commit($con);

    header('Location: '.$uri_parts[0].'?backresult=1&receiptid='.$receiptid.'');
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;
}
else {

    header('Location: '.$uri_parts[0].'?backresult=0&receiptid='.$receiptid.'');
    $fh = fopen('/tmp/track.txt','a');
    fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
    fclose($fh);
    exit;}
?>