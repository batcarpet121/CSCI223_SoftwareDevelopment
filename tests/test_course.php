<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Test Course</h4>

    <div id="ADD_COURSE" class="addForm">
        <label for="COURSE_Title">Enter Course Title:</label>
        <input type="text" id="COURSE_TITLE" name="COURSE_TITLE" placeholder="Enter the Course Title" required>
    </div>
    <?php
    require("../php/course_ds.php");


    $course_obj = new course_ds($conn);

    //Select Single row value
    $key = 1;

    // Insert
    $dept_id= $_GET['COURSE_TITLE'];
    $course_title="Javascript";

    echo $dept_id;

    $singleResult = $course_obj->selectSingle($key);
    $allResult = $course_obj->selectAll($sel_list);
    $insertInfo = $course_obj->insertInfo($dept_id, $course_title);

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



    ?>

</body>

</html>