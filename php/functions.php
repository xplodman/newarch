<?php
function student_count($styear) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Count(students.stid) As student_count From students Where students.sttype2 != 'E' AND students.styear = $styear");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['student_count'];
    echo $sum;
}

function student_summary($styear , $clause , $condition) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Count(students.stid) As student_count From students Where $clause = '$condition' And students.styear = $styear");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['student_count'];
    echo $sum;
}

function student_summary_detail($styear , $clause , $condition) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Count(students.stid) As student_count From students Where $clause = '$condition' And students.styear = $styear");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['student_count'];
    return $sum;
}

function profesor_payroll_detail($profesor_id , $type , $month) {
    include "php/connection.php";
    $result = mysqli_query($con,"SELECT
  Coalesce(Sum(tickets.tiamount), 0) As amount
FROM
  tickets
WHERE
  Month(tickets.tirealdate) = '$month' AND
  tickets.tireason = '$type' AND
  tickets.tirecipient = '$profesor_id'");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['amount'];
    return $sum;
}



function material_summary_detail($id , $clause , $condition) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Count(students.stid) As student_count,
  material.matname
From students
  Inner Join stmat On stmat.students_stid = students.stid
  Inner Join material On material.matid = stmat.material_matid
Where material.matid = '$id' And $clause = '$condition' And stmat.status = '1'");
    $row = mysqli_fetch_assoc($result);
    $student_count = $row['student_count'];
    return $student_count;

}

function summary_all_in($id , $year) {
    include "php/connection.php";
    $result = mysqli_query($con,"SELECT 
CASE 
    WHEN tickets.tireason = 'p1' then 'كورس'
    WHEN tickets.tireason = 'p2' then 'مذكرات'
    WHEN tickets.tireason = 'p3' then 'مراجعة نهائية' 
    WHEN tickets.tireason = 'p5' then 'مراجعة' 
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

function summary_all_out($id) {
    include "php/connection.php";
    $result = mysqli_query($con,"SELECT
  Sum(tickets.tiamount) AS amount,
  expenses.exname AS reason
FROM
  tickets
  INNER JOIN expenses ON tickets.tireason = expenses.excode
Where tickets.titype in ('$id') 
Group By tickets.titype,
  tickets.tireason");
    return $result;
}

function summary_all_aid () {
    include "php/connection.php";
    $result = mysqli_query($con,"SELECT
Sum(tickets.tiamount)  AS amount,
  CASE 
    WHEN students.styear = '1' then 'First'   
    WHEN students.styear = '2' then 'Second'   
    WHEN students.styear = '3' then 'Third'   
    WHEN students.styear = '4' then 'Fourth'   
    ELSE 'Maybe'                                 
END AS year                  
From tickets
  Inner Join students On students.stid = tickets.tirecipient
Where tickets.tireason = 'm0'
Group By tickets.titype,
  tickets.tireason,
  students.styear");
    return $result;
}

function sumincome($styear) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Sum(students.stbalance) As stbalance
				From students
				Where students.sttype2 != 'E' And students.styear = '$styear'");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['stbalance'];
    $sum=abs($sum);
    echo $sum;
}
function sumallincome($titype) {
    include "php/connection.php";
    $result = mysqli_query($con,"Select Sum(students.stbalance) As stbalance
				From students
				Where students.sttype2 != 'E' And students.styear != '5'");
    $row = mysqli_fetch_assoc($result);
    $sum = $row['stbalance'];
    if (is_null($row['stbalance']))
    {echo "No data!";};
    $sum=abs($sum);
    echo $sum;
};

function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
}