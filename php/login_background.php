<!DOCTYPE html>
<html>

<head>
    <title>Redirecting to Another page in HTML</title>
    <!-- Redirecting to another page using meta tag -->
    <meta http-equiv="refresh" content="5; url =../php/user_registration_form.php" />
</head>

<body>
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
                if ($username == $result[2] && $password == $result[3]) {
                    echo "Welcome " . $result[2];
                    $counter = 1;
                }
            }
            if ($counter == 0) {
                echo "Incorrect Username or Password";
            }
        } else {
            echo "Failed";
        }
    }
    ?>
    <h3>
        Redirecting to back to the registration page
    </h3>
    <p><strong>Note:</strong> If your browser supports Refresh, you'll be
        redirected to the Registration/Login page, in 5 seconds.
    </p>
</body>

</html>