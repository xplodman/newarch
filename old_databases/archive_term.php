<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
include_once "../php/connection.php";

$archive_term_name='5inarch_'.$_POST['archive_term_name'];
$student_balance=$_POST['student_balance'];

$insert_black_list_students = mysqli_query($con, "
INSERT INTO black_list_students
SELECT
  students.stid,
  students.stcode,
  students.stname,
  students.stmob,
  students.sttel,
  students.stparenttype,
  students.stparentname,
  students.stparentmob,
  students.stemail,
  students.staddress,
  students.stnationalid,
  students.sttype,
  students.sttype2,
  students.styear,
  students.stterm,
  students.stgroup,
  students.stbalance,
  '$archive_term_name' as '$archive_term_name'
FROM
  students
WHERE students.stbalance < -'$student_balance';");
mysqli_commit($con);

exec('mysqldump -e -uroot -proot -hlocalhost 5inarch > "'.$archive_term_name.'.sql ');

$truncate_tables = mysqli_query($con, "SET FOREIGN_KEY_CHECKS=0;");
$truncate_tables = mysqli_query($con, "TRUNCATE absence;");
$truncate_tables = mysqli_query($con, "TRUNCATE professors_payroll;;");
$truncate_tables = mysqli_query($con, "TRUNCATE stmat;");
$truncate_tables = mysqli_query($con, "TRUNCATE students;");
$truncate_tables = mysqli_query($con, "TRUNCATE tickets;");
$truncate_tables = mysqli_query($con, "TRUNCATE absence;");
$truncate_tables = mysqli_query($con, "SET FOREIGN_KEY_CHECKS=1;");

    $database_create = mysqli_query($con, "CREATE DATABASE $archive_term_name CHARACTER SET utf8 COLLATE utf8_general_ci");
    exec('mysql -u root -proot -h localhost '.$archive_term_name.' < '.$archive_term_name.'.sql --max_allowed_packet=2048M');

header('Location: ../index.php');
exit;

?>
