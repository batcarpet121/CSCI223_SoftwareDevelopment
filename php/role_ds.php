<?php
require('../data/role.php');

class role_ds extends role
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function selectSingle($key)
    {
        $qry = 'SELECT * FROM Role WHERE Role.role_name = ?';
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

    public function selectAll($sel_list)
    {
        if ($sel_list == null) {
            $sel_list = '*';
        } else {
            ;
            // ToDo - handle specific cols
        // expect csv string in arg. explode into arr
        }

        $qry = 'SELECT '. $sel_list.' FROM Role';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
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

    public function insert($info)
    {
        $qry = 'INSERT INTO Role VALUES ($info)';

        $stmt = $this->conn->preprare($qry);
        $stmt->bind_param('s', $info['role_name']);

        if($stmt->execute()){
            return $stmt->role_id;
        }
        else{
            return false;
        }
    }

    public function update($role_id, $values)
    {
        $qry = 'UPDATE Role SET role_name = ? WHERE role_id = ?';

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('si', $values['role_name'], $role_id);
        
        if ($stmt->execute()) {
            return true;
        }else{
            return false;
        }
    }
}