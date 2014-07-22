<?php 

/* * * *** *** *** *** ***
 * @package Team766-Attendance
 * @file    name.class.php 
 * @start   Jul 20, 2014
 * @author  pjztam
 * @link    attendance.team766.com
 * ** *** *** *** *** *** */

/**
 * Description of name
 *
 * @author pjztam
 */
class name {

    var $student_name;
    var $student_id;
    var $commitment;
    var $meetingsArray;
    var $meetingLengthArray;
    var $syntheticCheckIns;

    function __construct() {
        $this->student_id = $this->generateID();
        $this->commitment = $this->generateCommitment();
        $this->student_name = $this->generateName();
        $this->getMeetingsAndLengths();
        $this->generateSyntheticCheckIns();
    }

    function generateID() {
        $bottom = 750000;
        $top = 801000;
        $random = rand($bottom, $top);
        return $random;
    }

    function generateCommitment() {
        $lower = 0.50;
        $upper = 1.26;
        $rand = rand($lower * 10, $upper * 10) / 10;
        return $rand;
    }

    function generateName() {
        $name = '' . $this->getFirstName() . ' ' . $this->getLastName();
        return $name;
    }

    function getFirstName() {
        $file_array = file('names/dist.1000.male.first.txt');
        $nameArray = array();
        for ($i = 0; $i < count($file_array); $i++) {
            $nameArray[$i] = $this->convertToArray($file_array[$i]);
        }
        $randBottom = 0;
        $randTop = 89.127;
        $randomFirstName = '';
        $randomPercentage = rand($randBottom * 100, $randTop * 100) / 100;
        for ($i = 0; $i < count($nameArray); $i++) {

            if ($nameArray[$i][2] <= $randomPercentage) {
                $randomFirstName = $nameArray[$i][0];
                continue;
            }
        }
        if ($randomFirstName == '') {
            $randomFirstName = $this->getFirstName();
        }
        return $this->convertToLowerCase($randomFirstName);
    }

    function getLastName() {
        $file_array = file('names/dist.1000.last.txt');
        $nameArray = array();
        for ($i = 0; $i < count($file_array); $i++) {
            $nameArray[$i] = $this->convertToArray($file_array[$i]);
        }
        $randBottom = 0;
        $randTop = 43.388;
        $randomLastName = '';
        $randomPercentage = rand($randBottom * 100, $randTop * 100) / 100;
        for ($i = 0; $i < count($nameArray); $i++) {

            if ($nameArray[$i][2] <= $randomPercentage) {
                $randomLastName = $nameArray[$i][0];
                continue;
            }
        }
        if ($randomLastName == '') {
            $randomLastName = $this->getLastName();
        }
        return $this->convertToLowerCase($randomLastName);
    }

    function convertToArray($lineFromFile) {
        $splitString = explode(' ', $lineFromFile);
        for ($i = 0; $i < count($splitString); $i++) {
            if (strlen($splitString[$i]) == 0) {
                array_splice($splitString, $i, 1);
                $i--;
            }
        }
        return $splitString;
    }

    function convertToLowerCase($stringName) {
        $lower = strtolower(substr($stringName, 1));
        $finalName = '' . $stringName[0] . $lower;
        return $finalName;
    }

    function getMeetingsAndLengths() {
        $timezone = new DateTimeZone('America/Los_Angeles');
        $file_array = file('names/meetings.2014.csv');
        $meetings_array = array();
        $meeting_length_array = array();
        for ($i = 0; $i < count($file_array); $i++) {
            $inOutArray = explode(',', $file_array[$i]);
            $inTime = new DateTime($inOutArray[0], $timezone);
            $outTime = new DateTime($inOutArray[1], $timezone);
            $meetings_array[$i] = array('in' => $inTime, 'out' => $outTime);
            $timeDifference = $inTime->diff($outTime);
            $dateZero = new DateTime('@0');
            $dateZero->add($timeDifference);
            $meeting_length_array[$i] = array('full' => $dateZero->getTimestamp(), 'partial' => null);
        }


        for ($i = 0; $i < count($meeting_length_array); $i++) {
            $percentageMeeting = abs($this->randomNormalDistribution() / 7.5 + $this->commitment);
            $modifiedTime = $meeting_length_array[$i]['full'] * $percentageMeeting;
            $meeting_length_array[$i]['partial'] = (int) round($modifiedTime);
        }

        $this->meetingLengthArray = $meeting_length_array;
        $this->meetingsArray = $meetings_array;
    }

