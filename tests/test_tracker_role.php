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
    require("../php/tracker_role_ds.php");


    $tracker_role_obj = new tracker_role_ds();

    //Select Single values
    $key = 1;

    

    $singleResult = $tracker_user_obj->selectSingle($key);
    $allResult = $tracker_user_obj->selectAll($sel_list);

    echo "Testing select single <br>";

    if ($singleResult) {
        echo "Role ID: " . $singleResult[0] . "<br>";
        echo "Role Name: " . $singleResult[1] . "<br>";

        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }

    echo "Testing select all <br>";

    if ($allResult) {
        foreach ($allResult as $result) {
            echo "Role ID: " . $singleResult[0] . "<br>";
            echo "Role Name: " . $singleResult[1] . "<br>";
            echo "<br>";
        }
    }

    //Insert values

    $role_id = 100;
    $role_name = 'Test Role 100';
    $insertResult = $tracker_user_obj->insert($role_id, $role_name);

    if($insertInfo == 1){
        echo "Insert successful!";
        $return_status = true;
    }else{
        echo "Insert Failed.";
        $return_status = false;
    }

    return $return_status;

    ?>

</body>

</html>