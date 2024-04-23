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


    $course_offering_obj = new Course_Offering_ds($conn);

    //Select Single values
    $key = 1;

    //Insert values
    $course_offering_id = 15;
    $course_id = 15;
    $course_term = "Spring";
    $course_year = "2024";

    $deleteKey=11;

    $singleResult = $course_offering_obj->selectSingle($key);
    $allResult = $course_offering_obj->selectAll($sel_list);
    //$insertInfo = $course_offering_obj->insert($course_offering_id, $course_id, $course_term, $course_year);
    $deleteResult = $course_offering_obj->delete($deleteKey);

    echo "Testing select single <br>";

    if ($singleResult) {
        echo "Course Offering ID: " . $singleResult[0] . "<br>";
        echo "Course ID: " . $singleResult[1] . "<br>";
        echo "Course Term: " . $singleResult[2] . "<br>";
        echo "Course Year: " . $singleResult[3] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    echo "Testing select all <br>";

    if ($allResult) {
        foreach ($allResult as $result) {
            echo "Course Offering ID: " . $result[0] . "<br>";
            echo "Course ID: " . $result[1] . "<br>";
            echo "Course Term: " . $result[2] . "<br>";
            echo "Course Year: " . $result[3] . "<br>";
            echo "<br>";
        }
    }

    if($deleteResult){
        echo"successful delete";
    }
    else{
        echo"failed delete";
    }

    // if($insertInfo){
    //     echo "Insert successful!";
    // }else{
    //     echo "Insert Failed.";
    // }





    ?>

</body>

</html>