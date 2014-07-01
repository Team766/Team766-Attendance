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
        $pdo_db = $this->constructPDO();
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
        $pdo_db = $this->constructPDO();
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
        $pdo_db = $this->constructPDO();
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
    
    function addHours($student_id, $time_worked, $date) {
        try {
        $pdo_db = $this->constructPDO();
        $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "hours (student_id, date, time_worked) VALUES (:student_id, :date, :time_worked)";
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time_worked', $time_worked);
        $stmt->execute();
        $stmt = null;
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    function doHoursExist($student_id, $time_worked, $date) {
        
        
        try {
        $pdo_db = $this->constructPDO();
        $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'hours WHERE student_id =:student_id AND date =:date';
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $fetch_array = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt = null;
      
        if (!isset($fetch_array)) {
            return false;
        }
        else if ($fetch_array['time_worked'] == $time_worked) {
            return true;
        }
        else if ($fetch_array['time_worked'] != $time_worked) {
            $this->modifyHours($student_id, $time_worked, $date);
            return true;
        }
        return false;
        
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
        
    }
    function modifyHours($student_id, $time_worked, $date) {
        try {
        $pdo_db = $this->constructPDO();
        $stmt_to_prepare = "UPDATE " . $this->getConfig()['mysql_db_table_prefix'] . "hours SET time_worked=:time_worked WHERE date=:date AND student_id=:student_id";
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':time_worked', $time_worked);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':student_id', $student_id);
        $stmt->execute();
        $stmt = null;
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
        
    }
    function getStudentCheckIns($student_id_number) {
        
        try {
        $pdo_db = $this->constructPDO();
        $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'attendance WHERE student_id =:student_id_from_method';
        $stmt = $pdo_db->prepare($stmt_to_prepare);
        $stmt->bindParam(':student_id_from_method', $student_id_number);
        $stmt->execute();
        $fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
            return $fetch_array;
      
        }catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
        
    }
    function constructPDO() {
        $config_array = include 'config.php';
        $dsn = 'mysql:dbname=' . $config_array['mysql_db'] . ';host=' . $config_array['mysql_host'];
        $pdo_object = new PDO($dsn, $config_array['mysql_db'], $config_array['mysql_password']);
        return $pdo_object;
    }
    function getConfig() {
        $config_array = include 'config.php';
        return $config_array;
    }
}