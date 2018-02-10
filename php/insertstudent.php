<?php
include_once "connection.php";
include_once "application_setting.php";
$database_name=$_SESSION['5inarch']['database_name'];


$character = array(" ", "	", "(", ")", "-", "/");

$stname=$_POST['stname'];
$stcode=$_POST['stcode'];
$stmob=$_POST['stmob'];
$stmob = str_replace($character, "", $stmob);
$sttel=$_POST['sttel'];
$sttel = str_replace($character, "", $sttel);
$stparenttype=$_POST['stparenttype'];
$stparentname=$_POST['stparentname'];
$stparentmob=$_POST['stparentmob'];
$stparentmob = str_replace($character, "", $stparentmob);
$stemail=$_POST['stemail'];
$staddress=$_POST['staddress'];
$stnationalid=$_POST['stnationalid'];
$stnationalid = str_replace($character, "", $stnationalid);
$sttype=$_POST['sttype'];
$styear=$_POST['styear'];
$stterm=$_POST['stterm'];
$stgroup=$_POST['stgroup'];
$sttype2=$_POST['sttype2'];
$material_matid=$_POST['material_matid1'];
$material_matidcount=count($material_matid);

if ($sttype2 == "A") {
    $stbalance = $material_matidcount * -$application_settings_info['one_material_price'];
} elseif ($sttype2 == "B") {
    $stbalance = -$application_settings_info['course_price'];
} elseif ($sttype2 == "C"){
    $stbalance = $material_matidcount * -$application_settings_info['final_revision_price'];
} elseif ($sttype2 == "D"){
    $stbalance = $material_matidcount * -$application_settings_info['revision_price'];
}

$result1 = mysqli_query($con, "INSERT INTO `$database_name`.`students` (`stid`, `stcode`, `stname`, `stmob`, `sttel`, `stparenttype`, `stparentname`, `stparentmob`, `stemail`, `staddress`, `stnationalid`, `sttype`, `styear`, `stterm`, `stgroup`, `stbalance`, `sttype2`) VALUES (NULL, '$stcode', '$stname', '$stmob', '$sttel', '$stparenttype', '$stparentname', '	$stparentmob', '$stemail', '$staddress', '$stnationalid', '$sttype', '$styear', '$stterm', '$stgroup', '$stbalance', '$sttype2');");

$maxid = mysqli_query($con, "SELECT MAX(stid) FROM students");
$maxidrow = mysqli_fetch_row($maxid);
$comma_separated = implode("", $maxidrow);
$len = count($material_matid);

for($x=0 ; $x < $len ; $x++){
    $result133 = mysqli_query($con, "INSERT INTO `$database_name`.`stmat` (`stmatid`, `material_matid`, `students_stid`, `status`) VALUES (NULL, '$material_matid[$x]', '$comma_separated', '1');");
}



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
    exit;}
?>