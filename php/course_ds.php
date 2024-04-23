<?php
require('../php/course.php');
require("../utils/db_utils.php");

class course_ds extends course
{
    public $conn;
    

    public function __construct($conn)
    {
        $conn = db_connect();
        $this->conn = $conn;
        
        if ($conn->connect_error == null) {
            echo "success! <br>";
        } else {
            echo "FAILED! <br> " . $conn->connect_error;
        }
    
    }

    public function selectSingle($key)
    {
        $qry = 'SELECT * FROM Course WHERE Course.course_id = ?';
        // echo $qry;
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        //  $stmt->store_result();
        $stmt->bind_result($this->course_id,$this->dept_id,$this->course_title);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->course_id);
            array_push($row, $this->dept_id);
            array_push($row, $this->course_title);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }
    }

    public function selectAll($sel_list)
    {
        if ($sel_list == null) {
            $sel_list = '*';
        } else {
            ;
            // ToDo - handle specific cols
        // expect csv string in arg. explode into arr
        }

        $qry = 'SELECT '. $sel_list.' FROM Course';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->course_id,$this->dept_id,$this->course_title);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->course_id);
            array_push($row, $this->dept_id);
            array_push($row, $this->course_title);

            $rowCount++;

            array_push($returnSet, $row);
        }
        if ($rowCount > 0) {
            return $returnSet;
        } else {
            return null;
        }
    }

    public function insertInfo($dept_id, $course_title)
    {
        
        $qry = 'INSERT INTO Course (dept_id, course_title) VALUES (?, ?)';
        
        
        $stmt = $this->conn->prepare($qry);
       
        
        $stmt->bind_param('is', $dept_id, $course_title);
    
        
        if($stmt->execute()){
            return true;
        }
        else{
            echo $stmt->errno;
            return $stmt->errno;
            
        }
    }

    public function update($course_id, $dept_id, $course_title)
    {
        $qry = 'UPDATE Course SET dept_id = ?, course_title = ? WHERE course_id = ?';

        $stmt = $this->conn->prepare($qry);
        //$stmt->bind_param('iis',$course_id, $dept_id, $course_title);

        if ($stmt->execute()) {
            echo $qry;
        }else{
            return false;
        }
    }
}