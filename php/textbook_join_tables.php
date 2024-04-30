<?php 

require_once('../utils/db_utils.php');
class Textbook_Join {
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

        $qry = "SELECT CO.course_offering_id, CO.term, CO.year
        FROM CourseOffering CO
        INNER JOIN Textbook T ON CO.course_offering_id = T.course_offering_id";
        $stmt = $this->conn->prepare($qry);
        if (!$stmt) {
            echo "Prepare error: " . $this->conn->error;
            return [];
        }
        $stmt->execute();
        $stmt->store_result();

        $results = [];
        $rowCount = 0;
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($course_offering_id, $term, $year);
            while ($stmt->fetch()) {
                $results[] = [
                    'course_offering_id' => $course_offering_id,
                    'term' => $term,
                    'year' => $year
                ];
                $rowCount++;
            }
        }
    return $results;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
   

?>