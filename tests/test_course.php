<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Test Course</h4>
    <?php
    require("../php/course_ds.php");


    $course_obj = new course_ds($conn);


    $key = 1;
    // $dept_id=1;
    // $course_title="Javascript";

    $singleResult = $course_obj->selectSingle($key);
    $allResult = $course_obj->selectAll($sel_list);
    // $insertInfo = $course_obj->insert($dept_id, $course_title);


    if ($singleResult) {
        echo "Course ID: " . $singleResult[1] . "<br>";
        echo "Department ID: " . $singleResult[1] . "<br>";
        echo "Course Title: " . $singleResult[2] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    if($allResult){
        print_r($allResult);
        
    }
    


    // if($insertInfo){
    //     echo "Inserted the information";
    // } else {
    //     echo "Unable to insert the infomation";
    // }



    ?>

</body>

</html>