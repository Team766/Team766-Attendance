<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    sortPeopleHoursAscend.php 
* @start   Jul 2, 2014
* @author  pjztam
* @link    attendance.team766.com
*** *** *** *** *** *** */

require_once 'includes/admin.class.php';
        $admin = new admin();
        $people_array = $admin->sortStudentsAndHoursArray_HighScores();
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
            $timeWorkedHours = $admin->getHoursFromSeconds($row['studentTime']);
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
        echo $outputTable;
        
        ?>