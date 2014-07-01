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
        $this->addHoursToDB();
    }

    function createDateArray() {
        $config_array = include 'config.php';
        $timezone = new DateTimeZone($config_array['timezone']);
        $date_array = array();
        for ($i = 0; $i < count($this->allCheckInsArray); $i++) {
            $date_array[$i] = new DateTime($this->allCheckInsArray[$i]['student_attendance'], $timezone);
        }
        return $date_array;
    }

    function createScrubbedDateArray() {
        $date_array = $this->createDateArray();

        $kill_array = $this->getDuplicateDaysKillArray($date_array);

        for ($i = 0; $i < count($kill_array); $i++) {
            array_splice($date_array, $kill_array[$i]['iBeginning'], $kill_array[$i]['sameDayLength']);
            if (isset($kill_array[$i + 1])) {
                $kill_array[$i + 1]['iBeginning'] = $kill_array[$i + 1]['iBeginning'] - $kill_array[$i]['sameDayLength'];
            }
        }

        return $date_array;
    }

    function getSumTimeWorkedArray($date_array) {
        $hours_worked_array = array();
        $hours_worked_array_index = 0;
        for ($i = 0; $i < count($date_array); $i = $i + 2) {
            $time_difference = $date_array[$i]->diff($date_array[$i + 1]);
            $hours_worked_array[$hours_worked_array_index] = array("date" => $date_array[$i]->format('Y-m-d'), "time_difference" => $time_difference);
            $hours_worked_array_index++;
        }
        for ($i = 0; $i < count($hours_worked_array); $i++) {
            if ((isset($hours_worked_array[$i + 1])) && $hours_worked_array[$i]['date'] == $hours_worked_array[$i + 1]['date']) {
                $dateZero = new DateTime('00:00');
                $dateZero2 = new DateTime('00:00');
                $dateZero->add($hours_worked_array[$i]['time_difference']);
                $dateZero->add($hours_worked_array[$i + 1]['time_difference']);
                $combinedInterval = $dateZero2->diff($dateZero);
                $hours_worked_array[$i]['time_difference'] = $combinedInterval;
                array_splice($hours_worked_array, $i, 1);
                $i--;
            }
        }
        return $hours_worked_array;
    }

    function addHoursToDB() {
        require_once 'includes/db.class.php';
        $db = new db();
        $date_array = $this->createScrubbedDateArray();
        $hours_array = $this->getSumTimeWorkedArray($date_array);
        for ($i = 0; $i < count($hours_array); $i++) {
            $time_worked = $hours_array[$i]['time_difference']->format('%H:%I:%S');
            $date = $hours_array[$i]['date'];
            if (!($db->doHoursExist($this->student_id, $time_worked, $date))) {
                $db->addHours($this->student_id, $time_worked, $date);
            }
        }
    }

    function getDuplicateDaysKillArray($date_array) {
        $kill_array = array();
        $kill_array_index = 0;

        for ($i = 0; $i < count($date_array); $i++) {
            $iBeginning = $i;
            $i2 = 0;
            $same_day_array = array();
            $same_day_array[$i2] = $date_array[$i];
            $i2++;
            while ((isset($date_array[$i + 1])) && ($date_array[$i]->format('Y-m-d') == $date_array[$i + 1]->format('Y-m-d'))) {
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

        return $kill_array;
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
