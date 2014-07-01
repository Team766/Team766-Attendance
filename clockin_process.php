<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    clockin_process.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
    require_once 'includes/main.class.php';
    $main = new main();
    $main->clockInStudent($_GET['studentid']);
?>
