<?php
include_once "php/connection.php";

$username = "aa";
$password = "dd";

$result = mysqli_query($con, "Select administrator.administratorappid,
  administrator.administratorapppw,
  administrator.administratorid,
  administrator.administratorname,
  administrator.administratorrole
From administrator
Where administrator.administratorappid = $username And administrator.administratorapppw = $password ");



if (mysqli_num_rows($result) == 0) {
   echo "hi";
} else {
    echo "aaaaaaa";

}
?>