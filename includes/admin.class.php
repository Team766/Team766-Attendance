<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    admin.class.php 
* @start   Jun 29, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
class admin {
    var $db;
    var $main;
    var $student_object_array;
    function __construct() {
        require_once 'db.class.php';
            $this->db = new db();
        require_once 'main.class.php';
            $this->main = new main();
        require_once 'student.class.php';
            $this->student_object_array = $this->constructStudentObjects();
    }
    function getStudentsAndHoursArray() {
        $localCopyStudent = $this->student_object_array;
        $hoursAndStudents = array();
        for ($i=0; $i<count($localCopyStudent); $i++) {
            $working_Student = $localCopyStudent[$i];
            $student_id = $working_Student->getID();
            $student_name = $working_Student->getName();
            $student_total_seconds = $working_Student->getTotalTimeWorked();
            $hoursAndStudents[$i] = array('studentID' => $student_id, 'studentName' => $student_name, 'studentTime' => $student_total_seconds);
        }
        return $hoursAndStudents;
    }
    function sortStudentsAndHoursArray_HighScores() {
        $allStudentsAndTimes = $this->getStudentsAndHoursArray();
        foreach ($allStudentsAndTimes as $key => $row) {
            $student_name[$key] = $row['studentID'];
            $student_id[$key] = $row['studentName'];  
            $total_seconds[$key] = $row['studentTime'];        
        }
        array_multisort($total_seconds, SORT_DESC, $student_id, SORT_ASC, $student_name, SORT_ASC, $allStudentsAndTimes);
        return $allStudentsAndTimes;
    }
    
    function constructStudentObjects() {
        $students_array = $this->db->getStudents();
        $arrayStudentObjects = array();
        for ($i=0; $i<count($students_array); $i++) {
            $student_id = $students_array[$i]['student_id'];
            $tempStudent = new student($student_id);
            $arrayStudentObjects[$i] = $tempStudent;
        }
        return $arrayStudentObjects;
 
    }
    
}
?>
