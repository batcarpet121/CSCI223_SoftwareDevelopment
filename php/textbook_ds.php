<?php

require('../php/textbook.php');
/* Ignore any conn errors as steve will make the connection file
    Make sure to adjust the current code based on the textbook table
*/

require('../utils/db_utils.php');
class Textbook_ds extends Textbook {

    public $conn;

    public function __construct($conn)
    {
        $this->$conn = db_connect();
        
        if ($conn->connect_error == null) {
            echo "success!";
        } else {
            echo "FAILED! " . $conn->connect_error;
        }
        
    }

    public function selectSingle($key) {
        if ($key == null) {
            return false;
        }
        echo '29';

        $qry = 'SELECT * FROM Textbook WHERE author = ?';
        echo '30';
        // For testing uncomment any commented code below --
        // echo $qry;
        $stmt = '';
        try {
            $stmt = $this->conn->prepare($qry);
        } catch(Exception $e){
            echo $e->getMessage();
        }
      
        echo '31';
        $stmt->bind_param('s', $key);
        echo '36';

        $stmt->execute();

        echo '40';
        // $stmt->store_result();
        $stmt->bind_result(
            $this->textbook_id,
            $this->class_id,
            $this->title,
            $this->author,
            $this->isbn,
            $this->publisher,
            $this->edition,
            $this->price);
        
        $row = array();
        echo '53';
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
        echo '64';
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

        $qry = 'SELECT ' . $sel_list.' FROM Textbook';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
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
        
    public function insert($values) {
        if (!is_array($values)){
            return false;
        }
        
        $qry = 'INSERT INTO Textbook (class_id, title, author, isbn, publisher, edition, price) VALUES (?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($qry);

        $stmt->bind_param(
            'isssssd', $values['class_id'], $values['title'], $values['author'], $values['isbn'], $values['publisher'], $values['edition'], $values['price']);
        $success = $stmt->execute();

        // if (!$success) {
        //     echo "Insert failed: " . $stmt->error;
        // }
    }

    // public function updateRow($value, $field, $id) {
    //     if ($value == null || $field == null || $id == null) {
    //         return false;
    //     }

    //     $qry = 'UPDATE textbook set ' . $field . ' = ' . $value . ' WHERE textbook_id = ' . $id;
    //     $stmt = $this->conn->prepare($qry);
    //     switch(gettype($value)){
    //         case 'integer';
    //             $bindtype = 'i';
    //             break;
    //         case 'double';
    //             $bindtype = 'd';
    //             break;
    //         case 'string';
    //         default:
    //             $bindtype = 's';
    //             break;
    //     }
    //     $stmt->bind_param($bindtype . 'i', $value, $id);
    //     $success = $stmt->execute();
    //     if (!$success) {
    //         echo "Update failed: " . $stmt->error;
    //     }
    // }

    public function update($row) {
        if ($row == null) {
            return false;
        }

        $qry = 'UPDATE Textbook SET class_id = (?), 
                                    title = (?),
                                    author = (?),
                                    isbn = (?),
                                    publisher = (?),
                                    edition = (?),
                                    price = (?) WHERE 
                                    textbook_id = ' . $row['textbook_id'];

        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('isssssd', $row['class_id'], $row['title'], $row['author'], $row['isbn'], $row['publisher'], $row['edition'], $row['price']);

        $success = $stmt->execute();
        // if (!$success) {
        //     echo "Update failed: " . $stmt->error;
        // }
    }

    
    public function delete($id){
        if ($id == null) {
            return false;
        }

        $qry = 'DELETE FROM Textbook WHERE textbook_id = ?';
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('i', $id);

        $success = $stmt->execute();
        // if (!$success) {
        //     echo "Delete failed: " . $stmt->error;
        // }
    }

}


?>