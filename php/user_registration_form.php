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
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Registration
            </h2>
            <p>
                <?php
                require("../php/tracker_role_ds.php");
                require("../php/tracker_user_ds.php");



                $tracker_role_obj = new tracker_role_ds();

                $allResult = $tracker_role_obj->selectAll();

                // $departmentSelectMult = '';
                // $qryResultMult = $department->selectAll($departmentSelectMult);
                // if ($qryResultMult) {
                //     foreach ($qryResultMult as $result) {
                //         echo $result[0] . ". " . $result[1] . "<br>";
                //     }
                // }
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="" id="addDeptform" method="POST">
                    <div class="addUsername">
                        <label for="Username">Enter a username:</label>
                        <input type="text" id="user_username" name="user_username" placeholder="Enter a usernamee" required>
                    </div>
                    <div class="addPassword">
                        <label for="Dept_Title">Select a term</label>
                        <select type="input" id="user_password" name="user_password" placeholder="Enter a password" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Register</button>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $id = 2;
                    $username = $_POST['user_username'];
                    $password = $_POST['user_password'];

                    $inserting = $department->insert($id, $username, $password);

                    if ($inserting) {
                        echo ("Successful insert");
                    } else {
                        echo $title;
                        echo ("Failed insert");
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
    document.getElementById("addDeptForm").addEventListener("submit", function(event) {
        event.preventDefault();


    });
</script>

</html>