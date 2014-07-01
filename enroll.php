<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    enroll.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
if ( isset($_GET['message'])) {
    $message = $_GET['message'];
}
?>
<h1><?php if (isset($message)) echo '' . $message ?></h1>
<form action='enroll_process.php' method='POST' accept-charset="UTF-8">
    Student ID:<input type='text' name='studentid' id='studentid' /><br>
    Student Name<input type='text' name='studentname' id='studentname' /><br>
    <input type="submit">
</form>