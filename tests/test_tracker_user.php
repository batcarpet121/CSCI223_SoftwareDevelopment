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
        echo "User ID: " . $singleResult[0] . "<br>";
        echo "Role ID: " . $singleResult[1] . "<br>";
        echo "Username: " . $singleResult[2] . "<br>";
        echo "Password: " . $singleResult[3] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    echo "Testing select all <br>";

    if ($allResult) {
        foreach ($allResult as $result) {
            echo "User ID: " . $result[0] . "<br>";
            echo "Role ID: " . $result[1] . "<br>";
            echo "Username: " . $result[2] . "<br>";
            echo "Password: " . $result[3] . "<br>";
            echo "<br>";
        }
    }

    ?>

</body>

</html>