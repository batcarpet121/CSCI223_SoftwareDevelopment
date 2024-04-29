<?php
require('../php/courseOffering.php');
require_once("../utils/db_utils.php");

class Course_Offering_ds extends Course_Offering{
    public $conn;

    public function __construct($conn)
    {
        
        $this->conn = db_connect();
        
        if ($this->conn) {
            // echo "Database connection successful.<br>";
        } else {
            echo "Database connection failed: " . $this->conn->connect_error . "<br>";
        }
    
    }

    public function selectSingle($key){
        $qry = 'SELECT * FROM CourseOffering WHERE CourseOffering.course_offering_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result(
            $this->course_offering_id, 
            $this->course_id, 
            $this->course_term, 
            $this->course_year);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->course_offering_id);
            array_push($row, $this->course_id);
            array_push($row, $this->course_term);
            array_push($row, $this->course_year);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }
    }

    public function selectAll($sel_list){
        if ($sel_list == null) {
            $sel_list = '*';
        } else {
            ;
        }

        $qry = 'SELECT '. $sel_list.' FROM CourseOffering';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $this->course_offering_id, 
            $this->course_id, 
            $this->course_term, 
            $this->course_year);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->course_offering_id);
            array_push($row, $this->course_id);
            array_push($row, $this->course_term);
            array_push($row, $this->course_year);

            $rowCount++;

            array_push($returnSet, $row);
        }
        if ($rowCount > 0) {
            return $returnSet;
        } else {
            return null;
        }
    }

    public function insert($course_id, $course_term, $course_year) {
        $qry = 'INSERT INTO CourseOffering (course_id, course_term, course_year) VALUES (?, ?, ?)';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('isi', $course_id, $course_term, $course_year);
        if($stmt->execute()){
            return true;
        }
        else{
            if($stmt->errno == 1452){
                echo "There is no foriegn key for course Idwith that id";
            }
            return false;
            
        }
    }

    public function update($value, $field, $id) {
        $qry = 'UPDATE CourseOffering SET ' . $field . ' = ? WHERE course_offering_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('si', $value, $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $qry = 'DELETE FROM CourseOffering WHERE course_offering_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

}
