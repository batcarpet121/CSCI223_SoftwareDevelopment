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
    $result = $course_obj->selectSingle($key);

    if ($result) {
        // Output or process the result as needed
        // echo $result;
        echo "Hello";
    } else {
        echo "No record found for the given key.";
    }



    ?>

</body>

</html>