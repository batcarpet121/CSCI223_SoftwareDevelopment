<?php 

class Joined_Tables_Textbook {

    var $course_offering_id;
    var $term;
    var $year;
    var $course_title;

}

require_once('../utils/db_utils.php');
class Textbook_Join extends Joined_Tables_Textbook {
    public $conn;

    public function __construct()
    {
        $this->conn = db_connect();
        
        if ($this->conn->connect_error == null) {
            echo "success!";
        } else {
            echo "FAILED! " . $this->conn->connect_error;
        }
        
    }

    public function getCourseOfferings() {

        $qry = "SELECT course_offering_id, course_term, course_year, course_title FROM CourseOffering
        LEFT JOIN Course ON CourseOffering.course_id = Course.course_id";
        $stmt = $this->conn->prepare($qry);
        if (!$stmt) {
            echo "Prepare error: " . $this->conn->error;
            return [];
        }
        echo $qry;
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $this->course_offering_id,
            $this->term,
            $this->year,
            $this->course_title);

            $returnSet = array();
            $rowCount = 0;
            while ($stmt->fetch()) {
                $row = array();
                array_push($row, $this->course_offering_id);
                array_push($row, $this->term);
                array_push($row, $this->year);
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

        

    public function __destruct() {
        $this->conn->close();
    }
}
   

?>