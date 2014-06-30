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
if (1==1) {
    
}
?>
