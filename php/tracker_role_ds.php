<?php
require('tracker_role.php');
require('../utils/db_utils.php');

class tracker_role_ds extends tracker_role
{
    public $conn;

    public function __construct()
    {
        $this->conn = db_connect();
    }

    public function selectSingle($key)
    {
        $qry = 'SELECT * FROM Tracker_Role WHERE Tracker_Role.role_id = ?';
        // echo $qry;
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        //  $stmt->store_result();
        $stmt->bind_result($this->role_id, $this->role_name);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->role_id);
            array_push($row, $this->role_name);
        }
        if (!empty($row)) {
            return $row;
        } else {
            return null;
        }
    }

    public function selectAll()
    {
        //srr - probably dead code
        // if ($sel_list == null) {
        //     $sel_list = '*';
        // } else {
        //     ;
        //     // ToDo - handle specific cols
        // // expect csv string in arg. explode into arr
        // }

        $qry = 'SELECT * FROM Tracker_Role';
        $stmt = $this->conn->prepare($qry);
        if ($stmt == false){
            echo 'role_ds failed prepare() in selectAll()'.'<br';
        }
        $stmt->execute();
        // $stmt->store_result();
        $stmt->bind_result($this->role_id, $this->role_name);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->role_id);
            array_push($row, $this->role_name);

            $rowCount++;

            array_push($returnSet, $row);
        }
        if ($rowCount > 0) {
            return $returnSet;
        } else {
            return null;
        }
    }

    public function insert($id, $name)
    {
        $qry = "INSERT INTO Tracker_Role VALUES (?,?)";

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('is',$id, $name );
        $stmt->execute();

        return $this->conn->affected_rows;

        // if($stmt->execute()){
        //     return true;
        // }
        // else{
        //     return false;
        // }
    }

    public function update($role_id, $values)
    {
        $qry = 'UPDATE Tracker_Role SET role_name = ? WHERE role_id = ?';

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('si', $values['role_name'], $role_id);

        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }
}