<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendance
 * @file    main.class.php 
 * @start   Jun 27, 2014
 * @author  pjztam
 * @link    Attendance.team766.com
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
            $output = '' . ' 
            <div class="alert alert-danger" role="alert">
                <strong>Warning!</strong> Please rescan ID Card
            </div>
                ';
            echo $output;
        } else if ($this->isStudentEnrolled($student_id) == false) {
            $output = '' . ' 
            <div class="alert alert-danger" role="alert">
                <strong>Warning!</strong> You must enroll before checking in
            </div>
                ';
            echo $output;
        } else {
            $db->addAttendEvent($student_id, $this->currentDate());
            $output = '' . ' 
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> ' . $this->isStudentEnrolled($student_id) . ' Checked In
            </div>
                ';
            echo $output;
        }
    }

    function validateStudentIDs($student_id) {
        $options_array = array("options" => array("min_range" => 100000, "max_range" => 1000000));
        if (filter_var($student_id, FILTER_VALIDATE_INT, $options_array) == null) {
            return false;
        }
        return true;
    }
    function validateEnrollment($student_id, $student_name) {
        if ($student_name == null) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Enter a Name</div>';
        }
        else if ($student_id == null) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Enter a Student ID</div>';
        }     
        else if ($this->validateStudentIDs($student_id) == false) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> That is not a valid Student ID number</div>';
        }
        else if ($this->isStudentEnrolled($student_id) != false) {
            $output = '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> ' . $this->isStudentEnrolled($student_id) . ' is already enrolled';
            return $output;
        }
        if (!($student_name == null) && !($student_id == null) && !(($this->validateStudentIDs($student_id)) == false) && !($this->isStudentEnrolled($student_id) != false) ){
            return 'success';
        }
    }
    function enrollStudent($student_id, $student_name) {
        require_once 'includes/db.class.php';
        $db = new db();
        $formValidate = $this->validateEnrollment($student_id, $student_name);
        if ($formValidate == 'success') {
            $db->enrollStudent($student_name, $student_id, $this->currentDate());
            echo '<div class="alert alert-success" role="alert"><strong>Success!</strong> ' . $student_name . ' enrolled</div>';
        }
        else {
            echo $formValidate;
        }
    }

}
