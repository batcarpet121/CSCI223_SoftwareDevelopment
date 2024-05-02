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
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>Courses</h2>
            <p>
                <?php
                require("../php/course_ds.php");

                $course_obj = new Course_ds($conn);

                $courseSelectMult = '';
                $qryResultMult = $course_obj->selectAll($courseSelectMult);
                if ($qryResultMult) {
                    foreach ($qryResultMult as $result) {
                        echo "Department ID: " . $result[1] . "<br>";
                        echo "Course: " . $result[2] . "<br>";
                    }
                }
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>Main Content</h2>
            <div class="formWrapper">
                <form action="" id="addCourseform" method="POST">
                    <div class="addDeptID">
                        <label for="addDeptID">Enter the Department ID:</label>
                        <input type="text" id="addDeptID" name="dept_id" placeholder="Enter the Departement ID" required>
                    </div>
                    <div class="addCourseTitle">
                        <label for="addCourseTitle">Enter the Course Title:</label>
                        <input type="text" id="addCourseTitle" name="course_title" placeholder="Enter the Course Title" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Course</button>
                    </div>
                </form>
                <?php

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $insertDeptID = $_POST['dept_id'];
                    $insertCourseTitle = $_POST['course_title'];

                    $inserting = $course_obj->insertInfo($insertDeptID, $insertCourseTitle);

                    if ($inserting) {
                        echo "Successful insert";
                        //line below this fixes adding duplicates when refreshing the page
                        echo "<script>window.location.href = window.location.pathname;</script>";
                        echo "Added new course!";
                        exit();
                    } else {
                        echo "Failed insert";
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

</html>