<?php

/*** *** *** *** *** ***
* @package Team766-Attendence
* @file    clockin.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    attendence.team766.com
*** *** *** *** *** *** */
if ( isset($_GET['studentname'])) {
    $student_name = $_GET['studentname'];
}

?>
<h1><?php if (isset($student_name)) echo $student_name . ' checked in'?></h1>
<form action='clockin_process.php' method='GET' accept-charset="UTF-8">
<input autofocus="autofocus" type='text' name='studentid' id='studentid' />
</form>