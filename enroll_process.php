<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    enroll_process.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
require_once 'includes/main.class.php';

if (isset($_POST['studentnamejs']) ) {
    $student_name = $_POST['studentnamejs'];
}
else {
    die('POST Fail');
}
if (isset($_POST['studentidjs'])) {
    $student_id = $_POST['studentidjs'];
}
else {
    die ('POST Fail');
}


$main = new main();
$main->enrollStudent($student_id, $student_name)

?>
