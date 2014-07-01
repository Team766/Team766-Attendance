<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    clockin.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
if ( isset($_GET['message'])) {
    $message = $_GET['message'];
}

?>
<h1><?php if (isset($message)) echo '' . $message ?></h1>
<form action='clockin_process.php' method='GET' accept-charset="UTF-8">
<input autofocus="autofocus" type='text' name='studentid' id='studentid' />
</form>