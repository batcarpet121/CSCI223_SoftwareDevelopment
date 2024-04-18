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
    require("../utils/db_utils.php");
    $conn = db_connect();

    if ($conn->connect_error == null) {
        echo "success!";
    } else {
        echo "FAILED! " . $conn->connect_error;
    }

    $user_id = 1;

    $stmt = $conn->prepare("SELECT * FROM tracker_user where user_id = ?");
    $stmt-> bind_param("i", $user_id);
    $stmt-> execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo "<p>User ID: " . $row['user_id'] . "</p>";
        echo "<p>Role ID: " . $row['role_id'] . "</p>";
        echo "<p>Username: " . $row['username'] . "</p>";
        echo "<p>Password: " . $row['password'] . "</p>";
    } else {
        echo "No user found with the provided ID.";
    }
    ?>
</body>
</html>