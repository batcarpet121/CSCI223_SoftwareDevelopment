<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Test Course Offering</h4>
    <?php
    require("../php/courseOffering_ds.php");

    $courseOffering_obj = new Course_Offering_ds($conn);

    $key = 1;

    $singleResult = $courseOffering_obj->selectSingle($key);

    echo "Testing Single";

    if ($singleResult) {
        echo "Course Offering ID: " . $singleResult[0] . "<br>";
        echo "Course Offering: " . $singleResult[1] . "<br>";
        echo "Course Term: " . $singleResult[2] . "<br>";
        echo "Course Year: " . $singleResult[3] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    $conn->close();

    ?>
</body>

</html>