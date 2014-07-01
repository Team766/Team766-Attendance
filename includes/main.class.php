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
        $config_array = include 'config.php';
        $now = new DateTime($config_array['timezone']);
        return $now->format('Y-m-d H:i:s');
    }

    function isStudentEnrolled($student_id_number) {
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
        $db = new db();
        if ($this->validateStudentIDs($student_id) == false) {
            header('Location: clockin.php?message=ERROR%20Please%20rescan%20card');
        } else if ($this->isStudentEnrolled($student_id) == false) {
            header('Location: clockin.php?message=YOU%20MUST%20ENROLL%20BEFORE%20CHECKING%20IN');
        } else {
             $db->addAttendEvent($student_id, $this->currentDate());
             header('Location: clockin.php?message=' . $this->isStudentEnrolled($student_id) . '%20Checked%20In');
        }
      
    }

    function validateStudentIDs($student_id) {
        $options_array = array("options" => array("min_range" => 100000, "max_range" => 1000000));
        if (filter_var($student_id, FILTER_VALIDATE_INT, $options_array) == null) {
            return false;
        }
        return true;
    }

}
