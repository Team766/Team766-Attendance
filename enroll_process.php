<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    enroll_process.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
require_once 'includes/db.class.php';
$student_name = $_POST['studentname'];
$student_id = $_POST['studentid'];
$db = new db();
$db->enrollStudent($student_name, $student_id);
header('Location: enroll.php?message=' . $student_name . '%20enrolled' );
?>
