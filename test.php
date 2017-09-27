<?php
function summary_all_in($id , $year) {
    include "php/connection.php";
    $result = mysqli_query($con,"SELECT 
CASE 
    WHEN tickets.tireason = 'p1' then 'كورس'
    WHEN tickets.tireason = 'p2' then 'مذكرات'
    WHEN tickets.tireason = 'p3' then 'مراجعة نهائية' 
    WHEN tickets.tireason = 'p4' then 'آخري'   
    ELSE 'Maybe'                                 
END AS reason ,    
  Sum(tickets.tiamount)  AS amount                 
From tickets
  Inner Join students On students.stid = tickets.tidonor
Where tickets.titype in ('$id') And students.styear = '$year' 
Group By tickets.titype,
  tickets.tireason,
  students.styear");
    return $result;
}

$first_new = summary_all_in(1,'1');

while($y = mysqli_fetch_assoc($first_new)) {
    echo "['".$y['reason']."','".$y['amount']."'],";
}
?>