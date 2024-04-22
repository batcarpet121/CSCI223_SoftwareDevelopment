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
    require("../php/tracker_user_ds.php");


    $tracker_user_obj = new tracker_role_ds($conn);

    //Select Single values
    $key = 1;

    $singleResult = $tracker_user_obj->selectSingle($key);
    $allResult = $tracker_user_obj->selectAll($sel_list);

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

    ?>

</body>

</html>