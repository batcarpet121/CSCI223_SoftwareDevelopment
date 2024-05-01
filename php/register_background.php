<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = 2;
        $username = $_POST['user_username'];
        $password = $_POST['user_password'];

        $inserting = $tracker_user_obj->insert($id, $username, $password);

        if ($inserting) {
            echo ("Successful insert");
        } else {
            echo $title;
            echo ("Failed insert");
        }
    }
    
?>