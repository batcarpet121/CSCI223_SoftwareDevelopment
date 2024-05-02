<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Course</title>
    <style>
        .addForm {
            padding: 10px 0;
            font-size: larger;
        }

        #sideBar p {
            font-size: larger;
        }
    </style>
</head>

<body>
    <header>
        <div id="title">
            <h1>Tracker2024</h1>
        </div>
        <div id="nav">
            <input id="SearchBar" type="text" placeholder="Search...">
            <a href="../index.html">Home</a>
            <a href="../html/view.html">View</a>
            <a href="../php/department_form.php">Department Form</a>
            <a href="../php/course_form.php">Courses Form</a>
            <a href="../php/courseOffering_form.php">Course Offering Form</a>
            <a href="../php/textbook_form.php">Textbook Form</a>
            <a href="../php/user_registration_form.php">Login/Register</a>
            <a href="../php/admin_registration_form.php">Admin Registration</a>
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Login In
            </h2>
            <p>
                <?php
                require("../php/tracker_role_ds.php");
                require("../php/tracker_user_ds.php");

                $tracker_user_obj = new tracker_user_ds($conn);
                $tracker_role_obj = new tracker_role_ds();

                $allRoleResult = $tracker_role_obj->selectAll('');
                $allUserResult = $tracker_user_obj->selectAll('');
                
                ?>
            </p>
            <div class="formWrapper">
                <form action="../php/login_background.php" id="addLogInform" method="POST">
                    <div class="addUsername">
                        <label for="Username">Enter your username:</label>
                        <input type="text" id="login_user_username" name="login_user_username" placeholder="Enter a usernamee" required>
                    </div>
                    <div class="addPassword">
                        <label for="Dept_Title">Enter your password</label>
                        <input type="input" id="login_user_password" name="login_user_password" placeholder="Enter a password" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Login</button>
                    </div>
                </form>
                <?php 
                    echo "Welcome ". $_SESSION["username"];
                ?>
            </div>
        </div>

        <div id="mainContent">
            <h2>
                Register
            </h2>
            <div class="formWrapper">
                <form action="../php/admin_register_background.php" id="addDeptform" method="POST">
                    <div class="addRole">
                        <label for="Role">Select your role</label>
                        <select type="text" id="Role_ID" name="Role_ID" placeholder="Select your Role" required>
                            <?php
                            if ($allRoleResult) {
                                foreach ($allRoleResult as $result) {
                                    echo "<option value=" . $result[1] . ">" . $result[1] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="addUsername">
                        <label for="Username">Enter a username:</label>
                        <input type="text" id="user_username" name="user_username" placeholder="Enter a usernamee" required>
                    </div>
                    <div class="addPassword">
                        <label for="Dept_Title">Select a password</label>
                        <input type="input" id="user_password" name="user_password" placeholder="Enter a password" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Register</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>

<footer>
    <p>This is footer content</p>
</footer>

<script>
    // document.getElementById("addDeptForm").addEventListener("submit", function(event) {
    //     event.preventDefault();


    // });
</script>

</html>