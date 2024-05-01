<?php
    require_once("../php/tracker_user_ds.php");

    $tracker_user_obj = new tracker_user_ds($conn);

    $allResult = $tracker_user_obj->selectAll('');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['login_user_username'];
        $password = $_POST['login_user_password'];

        // echo $username;
        // echo $password;

        if ($allResult) {
            $counter = 0;
            foreach ($allResult as $result) {
                echo $result[2];
                if ($username == $result[2]) {
                    echo "Welcome " . $result[2];
                    $counter = 1;
                }
            }
            if($counter == 0){
                echo "Incorrect Username or Password";
            }
        } else {
            echo "Failed";
        }
    }
?>