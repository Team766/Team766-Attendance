<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendence
 * @file    db.class.php 
 * @start   Jun 27, 2014
 * @author  pjztam
 * @link    attendence.team766.com
 * ** *** *** *** *** *** */

/**
 * Contains all functions which interact with the MySQL database
 */
class  db {
    function addAttendEvent($student_id_number, $current_date) {
        
        
         try {
        $pdo_db = new PDO("mysql:dbname=frc-attend;host=localhost", "frc-attend", "RvpyKc9Gsgh35H9p");
        $stmt = $pdo_db->prepare("INSERT INTO ptolemy_attendance (student_id, student_attendance) VALUES (:student_id_number, :student_date_attended)");
        $stmt->bindParam(':student_id_number', $student_id_number);
        $stmt->bindParam(':student_date_attended', $current_date);
        $stmt->execute();
        $stmt = null;
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
        
    }
    function enrollStudent($student_name, $student_id_number) {
           
    }

    
    function constructPDOconnect(){
        $config_array = include 'config.php';
        $dsn = '"mysql:dbname=' . $config_array['mysql_db'] . ';host=' . $config_array['mysql_host'] . '"';
        $complete_statement = $dsn . ', "' . $config_array['mysql_username'] . '", "' . $config_array['mysql_password'] . '"';
        return $complete_statement;
    }
    function getTablePrefix(){
        $config_array = include 'config.php';
        return $config_array['mysql_db_table_prefix'];
    }
}
