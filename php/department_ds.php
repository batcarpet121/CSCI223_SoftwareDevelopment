<?php

require('../php/department.php');
/* Ignore any conn errors as steve will make the connection file
    Make sure to adjust the current code based on the textbook table
*/
require('../utils/db_utils.php');

class Department_ds extends Department {

    public $conn;

    public function __construct()
    {
        $this->conn = db_connect();
        if ($this->conn) {
            echo "Database connection successful.<br>";
        } else {
            echo "Database connection failed: " . $this->conn->connect_error . "<br>";
        }
        
    }

    public function selectSingle($key) {
        if ($key == null) {
            return false;
        }
        $qry = 'SELECT * FROM Dept WHERE Dept_id = ?';
        // For testing uncomment any commented code below --
        // echo $qry;
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        // $stmt->store_result();

        if ($stmt->num_rows > 1) {
            echo "Rows affected: " . $stmt->num_rows . "<br>";
            return false;
        } else {
            echo "Rows affected: " . $stmt->num_rows . "<br>";
        }


        $stmt->bind_result(
            $this->dept_id,
            $this->dept_name);
            echo '3';
        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->dept_id);
            array_push($row, $this->dept_name);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }

    }
    
    public function selectAll($sel_list) {
            if ($sel_list == null) {
                $sel_list = '*';
            } else {
                $sel_col = explode(',', $sel_list);
                $sel_list = implode(", ", $sel_col);
            }
        
            $qry = 'SELECT ' . $sel_list . ' FROM Dept';
            $stmt = $this->conn->prepare($qry);
            $stmt->execute();
            echo "Rows affected: " . $stmt->num_rows . "<br>";
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

        $stmt->bind_param('s', $values['dept_name']);
        $success = $stmt->execute();
        echo "Rows affected: " . $stmt->affected_rows . "<br>";

        if (!$success) {
            echo "Insert failed: " . $stmt->error;
        } else {
            echo "Woo insert worked!";
        }
    }

    public function update($row) {
        if ($row == null) {
            return false;
        }

        $qry = 'UPDATE Dept SET dept_name = (?) WHERE dept_id = (?)';

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('si', $row['dept_name'], $row['dept_id']);

        $success = $stmt->execute();
        echo "Rows affected: " . $stmt->affected_rows . "<br>";
        if (!$success) {
            echo "Update failed: " . $stmt->error;
        } else {
            echo "Woo Update worked!";
        }
    }

    
    public function delete($id){
        if ($id == null) {
            return false;
        }

        $qry = 'DELETE FROM Dept WHERE Dept_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('i', $id);

        $success = $stmt->execute();
        echo "Rows affected: " . $stmt->affected_rows . "<br>";
        if (!$success) {
            echo "Delete failed: " . $stmt->error;
        } else {
            echo 'Woo delete worked!';
        }
    }

}


?>