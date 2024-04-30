<?php 

require('../utils/db_utils.php');

// SELECT Textbook.course_offering_id, Course_offering.course_offering_id FROM Textbook, Course_Offering
// WHERE Textbook.course_offering_id, Course_offering.course_offering_id

function getCourseOfferings() {
    
    $conn = db_connect();

    $qry = "SELECT Textbook.course_offering_id, 
    FROM Textbook 
    INNER JOIN CourseOffering 
    ON Textbook.course_offering_id = CourseOffering.course_offering_id";

    $stmt = $conn->prepare($qry);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($course_offering_id);
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($course_offering_id);
        while ($stmt->fetch()) {
            echo "<option value='$course_offering_id'>$course_offering_id</option>";
        }
    } else {
        echo "<option value=''>No Records Found</option>";
    }
}

?>