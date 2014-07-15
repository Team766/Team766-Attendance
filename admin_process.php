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
if ($adminModule == 'activeHours') {
        echo '<ul class="nav nav-tabs" role="tablist">
<li class="active"><a id="sortPeopleHoursDescend" href="#">Hours</a></li>
	<li><a id="sortPeopleIDDescend" href="#">Student ID</a></li>
        <li><a id="sortPeopleNameDescend" href="#">Name</a></li>

                    </ul>';
}
if ($adminModule == 'activeID') {
       echo '<ul class="nav nav-tabs" role="tablist">
                        <li><a id="sortPeopleHoursDescend" href="#">Hours</a></li>
	<li class="active"><a id="sortPeopleIDDescend" href="#">Student ID</a></li>
        <li><a id="sortPeopleNameDescend" href="#">Name</a></li>

                    </ul>';
}
if ($adminModule == 'activeName') {
       echo '<ul class="nav nav-tabs" role="tablist">
                        <li><a id="sortPeopleHoursDescend" href="#">Hours</a></li>
	<li><a id="sortPeopleIDDescend" href="#">Student ID</a></li>
        <li class="active"><a id="sortPeopleNameDescend" href="#">Name</a></li>

                    </ul>';
}

?>