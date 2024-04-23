<?php

require('../php/department.php');
/* Ignore any conn errors as steve will make the connection file
    Make sure to adjust the current code based on the textbook table
*/

class Department_ds extends Department {

    public $conn;

    public function __construct()
    {
        echo '10';
        $this->conn = db_connect();
        echo '11';
        if ($this->conn) {
            echo "Database connection successful.<br>";
        } else {
            echo "Database connection failed: " . $this->conn->connect_error . "<br>";
        }
        
    }

    public function selectSingle($key) {
        echo '1';
        if ($key == null) {
            return false;
        }
        echo '2';
        $qry = 'SELECT * FROM Dept WHERE Dept_id = ?';
        // For testing uncomment any commented code below --
        // echo $qry;
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        // $stmt->store_result();
        $stmt->bind_result(
            $this->dept_id,
            $this->dept_name);
            echo '3';
        $row = array();
        if ($stmt->fetch()) {
            array_push($row, $this->dept_id);
            array_push($row, $this->dept_name);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }

    }

    public function selectAll($sel_list){
        if ($sel_list == null) {
            $sel_list ='*';
        } else {
            $sel_col = explode(',', $sel_list);
            for ($i=0; $i < count($sel_col); $i++) {
                $sel_col[$i] = "'" . $sel_col[$i] . "'";
            }

            $sel_list = implode(", ", $sel_col);

        }

        $qry = 'SELECT ' . $sel_list.' FROM Dept';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $this->dept_id,
            $this->dept_name);

            $returnSet = array();
            $rowCount = 0;
            while ($stmt->fetch()) {
                $row = array();
    
                array_push($row, $this->dept_id);
                array_push($row, $this->dept_name);
    
                $rowCount++;
    
                array_push($returnSet, $row);
            }
            if ($rowCount > 0) {
                return $returnSet;
            } else {
                return null;
            }
    
        }
        
    public function insert($values) {
        if (!is_array($values)){
            return false;
        }
        
        $qry = 'INSERT INTO Dept (dept_name) VALUES (?)';
        $stmt = $this->conn->prepare($qry);

        $stmt->bind_param(
            's', $values['dept_name']);
        $success = $stmt->execute();

        // if (!$success) {
        //     echo "Insert failed: " . $stmt->error;
        // }
    }

    public function update($row) {
        if ($row == null) {
            return false;
        }

        $qry = 'UPDATE Dept SET dept_name = (?) WHERE dept_id = ' . $row['dept_id'];

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $row['dept_name']);

        $success = $stmt->execute();
        // if (!$success) {
        //     echo "Update failed: " . $stmt->error;
        // }
    }

    
    public function delete($id){
        if ($id == null) {
            return false;
        }

        $qry = 'DELETE FROM Dept WHERE Dept_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('i', $id);

        $success = $stmt->execute();
        // if (!$success) {
        //     echo "Delete failed: " . $stmt->error;
        // }
    }

}


?>