<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Test Tracker User</h4>
    <?php 
    require("../utils/db_utils.php");
    $conn = db_connect();

    if ($conn->connect_error == null) {
        echo "Success!";
    } else {
        echo "FAILED! " . $conn->connect_error;
    }
    echo "<br>";

    $result = $conn->query("SELECT * FROM CourseOffering");
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Course Offering ID: " . $row["course_offering_id"]. "<br>";
            echo "Course ID: " . $row["course_id"]. "<br>";
            echo "Course Term: " . $row["course_term"]. "<br>";
            echo "Course Year: " . $row["year"]. "<br>";
            echo "<br>";
        }
    } else {
        echo "0 results";
    }
    
    $conn->close();
    ?>
</body>
</html>