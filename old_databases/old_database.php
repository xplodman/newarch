<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
include_once "../php/connection.php";

$database_name=$_POST['database_name'];
$result2 = mysqli_query($con, "SELECT SCHEMA_NAME AS `Database` FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME LIKE '5inarch%'");
while($row2 = mysqli_fetch_array($result2))
{
    $databases[] = $row2['Database'];
}
print_r($databases);
if (!in_array($database_name, $databases)) {
//    $database_create = mysqli_query($con, "CREATE DATABASE $database_name CHARACTER SET utf8 COLLATE utf8_general_ci");
//    exec('mysql -u root -proot -h localhost '.$database_name.' < '.$database_name.'.sql --max_allowed_packet=2048M');
}else{

}

if ($database_name=="5inarch"){
    unset($_SESSION['5inarch']['old_database']);
    unset($_SESSION['5inarch']['old_database_status']);
}else{
    session_start();
    $_SESSION['5inarch']['old_database'] = $database_name;
}

header('Location: ../index.php');
exit;

?>
