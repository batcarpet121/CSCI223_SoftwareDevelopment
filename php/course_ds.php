<?php
require('../data/course.php');

class course_ds extends course
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function selectSingle($key)
    {
        $qry = 'SELECT * FROM Course WHERE Course.course_title = ?';
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

    public function insert($values)
    {
        if($values != null){
            $title = $values;
        }
        
        $qry = 'INSERT INTO course VALUES ($title)';

        $this->conn->query($qry);
    }

    public function update($values)
    {
        if($values != null){
            $title = $values;
        }
        
        $qry = 'UPDATE course SET course_title = ($title) WHERE course_id = $id';

        $this->conn->query($qry);
    }
}