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

    function currentDateTime() {
        $config_array = include 'config.php';
        $now = new DateTime($config_array['timezone']);
        return $now;
    }
    function getConfig() {
        $config_array = include 'config.php';
        return $config_array;
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
            
            $date = $this->currentDateTime()->format('Y-m-d H:i:s');
            $hash = $this->hashDBHours($date);
             $db->addAttendEvent($student_id, $date, 1, $hash );
    
            
            if ($this->clockInOrOut($student_id) == 'out') {
                $output = '' . ' 
                <div class="alert alert-success" role="alert">
                    <strong>Success!</strong> ' . $this->isStudentEnrolled($student_id) . ' Clocked <strong>OUT</strong>
                </div>
                    ';
                echo $output;
            }
            if ($this->clockInOrOut($student_id) == 'in') {
                $output = '' . ' 
                <div class="alert alert-info" role="alert">
                    <strong>Success!</strong> ' . $this->isStudentEnrolled($student_id) . ' Clocked <strong>IN</strong>
                </div>
                    ';
                echo $output;
            }
        }
    }

    function validateStudentIDs($student_id) {
        $options_array = array("options" => array("min_range" => 100000, "max_range" => 1000000));
        if (filter_var($student_id, FILTER_VALIDATE_INT, $options_array) == null) {
            return false;
        }
        return true;
    }
    function validateEnrollment($student_id, $student_name, $student_email) {
        if ($student_name == null) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Enter a Name</div>';
        }
        else if ($student_id == null) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Enter a Student ID</div>';
        }  
        else if ($student_email == null) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> Enter an Email Address</div>';
        }
        else if ($this->validateStudentIDs($student_id) == false) {
            return '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> That is not a valid Student ID number</div>';
        }
        else if ($this->isStudentEnrolled($student_id) != false) {
            $output = '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> ' . $this->isStudentEnrolled($student_id) . ' is already enrolled';
            return $output;
        }
        else if ($this->validateEmails($student_email) == false) {
            $output = '<div class="alert alert-danger" role="alert"><strong>Warning!</strong>Email Invalid';
            return $output;
        }
        if (!($student_name == null) && !($student_id == null) && !($student_email == null) && !(($this->validateStudentIDs($student_id)) == false) && !($this->isStudentEnrolled($student_id) != false) && !($this->validateEmails($student_email) == false) ){
            return 'success';
        }
    }
    function enrollStudent($student_id, $student_name, $student_email) {
        require_once 'includes/db.class.php';
        require_once 'includes/mail.class.php';
        $db = new db();
        $mail = new mail();
        $formValidate = $this->validateEnrollment($student_id, $student_name, $student_email);
        if ($formValidate == 'success') {
            $db->enrollStudent($student_name, $student_id, $student_email, $this->currentDateTime()->format('Y-m-d H:i:s'));
            $mail->sendConfirmationEmail($student_name, $student_email);
            echo '<div class="alert alert-success" role="alert"><strong>Success!</strong> ' . $student_name . ' enrolled</div>';
        }
        else {
            echo $formValidate;
        }
    }
    
    function clockInOrOut ($student_id) {
        require_once 'includes/db.class.php';
        $db = new db();
        
        $checkInArray = $db->getStudentCheckIns($student_id);
        
        $todayCounter = 0;
        
        for ($i=0; $i < count($checkInArray); $i++) {
            $workingDate = new DateTime($checkInArray[$i]['student_attendance'], new DateTimeZone($this->getConfig()['timezone']));
            $workingDate = $workingDate->format('Y-m-d');
            $today = $this->currentDateTime()->format('Y-m-d');
            if ($workingDate == $today) {
                $todayCounter++;
            }
        }
        if ($todayCounter % 2 == 0) {
            return 'out';
        }
        else if ($todayCounter % 2 == 1) {
            return 'in';
        }
        else {
            return false;
        }
        
    }
    function hashDBHours($datetime) {
        $toHash = strrev($datetime);
        $finalHash = hash('sha256', $toHash);
        return $finalHash;
    }
    function validateEmails($email) {
        require_once 'includes/db.class.php';
        $db = new db();
        $student_name = $db->checkEmailExist($email);
        $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!($student_name == false)) {
            return false;
        }
        else if (!$isEmailValid) {
            return false;
        }
        else {
            return true;
        }
           
    }

}
