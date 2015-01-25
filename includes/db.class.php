<?php

/* * * *** *** *** *** ***
 * @package Team766-Attendance
 * @file    db.class.php 
 * @start   Jun 27, 2014
 * @author  pjztam
 * @link    Attendance.team766.com
 * ** *** *** *** *** *** */

/**
 * Contains all functions which interact with the MySQL database
 */
class db {

    function addAttendEvent($student_id_number, $current_date, $active, $hash) {


        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "attendance (student_id, student_attendance, active, hash) VALUES (:student_id_number, :student_date_attended, :active_bool, :hash_sha256)";
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->bindParam(':student_id_number', $student_id_number);
            $stmt->bindParam(':student_date_attended', $current_date);
            $stmt->bindParam(':active_bool', $active);
            $stmt->bindParam(':hash_sha256', $hash);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }

    function enrollStudent($student_name, $student_id_number, $student_email, $student_register_date) {


        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "members (student_id, student_name, email, student_date_registered) VALUES (:student_id_number, :student_name, :student_email, :student_date_registered)";
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->bindParam(':student_id_number', $student_id_number);
            $stmt->bindParam(':student_name', $student_name);
            $stmt->bindParam(':student_date_registered', $student_register_date);
            $stmt->bindParam(':student_email', $student_email);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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

            if ($fetch_array == false) {
                return false;
            } else if ($fetch_array['time_worked'] == $time_worked) {
                return true;
            } else if ($fetch_array['time_worked'] != $time_worked) {
                $this->modifyHours($student_id, $time_worked, $date);
                return true;
            }
            return false;
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
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
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }

    function getStudents() {
        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'members';
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->execute();
            $fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $fetch_array;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }

    function getAttendance() {
        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'attendance';
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->execute();
            $fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $fetch_array;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    function getHours() {
        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'hours';
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->execute();
            $fetch_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt = null;
            return $fetch_array;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    function checkEmailExist($student_email) {

        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = 'SELECT * FROM ' . $this->getConfig()['mysql_db_table_prefix'] . 'members WHERE email =:student_email_from_method';
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->bindParam(':student_email_from_method', $student_email);
            $stmt->execute();
            $fetch_array = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt = null;
            return $fetch_array['student_name'];
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
    function enCacheStudentList($datetime, $name, $data) {
        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "cache_studentlist (date, name, data) VALUES (:date, :name, :data)";
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->bindParam(':date', $datetime);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
    
    function setCacheControl(){
        try {
            $pdo_db = $this->constructPDO();
            $stmt_to_prepare = "INSERT INTO " . $this->getConfig()['mysql_db_table_prefix'] . "cache_studentlist (date, name, data) VALUES (:date, :name, :data)";
            $stmt = $pdo_db->prepare($stmt_to_prepare);
            $stmt->bindParam(':date', $datetime);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':data', $data);
            $stmt->execute();
            $stmt = null;
        } catch (PDOException $e) {
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
