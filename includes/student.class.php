<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendence
 * @file    student.class.php 
 * @start   Jun 29, 2014
 * @author  pjztam
 * @link    attendence.team766.com
 * ** *** *** *** *** *** */

/**
 * Description of student
 *
 * @author pjztam
 */
class student {
    
    var $allCheckInsArray;
    var $student_id;
    
    function __construct($student_id_param) {
        require_once 'includes/db.class.php';
        $db = new db();
        $this->student_id = $student_id_param;
        $this->allCheckInsArray = $db->getStudentCheckIns($student_id_param);
    }
    function getTotalHoursWorked() {
        $config_array = include 'config.php';
        $timezone = new DateTimeZone($config_array['timezone']);
        $date_array = array();
        for ($i=0; $i<count($this->allCheckInsArray); $i++ ){
            $date_array[$i] = new DateTime($this->allCheckInsArray[$i]['student_attendance'],$timezone );
        }
        echo var_dump($date_array);
    }
    function getID() {
        return $this->student_id;
    }
    function getName() {
        require_once 'includes/db.class.php';
        $db = new db();
        $student_name = $db->getStudent($this->student_id);
        return $student_name;
    }
    function printAll() {
        echo 'Student ID #: ' . $this->getID() . '<br>';
        echo 'Student Name: ' . $this->getName() . '<br>';
        echo var_dump($this->allCheckInsArray);
    }
}
