<?php
$application_settings_query = mysqli_query($con,"
SELECT * FROM `application_setting`
") or die(mysqli_error($con));
$application_settings_info = mysqli_fetch_assoc($application_settings_query);