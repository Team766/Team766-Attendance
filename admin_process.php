<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    admin_process.php 
* @start   Jul 1, 2014
* @author  pjztam
* @link    attendance.team766.com
*** *** *** *** *** *** */
if (isset($_GET['mod'])) {
    $adminModule = $_GET['mod'];
}
else {
    die('No admin functions requested');
}

if ($adminModule == 'sortPeopleHoursDescend') {
        require_once 'includes/admin.class.php';
        $admin = new admin();
       echo $admin->returnSortPeopleHoursDescend();
}
if ($adminModule == 'sortPeopleIDDescend') {
        require_once 'includes/admin.class.php';
        $admin = new admin();
       echo $admin->returnSortPeopleIDDescend();
}
if ($adminModule == 'sortPeopleNameDescend') {
        require_once 'includes/admin.class.php';
        $admin = new admin();
       echo $admin->returnSortPeopleNameDescend();
}
?>