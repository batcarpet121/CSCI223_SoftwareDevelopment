<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>User Registration</title>
    <style>
        .addForm {
            padding: 10px 0;
            font-size: larger;
        }

        #sideBar p {
            font-size: larger;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 25%;
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
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Add Textbook
            </h2>
            <p>
                <?php
                 require_once("../utils/user_account_utils.php");
                 $user_acct = new User_Account_Utils();
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <input type="submit" value="Create Account" id="submitUserInfo">
                </form>
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        
                        $role_id = $_POST[1];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
            
                        if (!$user_acct->selectSingle($username)) {
                            $values = [
                                'role_id' => $role_id,
                                'username' => $username,
                                'password' => $password
                            ];
                            
                            if ($user_acct->insert($values)) {
                                echo("Successful insert");
                            } else {
                                echo("Failed to insert");
                            }
                        } else {
                            echo("Username already exists");
                        }
                    }
                
                ?>
            </div>
        </div>

    </div>

</body>

<footer>
    <p>This is footer content</p>
</footer>

<script>

</script>

</html>