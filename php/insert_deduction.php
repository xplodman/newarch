<?php
//var_dump(get_defined_vars());

include_once "connection.php";
$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);

$receipttype="99";
$number=$_POST['number'];
$recipient=$_POST['recipient'];
$donor=$_POST['donor'];
$reason="99";
$amount=$_POST['amount']*-1;
$date=$_POST['date'];
$description=$_POST['description'];

$result1 = mysqli_query($con, "INSERT INTO `tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, '$amount', '$donor', '1', '$recipient', '1', '$date', now(), '$reason', '$number', '$description', '$receipttype');")or die(mysqli_error($con));


// return back with backresult
    $uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
    if ($result1) {
        mysqli_commit($con);

        header('Location: '.$uri_parts[0].'?backresult=1');
        exit;
    }
    else {

        header('Location: '.$uri_parts[0].'?backresult=0');
        exit;
    }


?>