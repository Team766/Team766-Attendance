<?php

/*** *** *** *** *** ***
* @package Team766-Attendence
* @file    classtest.php 
* @start   Jun 27, 2014
* @author  pjztam
* @link    attendence.team766.com
*** *** *** *** *** *** */
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

if (1==1) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    echo '' . $main->isStudentEnrolled(769569);

}

if (1==0) {
    

}


?>
