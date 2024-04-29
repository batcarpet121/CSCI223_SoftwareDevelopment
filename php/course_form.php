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
            <a href="../index.html">Home</a>
            <a href="../html/course_form.html">Course Form</a>
            <a href="../html/view.html">View</a>
        </div>
        <input id="SearchBar" type="text" placeholder="Search...">
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
                        echo $result[1] . ", " . $result[2] . "<br>";
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
                        <label for="addDeptID">Enter the Departement ID:</label>
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
                    $deptID = $_POST['addDeptID'];
                    $courseTitle = $_POST['addCourseTitle'];
                
                    $inserting = $course->insert([
                        'dept_id' => $deptID,
                        'course_title' => $courseTitle
                    ]);
                
                    if ($inserting) {
                        echo "Successful insert";
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