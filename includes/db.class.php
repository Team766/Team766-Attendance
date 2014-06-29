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
        $pdo_db = new PDO($this->constructPDODSN(), $this->getConfig()['mysql_db'], $this->getConfig()['mysql_password']);
        $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "attendance (student_id, student_attendance) VALUES (:student_id_number, :student_date_attended)";
        $stmt = $pdo_db->prepare($stmt_to_prepare);
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
           
        
        try {
        $pdo_db = new PDO($this->constructPDODSN(), $this->getConfig()['mysql_db'], $this->getConfig()['mysql_password']);
        $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "members (student_id, student_name) VALUES (:student_id_number, :student_name)";
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':student_id_number', $student_id_number);
        $stmt->bindParam(':student_name', $student_name);
        $stmt->execute();
        $stmt = null;
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
    }

    function getStudent($student_id_number) {
        
        try {
        $pdo_db = new PDO($this->constructPDODSN(), $this->getConfig()['mysql_db'], $this->getConfig()['mysql_password']);
        $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'members WHERE student_id =:student_id_from_method';
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':student_id_from_method', $student_id_number);
        $stmt->execute();
        $fetch_array = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
            return $fetch_array['student_name'];
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
    function constructPDODSN(){
        $config_array = include 'config.php';
        $dsn = 'mysql:dbname=' . $config_array['mysql_db'] . ';host=' . $config_array['mysql_host'];
        return '' . $dsn;
    }
    function getConfig() {
        $config_array = include 'config.php';
        return $config_array;
    }

}