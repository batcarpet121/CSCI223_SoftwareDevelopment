<?php
require('../php/courseOffering.php');

class Course_Offering_ds extends Course_Offering{
    public function selectSingle($key){
        $qry = 'SELECT * FROM courseOffering WHERE courseOffering.isbn = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        $stmt->bind_result(
            $this->course_offering_id, 
            $this->course_id, 
            $this->term, 
            $this->YEAR);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->course_offering_id);
            array_push($row, $this->course_id);
            array_push($row, $this->term);
            array_push($row, $this->YEAR);
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
            $this->course_offering_id, 
            $this->course_id, 
            $this->term, 
            $this->YEAR);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->course_offering_id);
            array_push($row, $this->course_id);
            array_push($row, $this->term);
            array_push($row, $this->YEAR);

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
