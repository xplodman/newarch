<?php
include_once "connection.php";

//var_dump(get_defined_vars());
$database_name=$_SESSION['5inarch']['database_name'];

$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);

$receipttype=$_POST['receipttype'];

if ($receipttype=="1"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $donor=$_POST['donor'];
    $reason=$_POST['reason'];
    $amount=$_POST['amount'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    $result1 = mysqli_query($con, "INSERT INTO `$database_name`.`tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '2', '$recipient', '1', '$date', now(), '$reason', '$number', '$description', '1');");

    if ($reason == "p1") {
        $result2 = mysqli_query($con, "UPDATE `$database_name`.`students` SET `stbalance` = `stbalance`+$amount WHERE `students`.`stid` = $donor;");
    };
}elseif ($receipttype=="2"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $donor=$_POST['donor'];
    $reason=$_POST['reason'];
    $amount=$_POST['amount'];
    $amount=$amount*-1;
    $date=$_POST['date'];
    $description=$_POST['description'];

    $result1 = mysqli_query($con, "INSERT INTO `$database_name`.`tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '1', '$recipient', '1', '$date', now(), '$reason', '$number', '$description', '2');");

}elseif ($receipttype=="3"){
    $number=$_POST['number'];
    $recipient=$_POST['recipient'];
    $donor=$_POST['donor'];
    $percent=$_POST['percent'];
    $amount=$_POST['amount'];
    $amount=$percent/100*$amount;
    $amountconv=$amount;
    $amount=$amount*-1;
    $date=$_POST['date'];
    $description=$_POST['description'];

    $result1 = mysqli_query($con, "INSERT INTO `$database_name`.`tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '1', '$recipient', '2', '$date', now(), 'm0', '$number', '$description', '$percent');");
    $result2 = mysqli_query($con, "UPDATE `$database_name`.`students` SET `stbalance` = `stbalance`+$amountconv WHERE `students`.`stid` = $recipient;");
}



// return back with backresult
    $uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
    if ($result1) {
        mysqli_commit($con);

        header('Location: '.$uri_parts[0].'?backresult=1');
        $fh = fopen('/tmp/track.txt','a');
        fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
        fclose($fh);
        exit;
    }
    else {

        header('Location: '.$uri_parts[0].'?backresult=0');
        $fh = fopen('/tmp/track.txt','a');
        fwrite($fh, $_SERVER['REMOTE_ADDR'].' '.date('c')."\n");
        fclose($fh);
        exit;
    }


?>
<!---->
<!--<table>-->
<!--    --><?php
//    foreach ($_POST as $key => $value) {
//        echo "<tr>";
//        echo "<td>";
//        echo $key;
//        echo "</td>";
//        echo "<td>";
//        if (is_array($value)){
//            print_r($value);
//        }else{
//            echo $value;
//        }
//        echo "</td>";
//        echo "</tr>";
//    }
//    ?>
<!--</table>-->
<!---->

