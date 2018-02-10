<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
include_once "php/connection.php";

$excode_query = mysqli_query($con, "
SELECT 
  Replace(expenses.excode, 'm', '') AS excode
FROM
  expenses");
while ($excode_result = $excode_query->fetch_assoc()) {
    $excode_array[]= $excode_result['excode'];
}
echo '<pre>'; print_r($excode_array); echo '</pre>';
$value = max($excode_array);
echo $value;

?>
