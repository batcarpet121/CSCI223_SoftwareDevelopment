<?php
require('../php/courseOffering.php');

class tracker_user_ds extends tracker_user{
    public function selectSingle($key){
        $qry = 'SELECT * FROM courseOffering WHERE courseOffering.isbn = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result(
            $this->user_id, 
            $this->role_id, 
            $this->username, 
            $this->PASSWORD);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->user_id);
            array_push($row, $this->role_id);
            array_push($row, $this->username);
            array_push($row, $this->PASSWORD);
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

        $qry = 'SELECT '. $sel_list.' FROM Books';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $this->user_id, 
            $this->role_id, 
            $this->username, 
            $this->PASSWORD);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->user_id);
            array_push($row, $this->role_id);
            array_push($row, $this->username);
            array_push($row, $this->PASSWORD);

            $rowCount++;

            array_push($returnSet, $row);
        }
        if ($rowCount > 0) {
            return $returnSet;
        } else {
            return null;
        }
    }

    public function insert($values){
        return null;
    }
}