    function generateSyntheticCheckIns() {
        $syntheticCheckIns = array();
        $meetings_array = $this->meetingsArray;
        $meeting_length_array = $this->meetingLengthArray;
        for ($i = 0; $i < count($meetings_array); $i++) {
            if ($meeting_length_array[$i]['partial'] < $meeting_length_array[$i]['full']) {
                $timeNotWorked = (int) $meeting_length_array[$i]['full'] - (int) $meeting_length_array[$i]['partial'];
                $timeWorked = $meeting_length_array[$i]['partial'];
                $startTime = round(abs($this->randomNormalDistribution() / (4 / $timeNotWorked) + $timeNotWorked / 2));
                $synthIn = clone($meetings_array[$i]['in']);
                $synthIn->add($this->secondsToDateInterval($startTime));
                $synthOut = clone($synthIn);
                $synthOut->add($this->secondsToDateInterval($timeWorked));
                $syntheticCheckIns[$i] = array('synthIn' => $synthIn, 'synthOut' => $synthOut);
            } else if ($meeting_length_array[$i]['partial'] > $meeting_length_array[$i]['full']) {
                $timeOverWorked = abs((int) $meeting_length_array[$i]['full'] - (int) $meeting_length_array[$i]['partial']);
                $timeWorked = $meeting_length_array[$i]['partial'];
                $startTime = round(abs($this->randomNormalDistribution() / (4 / $timeOverWorked) + $timeOverWorked / 2));
                $synthIn = clone($meetings_array[$i]['in']);
                $synthIn->sub($this->secondsToDateInterval($startTime));
                $synthOut = clone($synthIn);
                $synthOut->add($this->secondsToDateInterval($timeWorked));
                $syntheticCheckIns[$i] = array('synthIn' => $synthIn, 'synthOut' => $synthOut);
            }
            if (!isset($syntheticCheckIns[$i]['synthIn'])) {
                $meeting_length_array[$i]['partial'] -= 1;
                $this->meetingLengthArray[$i]['partial'] -=1;
                $i--;
            }
        }
        $this->syntheticCheckIns = $syntheticCheckIns;
    }

    function randomNormalDistribution() {
        $rand1 = $this->randomDecimalNoZero();
        $rand2 = $this->randomDecimalNoZero();

        $randFinal = sqrt(-2 * log($rand1));
        $randFinal *= cos(2 * pi() * $rand2);
        return $randFinal;
    }

    function randomDecimalNoZero() {
        $randomNumber = 0;
        while ($randomNumber == 0) {
            $randomNumber = mt_rand(0, 1000) / 1000;
        }
        return $randomNumber;
    }

    function secondsToDateInterval($seconds) {
        $seconds = abs($seconds);
        $dateZero = new DateTime('@0');
        $dateZeroMod = new DateTime('@0');
        $dateZeroMod->setTimestamp($seconds);
        $interval = $dateZero->diff($dateZeroMod);
        return $interval;
    }

    function printMeetingsArray() {
        echo '<table><tr><td>Date</td><td>In</td><td>Out</td><td>Length</td></tr>';
        for ($i = 0; $i < count($this->meetingsArray); $i++) {
            $meetingRow = $this->meetingsArray[$i];
            $meetingLength = $this->meetingLengthArray[$i];
            echo '<tr><td>' . $meetingRow['in']->format('Y-m-d') . '</td><td>' . $meetingRow['in']->format('H-i-s') . '</td><td>' . $meetingRow['out']->format('H-i-s') . '</td><td>' . $meetingLength['full'] . '</td></tr>';
        }
        echo '</table>';
    }

    function printSyntheticCheckIns() {
        $meetings_array = $this->meetingsArray;
        $syntheticMeetingsArray = $this->syntheticCheckIns;
        echo '<table><tr><td>Real In</td><td>Synth In</td><td>Real Out</td><td>Synth Out</td></tr>';
        for ($i = 0; $i < count($meetings_array); $i++) {

            $realIn = $meetings_array[$i]['in']->format('H:i:s');
            $realOut = $meetings_array[$i]['out']->format('H:i:s');
            $synthIn = $syntheticMeetingsArray[$i]['synthIn']->format('H:i:s');
            $synthOut = $syntheticMeetingsArray[$i]['synthOut']->format('H:i:s');
            echo '<tr><td>' . $realIn . '</td><td>' . $synthIn . '</td><td>' . $realOut . '</td><td>' . $synthOut . '</td></tr>';
        }
        echo '</table>';
    }
   

    function addSynthCheckInsToDB() {

        require_once 'includes/db.class.php';
        require_once 'includes/main.class.php';
        $db = new db();
        $main = new main();
        $syntheticCheckIns = $this->syntheticCheckIns;
        $synthCheckInsArray = array();
        $synthCheckInsArray_index = 0;
            for ($i = 0; $i < count($syntheticCheckIns); $i++) {
                
                if (!isset($syntheticCheckIns[$i]['synthIn'])) {
                    die ('wut');
                }
                
                $synthCheckInsArray[$synthCheckInsArray_index] = $syntheticCheckIns[$i]['synthIn'];
                $synthCheckInsArray_index += 1;
                $synthCheckInsArray[$synthCheckInsArray_index] = $syntheticCheckIns[$i]['synthOut'];
                $synthCheckInsArray_index += 1;
                
              
            }
            for ($i = 0; $i < count($synthCheckInsArray); $i++) {


                $datetime = $synthCheckInsArray[$i]->format('Y-m-d H:i:s');
                $hash = $main->hashDBHours($datetime);
                $db->addAttendEvent($this->student_id, $datetime, 1, $hash);
            }
            
       
    }
    function addMemberToDB() {
        require_once 'includes/db.class.php';
        $db = new db();
        $db->enrollStudent($this->student_name, $this->student_id, $this->syntheticCheckIns[0]['synthIn']->format('Y-m-d H:i:s'));
    }

}
