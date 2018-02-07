<?php
include_once "connection.php";

$course_price=$_POST['course_price'];
$final_revision_price=$_POST['final_revision_price'];
$one_material_price=$_POST['one_material_price'];

$update_application_setting = mysqli_query($con, "UPDATE `application_setting` SET `course_price` = '$course_price', `final_revision_price` = '$final_revision_price', `one_material_price` = '$one_material_price' WHERE `application_setting`.`id` = 0;
")or die(mysqli_error($con));


$uri_parts = explode('?', $_SERVER['HTTP_REFERER'], 2);

if ($update_application_setting) {
    mysqli_commit($con);
    header('Location: '.$uri_parts[0].'?backresult=1');
    exit;
}
else {

    header('Location: '.$uri_parts[0].'?backresult=0');
    exit;
}


?>
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
