<?php

/*** *** *** *** *** ***
* @package Team766-Attendence
* @file    enroll_process.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    attendence.team766.com
*** *** *** *** *** *** */
require_once 'includes/db.class.php';
require_once 'includes/main.class.php';
$student_name = $_POST['studentname'];
$student_id = $_POST['studentid'];

$main = new main();
$db = new db();
$db->enrollStudent($student_name, $student_id);
$main->clockInStudent($student_id);
?>
