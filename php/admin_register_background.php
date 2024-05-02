<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Redirecting to Another page in HTML</title>
    <!-- Redirecting to another page using meta tag -->
    <meta http-equiv="refresh" content="5; url= ../php/admin_registration_form.php" />
</head>

<body>
    <?php
    require_once("../php/tracker_user_ds.php");
    require_once("../php/tracker_role_ds.php");

    $tracker_user_obj = new tracker_user_ds($conn);
    $tracker_role_obj = new tracker_role_ds($conn);

    $allRoleResult = $tracker_role_obj->selectAll('');


    if ($_SESSION["role_id"] == 3) {


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST['Role_ID'];
            $username = $_POST['user_username'];
            $password = $_POST['user_password'];


            if ($allRoleResult) {
                foreach ($allRoleResult as $result) {
                    if ($id == $result[1]) {
                        $id = $result[0];
                    }
                }
            }


            $inserting = $tracker_user_obj->insert($id, $username, $password);

            if ($inserting) {
                echo ("Successful insert");
            } else {
                echo ("Failed insert");
            }
        }
    }
    else{
        echo "You are not a site admin, you cannot create this account.";
    }

    ?>
    <h3>
        Redirecting to Another page in HTML
    </h3>
    <p><strong>Note:</strong> If your browser supports Refresh, you'll be
        redirected to the Home page, in 5 seconds.
    </p>
</body>

</html>