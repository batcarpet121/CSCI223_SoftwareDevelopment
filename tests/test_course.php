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

    //Select Single values
    $key = 1;

    // Insert values
    $insert_dept_id=1;
    $insert_course_title="Javascript";

    // Update
    $update_course_id=9;
    $update_dept_id=1;
    $update_course_title= "105 Javascript";

    $singleResult = $course_obj->selectSingle($key);
    $allResult = $course_obj->selectAll($sel_list);
    // $insertInfo = $course_obj->insertInfo($insert_dept_id, $insert_course_title);
    $updateInfo = $course_obj->update($update_course_id, $update_dept_id, $update_course_title,);

    echo "Testing select single <br>";

    if ($singleResult) {
        echo "Course ID: " . $singleResult[1] . "<br>";
        echo "Department ID: " . $singleResult[1] . "<br>";
        echo "Course Title: " . $singleResult[2] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    echo "Testing select all <br>";
    
    if($allResult){
        foreach($allResult as $result){
            echo "Course ID: ". $result[0]. "<br>";
            echo "Department ID: ". $result[1]. "<br>";
            echo "Course Title: ". $result[2]. "<br>";
            echo "<br>";
        }        
        
    }
    


    // if($insertInfo){
    //     echo "Inserted the information";
    // } else {
    //     echo "Unable to insert the infomation";
    // }

    if($updateInfo){
        echo "Information Updated";
    } else {
        echo "failed";
    }

    ?>

</body>

</html>