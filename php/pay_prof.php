<?php
include_once "connection.php";
$payroll=$_POST['payroll'];
$prof_id=$_POST['prof_id'];
$date_payroll=$_POST['date_payroll'];
$donor=$_SESSION['5inarch']['professorsid'];

$result1 = mysqli_query($con, "INSERT INTO `tickets` (`tiid`, `tiamount`, `tidonor`, `tidonortype`, `tirecipient`, `tirecipienttype`, `tirealdate`, `tisysdate`, `tireason`, `tinumber`, `tidescription`, `titype`) VALUES (NULL, -$payroll, '$donor', '1', '$prof_id', '1', '$date_payroll', now(), 'm3', '', '', '2');")or die(mysqli_error($con));;

$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);
if ($result1) {
    mysqli_commit($con);
    header('Location: '.$uri_parts[0].'?backresult=1');
    exit;
}
else {
    header('Location: '.$uri_parts[0].'?backresult=0');
    exit;}
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

