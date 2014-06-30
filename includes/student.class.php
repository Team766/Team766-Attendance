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
    function createDateArray() {
        $config_array = include 'config.php';
        $timezone = new DateTimeZone($config_array['timezone']);
        $date_array = array();
        for ($i=0; $i<count($this->allCheckInsArray); $i++ ){
            $date_array[$i] = new DateTime($this->allCheckInsArray[$i]['student_attendance'],$timezone );
        }
        return $date_array;
    }
    function createScrubbedDateArray() {
        $date_array = $this->createDateArray();
        $kill_array = array();
        $kill_array_index = 0;
        for ($i=0; $i<count($date_array); $i++) {
            $iBeginning = $i;
            $i2=0;
            $same_day_array = array();
            $same_day_array[$i2] = $date_array[$i];
            $i2++;
            while ((isset($date_array[$i+1])) && ($date_array[$i]->format('Y-m-d') == $date_array[$i+1]->format('Y-m-d'))) {
                $same_day_array[$i2] = $date_array[$i];
                $i2++;
                $i++;
            }
            $sameDayLength = count($same_day_array);
            if ($sameDayLength % 2 == 1) {
                $kill_array[$kill_array_index] = array("iBeginning" => $iBeginning, "sameDayLength" => $sameDayLength);
                $kill_array_index++;
            }
        }
        for ($i=0; $i<count($kill_array); $i++) {
            array_splice($date_array, $kill_array[$i]['iBeginning'], $kill_array[$i]['sameDayLength']);
            if (isset($kill_array[$i+1])) {
                $kill_array[$i+1]['iBeginning'] = $kill_array[$i+1]['iBeginning'] - $kill_array[$i]['sameDayLength'];
            }
        }
        return $date_array;
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
