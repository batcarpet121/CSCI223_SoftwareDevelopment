<?php
require('../data/books.php');

class Books_ds extends Books
{
    public $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function selectSingle($key)
    {
        $qry = 'SELECT * FROM Books WHERE Books.isbn = ?';
        // echo $qry;
        $stmt = $this->conn->prepare($qry);
        $stmt->bind_param('s', $key);
        $stmt->execute();
        //  $stmt->store_result();
        $stmt->bind_result($this->isbn, $this->author, $this->title, $this->price);

        $row = array();
        while ($stmt->fetch()) {
            array_push($row, $this->isbn);
            array_push($row, $this->author);
            array_push($row, $this->title);
            array_push($row, $this->price);
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

        $qry = 'SELECT '. $sel_list.' FROM Books';
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($this->isbn, $this->author, $this->title, $this->price);

        $returnSet = array();
        $rowCount = 0;
        while ($stmt->fetch()) {
            $row = array();

            array_push($row, $this->isbn);
            array_push($row, $this->author);
            array_push($row, $this->title);
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
