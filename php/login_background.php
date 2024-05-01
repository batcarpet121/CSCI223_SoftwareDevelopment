<?php
    $tracker_user_obj = new tracker_user_ds($conn);

    $allResult = $tracker_user_obj->selectAll('');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['login_user_username'];
        $password = $_POST['login_user_password'];

        echo $username;
        echo $password;

        if ($allResult) {
            foreach ($allResult as $result) {
                if ($username == $allResult[2] and $password == $allResult[3]) {
                    echo "Welcome " . $username;
                } else {
                    echo "Cannot find user";
                }
            }
        } else {
            echo "Failed";
        }
    }
?>