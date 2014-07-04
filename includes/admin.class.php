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
    function sortStudentsAndHoursArray($sortType) {
        $allStudentsAndTimes = $this->getStudentsAndHoursArray();
        foreach ($allStudentsAndTimes as $key => $row) {
            $student_name[$key] = $row['studentID'];
            $student_id[$key] = $row['studentName'];  
            $total_seconds[$key] = $row['studentTime'];        
        }
        switch ($sortType) {
            case 'sortPeopleHoursDescend':
                    array_multisort($total_seconds, SORT_DESC, $student_id, SORT_ASC, $student_name, SORT_ASC, $allStudentsAndTimes);
                break;
            case 'sortPeopleNameDescend':
                    array_multisort($student_id, SORT_ASC, $total_seconds, SORT_DESC, $student_name, SORT_ASC, $allStudentsAndTimes);
                break;
            case 'sortPeopleIDDescend':
                    array_multisort($student_name, SORT_ASC, $total_seconds, SORT_DESC, $student_id, SORT_ASC,  $allStudentsAndTimes);
                break;
        }
        
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
    function getHoursFromSeconds($seconds) {
        $hours = floor($seconds / 3600);
        $seconds = $seconds - ( 3600 * $hours );
        $minutes = floor($seconds / 60);
        $seconds = $seconds - ( 60 * $minutes );
        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }
        if ($seconds < 10) {
            $seconds = '0' . $seconds;
        }
        return '' . $hours . ':' . $minutes . ':' . $seconds;
    }
    function returnSortPeopleHoursDescend() {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleHoursDescend');
        $outputTable = '';
        $outputTable .= '<h2 class="sub-header">Students - Sort Hours Descend</h2>
          <div class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key=>$row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $outputTable .= '<tr>
                    <td>' . $key . '</td>
                    <td>' . $row['studentName'] . '</td>
                    <td>' . $row['studentID'] . '</td>
                    <td>' . $timeWorkedHours . '</td>
                </tr>';
        }
        $outputTable .= '</tbody>
            </table>
            </div>';
        return $outputTable;
    }
     function returnSortPeopleIDDescend() {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleIDDescend');
        $outputTable = '';
        $outputTable .= '<h2 class="sub-header">Students - Sort ID Descend</h2>
          <div class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key=>$row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $outputTable .= '<tr>
                    <td>' . $key . '</td>
                    <td>' . $row['studentName'] . '</td>
                    <td>' . $row['studentID'] . '</td>
                    <td>' . $timeWorkedHours . '</td>
                </tr>';
        }
        $outputTable .= '</tbody>
            </table>
            </div>';
        return $outputTable;
    }
     function returnSortPeopleNameDescend() {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleNameDescend');
        $outputTable = '';
        $outputTable .= '<h2 class="sub-header">Students - Sort Names Descend</h2>
          <div class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key=>$row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $outputTable .= '<tr>
                    <td>' . $key . '</td>
                    <td>' . $row['studentName'] . '</td>
                    <td>' . $row['studentID'] . '</td>
                    <td>' . $timeWorkedHours . '</td>
                </tr>';
        }
        $outputTable .= '</tbody>
            </table>
            </div>';
        return $outputTable;
    }
    
}
?>
