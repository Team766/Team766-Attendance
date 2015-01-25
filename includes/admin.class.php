<?php

/*** *** *** *** *** ***
 * @package Team766-Attendance
 * @file    admin.class.php
 * @start   Jun 29, 2014
 * @author  pjztam
 * @link    Attendance.team766.com
 *** *** *** *** *** *** */
class admin
{
    var $db;
    var $main;
    var $student_object_array;

    function __construct()
    {
        require_once 'db.class.php';
        $this->db = new db();
        require_once 'main.class.php';
        $this->main = new main();
        require_once 'student.class.php';
        $this->student_object_array = $this->constructStudentObjects();
        $this->cacheToDatabase();
    }

    function getStudentsAndHoursArray()
    {
        $localCopyStudent = $this->student_object_array;
        $hoursAndStudents = array();
        for ($i = 0; $i < count($localCopyStudent); $i++) {
            $working_Student = $localCopyStudent[$i];
            $student_id = $working_Student->getID();
            $student_name = $working_Student->getName();
            $student_total_seconds = $working_Student->getTotalTimeWorked();
            $hoursAndStudents[$i] = array('studentID' => $student_id, 'studentName' => $student_name, 'studentTime' => $student_total_seconds);
        }
        //stuff
        return $hoursAndStudents;
    }

    function sortStudentsAndHoursArray($sortType)
    {
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
                array_multisort($student_name, SORT_ASC, $total_seconds, SORT_DESC, $student_id, SORT_ASC, $allStudentsAndTimes);
                break;
        }

        return $allStudentsAndTimes;
    }

    function constructStudentObjects()
    {
        $students_array = $this->db->getStudents();
        $arrayStudentObjects = array();
        for ($i = 0; $i < count($students_array); $i++) {
            $student_id = $students_array[$i]['student_id'];
            $tempStudent = new student($student_id);
            $arrayStudentObjects[$i] = $tempStudent;
        }
        return $arrayStudentObjects;

    }

    function getHoursFromSeconds($seconds)
    {
        $hours = floor($seconds / 3600);
        $seconds = $seconds - (3600 * $hours);
        $minutes = floor($seconds / 60);
        $seconds = $seconds - (60 * $minutes);
        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }
        if ($seconds < 10) {
            $seconds = '0' . $seconds;
        }
        return '' . $hours . ':' . $minutes . ':' . $seconds;
    }

    function returnSortPeopleHoursDescend()
    {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleHoursDescend');
        $outputTable = '';
        $outputTable .= '<div id="sortPeopleHoursDescendTitle"><h1 class="page-header">Student List - Sort Hours</h1></div>
          <div id="sortPeopleHoursDescend" class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key => $row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $key += 1;
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

    function returnSortPeopleIDDescend()
    {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleIDDescend');
        $outputTable = '';
        $outputTable .= '<div id="sortPeopleIDDescendTitle"><h1 class="page-header">Student List - Sort ID</h1></div>
          <div id="sortPeopleIDDescend" class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key => $row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $key += 1;
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

    function returnSortPeopleNameDescend()
    {
        $people_array = $this->sortStudentsAndHoursArray('sortPeopleNameDescend');
        $outputTable = '';
        $outputTable .= '<div id="sortPeopleNameDescendTitle"><h1 class="page-header">Student List - Sort Name</h1></div>
          <div id="sortPeopleNameDescend" class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                  <th>Hours</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($people_array as $key => $row) {
            $timeWorkedHours = $this->getHoursFromSeconds($row['studentTime']);
            $key += 1;
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

    function returnClockedInStudents()
    {
        $main = new main();
        $db = new db();
        $allStudents = $db->getStudents();
        $studentsHere = array();
        foreach ($allStudents as $key => $row) {
            if ($main->clockInOrOut($row['student_id']) == "in") {
                array_push($studentsHere, array('student_id' => $row['student_id'], 'student_name' => $row['student_name']));
            }
        }

        $outputTable = '';
        $outputTable .= '<div id="clockedInStudentsTitle"><h1 class="page-header">Students Present - Sort Name</h1></div>
          <div id="clockedInStudents" class="table-responsive">
            <table class="table table-striped"><thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Student ID</th>
                </tr>
              </thead>
              <tbody>';
        foreach ($studentsHere as $key => $row) {
            $key += 1;
            $outputTable .= '<tr>
                    <td>' . $key . '</td>
                    <td>' . $row['student_name'] . '</td>
                    <td>' . $row['student_id'] . '</td>
                </tr>';
        }
        $outputTable .= '</tbody>
            </table>
            </div>';
        return $outputTable;
    }
    function cacheToDatabase() {
        $datetime = $this->main->currentDateTime()->format('Y-m-d H:i:s');
        $this->db->enCacheStudentList($datetime, 'sortPeopleHoursDescend', $this->returnSortPeopleHoursDescend());
        $this->db->enCacheStudentList($datetime, 'sortPeopleIDDescend', $this->returnSortPeopleIDDescend());
        $this->db->enCacheStudentList($datetime, 'sortPeopleNameDescend', $this->returnSortPeopleNameDescend());
        $this->db->enCacheStudentList($datetime, 'membersInAttendance', $this->returnClockedInStudents());
    }
}

?>
