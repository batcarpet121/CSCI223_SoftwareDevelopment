<?php 

require('../utils/db_utils.php');

// SELECT Textbook.course_offering_id, Course_offering.course_offering_id FROM Textbook, Course_Offering
// WHERE Textbook.course_offering_id, Course_offering.course_offering_id


class Textbook_utils {
        
    public $conn;

    public function __construct()
    {
        $this->conn = db_connect();
        
        if ($this->conn->connect_error == null) {
            "success!";
        } else {
            echo "FAILED! " . $this->conn->connect_error;
        }
        
    }
    public function getCourseOfferings() {
        $qry = "SELECT course_offering_id
                FROM Textbook
                INNER JOIN Textbook.course_offering_id ON CourseOffering.course_offering_id = course_offering_id";
        $stmt = $this->conn->prepare($qry);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($course_offering_id);
            while ($stmt->fetch()) {
                echo "<option value='$course_offering_id'>$course_offering_id</option>";
            }
        } else {
            echo "<option value=''>No Records Found</option>";
        }

        $stmt->close();
    }
}

?>