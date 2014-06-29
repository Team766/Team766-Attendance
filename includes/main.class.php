<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendence
 * @file    main.class.php 
 * @start   Jun 27, 2014
 * @author  pjztam
 * @link    attendence.team766.com
 * ** *** *** *** *** *** */

/**
 * Holds main worker classes
 *
 * @author pjztam
 */
class main {
    function currentDate() {
        $mysql_date = date( 'Y-m-d H:i:s');
        return $mysql_date;
    }
    function isStudentEnrolled($student_id_number){
        require_once 'includes/db.class.php';
        require_once 'includes/main.class.php';
        $main = new main();
        $db = new db();
        $student_name = $db->getStudent($student_id_number);
        if ($student_name == false) {
            return false;
        }
        return $student_name;
    }
    function clockInStudent($student_id) {
        require_once 'includes/db.class.php';
        require_once 'includes/main.class.php';
        $main = new main();
        $db = new db();
        if ($this->isStudentEnrolled($student_id) == false) {
            header('Location: enroll.php');
        }
        else {
            $db->addAttendEvent($_GET['studentid'], $main->currentDate());
            header('Location: clockin.php?studentname=' . $this->isStudentEnrolled($student_id));
        }
       
    }
}
