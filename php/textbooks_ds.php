<?php 
require('../php/textbooks.php');
/* Ignore any conn errors as steve will make the connection file
    Make sure to adjust the current code based on the textbook table
*/

class Textbooks_ds extends textbooks {

    public function selectSingle($key) {

        $qry = 'SELECT * FROM textbook WHERE textbook.isbn = ?';
        // For testing uncomment any commented code below --
        // echo $qry;
        $stmt = $this -> conn -> prepare($qry);
        $stmt -> bind_param('s', $key);
        $stmt -> execute();
        // $stmt -> store_result();
        $stmt -> bind_result(
            $this->textbook_id,
            $this->class_id,
            $this->title,
            $this->author,
            $this->isbn,
            $this->publisher,
            $this->edition,
            $this->price);
        
        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->textbook_id);
            array_push($row, $this->class_id);
            array_push($row, $this->title);
            array_push($row, $this->author);
            array_push($row, $this->isbn);
            array_push($row, $this->publisher);
            array_push($row, $this->edition);
            array_push($row, $this->price);
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
            ;
            /*
            Add extra functionality based on reqs.S
            */
        }

        $qry = 'SELECT ' . $sel_list.' FROM textbook';
        $stmt = $this->conn->prepare($qry);
        $stmt -> execute();
        $stmt -> store_result();
        $stmt -> bind_result(
            $this->textbook_id,
            $this->class_id,
            $this->title,
            $this->author,
            $this->isbn,
            $this->publisher,
            $this->edition,
            $this->price);

            $returnSet = array();
            $rowCount = 0;
            while ($stmt->fetch()) {
                $row = array();
    
                array_push($row, $this->textbook_id);
                array_push($row, $this->class_id);
                array_push($row, $this->title);
                array_push($row, $this->author);
                array_push($row, $this->isbn);
                array_push($row, $this->publisher);
                array_push($row, $this->edition);
                array_push($row, $this->price);
    
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
        return null;
    }
}


?>