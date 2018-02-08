<meta charset="utf-8">

<?php
include_once "php/functions.php";

include_once "php/connection.php";

$professors_query = mysqli_query($con, "SELECT (@cnt := @cnt + 1) AS rowNumber, professors.prid, professors.prname FROM professors CROSS JOIN (SELECT @cnt := 0) AS dummy");
while($professors_info = mysqli_fetch_assoc($professors_query)) {
    $php_data= array();
    $php_data['x_labels']= array();
    $php_data['khasm']= array();
    $php_data['solfa']= array();
    $php_data['moratab']= array();
    $month_name = array();
    $month_number = array();
    $i = -2;

    while ($i <= 1) {
        $month_name = date('F', strtotime("+$i month"));
        $month_number = date('m', strtotime("+$i month"));

        $type_99 = profesor_payroll_detail($professors_info['prid'], 99, $month_number);
        $type_m1 = profesor_payroll_detail($professors_info['prid'], 'm1', $month_number);
        $type_m3 = profesor_payroll_detail($professors_info['prid'], 'm3', $month_number);
        array_push($php_data['x_labels'], $month_name);
        array_push($php_data['khasm'], $type_99 * 1);
        array_push($php_data['solfa'], $type_m1 * 1);
        array_push($php_data['moratab'], $type_m3 * 1);
        $i++;
    }
}
?>