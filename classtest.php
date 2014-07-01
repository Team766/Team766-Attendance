<?php

/*** *** *** *** *** ***
* @package Team766-Attendence
* @file    classtest.php 
* @start   Jun 27, 2014
* @author  pjztam
* @link    attendence.team766.com
*** *** *** *** *** *** */
if (1==0) {
    

if (1==0) {
    $config_array = include 'config.php';
}

if (1==0) {
    require_once 'includes/db.class.php';
    $db_class = new db();
    echo $db_class->constructPDOconnect();
}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $db->addAttendEvent('769569', $main->currentDate());
    

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $db->enrollStudent('Patrick Tam', 769569);

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    echo '' . $db->getStudent(769569);

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    echo '' . $main->isStudentEnrolled(769569);

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $mysql_date = date( 'Y-m-d');
    $db->addHours(769569, 200, $mysql_date);
    

}

if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(813165);
    echo $student->getName() . '<br>';
    echo $student->getID();
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->getTotalHoursWorked();
    
}
if (1==0) {
    $now = new DateTime('America/Los_Angeles');
    echo var_dump($now);
}
if (1==0) {
    require_once 'includes/main.class.php';
    $main = new main();
    echo '' . $main->validateStudentIDs(769569);
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    echo var_dump($student->createDateArray());
}
}

if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->removeNonCheckIns();
    echo var_dump($student->allCheckInsArray);
    
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->createScrubbedDateArray();
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    $db->addAttendEvent(194326, '2014-01-08 17:01:01');
    $db->addAttendEvent(194326, '2014-01-08 21:32:26');
    $db->addAttendEvent(194326, '2014-01-10 14:25:16');
    $db->addAttendEvent(194326, '2014-01-10 15:13:59');
    $db->addAttendEvent(194326, '2014-01-10 17:46:51');
    $db->addAttendEvent(194326, '2014-01-11 09:54:13');
    $db->addAttendEvent(194326, '2014-01-11 17:46:32');
    $db->addAttendEvent(194326, '2014-01-15 14:21:23');
    $db->addAttendEvent(194326, '2014-01-15 15:15:01');
    $db->addAttendEvent(194326, '2014-01-15 18:34:25');
    $db->addAttendEvent(194326, '2014-01-15 19:46:24');
    $db->addAttendEvent(194326, '2014-01-17 17:23:49');
    $db->addAttendEvent(194326, '2014-01-17 21:54:57');
    $db->addAttendEvent(194326, '2014-01-18 09:23:57');
    $db->addAttendEvent(194326, '2014-01-18 17:01:06');
    $db->addAttendEvent(194326, '2014-01-22 14:24:05');
    $db->addAttendEvent(194326, '2014-01-22 15:15:15');
    $db->addAttendEvent(194326, '2014-01-22 18:15:35');
    $db->addAttendEvent(194326, '2014-01-24 17:15:09');
    $db->addAttendEvent(194326, '2014-01-24 21:08:16');
    $db->addAttendEvent(194326, '2014-01-25 09:58:01');
    $db->addAttendEvent(194326, '2014-01-25 16:14:35');
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    echo var_dump($student->getSumTimeWorkedArray($student->createScrubbedDateArray()));
    
}
if (1==1) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->addHoursToDB();
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    $db->modifyHours(194326, '10:10:10', '2014-01-24');
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    echo '' . $db->doHoursExist(194326, '11:11:11', '2014-01-25');
}
?>
