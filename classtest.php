<?php

/*** *** *** *** *** ***
* @package Team766-Attendance
* @file    classtest.php 
* @start   Jun 27, 2014
* @author  pjztam
* @link    Attendance.team766.com
*** *** *** *** *** *** */
if (1==1) {
    

if (1==0) {
    $config_array = include 'config.php';
}

if (1==0) {
    require_once 'includes/db.class.php';
    $db_class = new db();
    echo $db_class->constructPDOconnect();
}

if (1==0) {
    xdebug_break();
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $date = $main->currentDateTime()->format('Y-m-d H:i:s');
    $hash = $main->hashDBHours($date);
    $db->addAttendEvent('769569', $date, 1, $hash );
    

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $db->enrollStudent('Patrick Tam', 769569, '2014-07-12 13:05:38');

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    echo '' . $db->getStudent(769569);

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    echo '' . $main->isStudentEnrolled(769569);

}

if (1==0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $main = new main();
    $db = new db();
    $mysql_date = date( 'Y-m-d');
    $db->addHours(769569, 200, $mysql_date);
    

}

if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(813165);
    echo $student->getName() . '<br>';
    echo $student->getID();
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->getTotalHoursWorked();
    
}
if (1==0) {
    $now = new DateTime('America/Los_Angeles');
    echo var_dump($now);
}
if (1==0) {
    require_once 'includes/main.class.php';
    $main = new main();
    echo '' . $main->validateStudentIDs(769569);
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    echo var_dump($student->createDateArray());
}


if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->removeNonCheckIns();
    echo var_dump($student->allCheckInsArray);
    
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->createScrubbedDateArray();
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    $db->addAttendEvent(194326, '2014-01-08 17:01:01');
    $db->addAttendEvent(194326, '2014-01-08 21:32:26');
    $db->addAttendEvent(194326, '2014-01-10 14:25:16');
    $db->addAttendEvent(194326, '2014-01-10 15:13:59');
    $db->addAttendEvent(194326, '2014-01-10 17:46:51');
    $db->addAttendEvent(194326, '2014-01-11 09:54:13');
    $db->addAttendEvent(194326, '2014-01-11 17:46:32');
    $db->addAttendEvent(194326, '2014-01-15 14:21:23');
    $db->addAttendEvent(194326, '2014-01-15 15:15:01');
    $db->addAttendEvent(194326, '2014-01-15 18:34:25');
    $db->addAttendEvent(194326, '2014-01-15 19:46:24');
    $db->addAttendEvent(194326, '2014-01-17 17:23:49');
    $db->addAttendEvent(194326, '2014-01-17 21:54:57');
    $db->addAttendEvent(194326, '2014-01-18 09:23:57');
    $db->addAttendEvent(194326, '2014-01-18 17:01:06');
    $db->addAttendEvent(194326, '2014-01-22 14:24:05');
    $db->addAttendEvent(194326, '2014-01-22 15:15:15');
    $db->addAttendEvent(194326, '2014-01-22 18:15:35');
    $db->addAttendEvent(194326, '2014-01-24 17:15:09');
    $db->addAttendEvent(194326, '2014-01-24 21:08:16');
    $db->addAttendEvent(194326, '2014-01-25 09:58:01');
    $db->addAttendEvent(194326, '2014-01-25 16:14:35');
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    echo var_dump($student->getSumTimeWorkedArray($student->createScrubbedDateArray()));
    
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    $student->addHoursToDB();
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    $db->modifyHours(194326, '10:10:10', '2014-01-24');
}
if (1==0) {
    require_once 'includes/db.class.php';
    $db = new db();
    echo '' . $db->doHoursExist(194326, '11:11:11', '2014-01-25');
}
if (1==0) {
     require_once 'includes/student.class.php';
    $student = new student(194326);
    echo $student->getHoursWorkedOnDate('2014-01-25');
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(194326);
    echo var_dump($student);
    echo $student->getTotalHoursWorked();
}
}
if (1==0) {
    require_once 'includes/admin.class.php';
    $admin = new admin();
    echo var_dump($admin);
}
if (1==0) {
    require_once 'includes/student.class.php';
    $student = new student(135642);
    echo var_dump($student);
}
if (1==0) {
    require_once 'includes/admin.class.php';
    $admin = new admin();
    echo var_dump($admin->sortStudentsAndHoursArray_HighScores());
}
if (1==0) {
    require_once 'includes/admin.class.php';
    $admin = new admin();
    echo $admin->returnSortPeopleNameDescend();
}
if (1==0) {
     require_once 'includes/main.class.php';
    $main = new main();
    echo $main->currentDateTime()->format('Y-m-d H:i:s');
}
if (1==0) {
    require_once 'includes/main.class.php';
    $main = new main();
    echo $main->clockInOrOut('769569');
}
if (1==0) {
    require_once 'includes/main.class.php';
    $main = new main();
    echo $main->hashDBHours('2014-07-12 13:05:38');
}
if (1 == 0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $mysql = new db();
    $main = new main();

    $fetch_array = $mysql->getAttendance();



    for ($i = 0; $i < count($fetch_array); $i++) {
        $id = $fetch_array[$i]['id'];
        $hash = $main->hashDBHours($fetch_array[$i]['student_attendance']);
        $id_replace = $i + 1;
        $active = 1;

        $pdo_db = $mysql->constructPDO();
        $stmt_to_prepare = "UPDATE " . $mysql->getConfig()['mysql_db_table_prefix'] . "attendance SET hash=:hash_stuff, id=:id_replace, active=:active_stuff WHERE id=:id_stuff";
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        
        $stmt->bindParam(':hash_stuff', $hash);
        $stmt->bindParam(':id_stuff', $id);
        $stmt->bindParam(':id_replace', $id_replace);
        $stmt->bindParam(':active_stuff', $active);



        $stmt->execute();
        $stmt = null;
    }

}

if (1 == 0) {
    require_once 'includes/db.class.php';
    require_once 'includes/main.class.php';
    $mysql = new db();
    $main = new main();

    $fetch_array = $mysql->getStudents();



    for ($i = 0; $i < count($fetch_array); $i++) {
        $id = $fetch_array[$i]['id'];
        $id_replace = $i + 1;
        $pdo_db = $mysql->constructPDO();
        $stmt_to_prepare = "UPDATE " . $mysql->getConfig()['mysql_db_table_prefix'] . "members SET id=:id_replace WHERE id=:id_stuff";
        $stmt = $pdo_db->prepare($stmt_to_prepare);

        $stmt->bindParam(':id_stuff', $id);
        $stmt->bindParam(':id_replace', $id_replace);




        $stmt->execute();
        $stmt = null;
    }

}
if (1==1) {
    require_once 'includes/student.class.php';

    $student = new student('769569');
    
    $date_array = $student->createDateArray();

    echo ('normal');
    var_dump($date_array);
    
    for ($i = 0; $i < count($date_array); $i++) {
        if ($date_array[$i]['active'] == false) {
            array_splice($date_array, $i, 1);
        }
    }
        
    echo ('removed');
    var_dump($date_array);
}
?>

