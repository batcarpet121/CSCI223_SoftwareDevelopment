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
        <div id="courseOfferingsideBar">
            <h2>
                Course Offerings
            </h2>
            <p>
                <?php
                require("../php/courseOffering_ds.php");
                require("../php/course_ds.php");

                $course_offering_obj = new Course_Offering_ds($conn);
                $course_obj = new course_ds($conn);

                $courseSelectMult = '';
                $courseResultMult = $course_obj->selectAll($courseSelectMult);
                if ($courseResultMult) {
                    foreach ($courseResultMult as $result) {
                        echo "ID: " . $result[0]. " | Course Name: " . $result[2]. "<br>";
                    }
                }
                echo "<br>";
                echo "Course Offerings (Course ID | Term | Year) <br>";
                $courseOfferingSelectMult = '';
                $qryResultMult = $course_offering_obj->selectAll($courseOfferingSelectMult);
                if ($qryResultMult) {
                    foreach ($qryResultMult as $result) {
                        echo $result[1] . ". " . $result[2] . ", " . $result[3] . "<br>";
                    }
                }
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="" id="addOfferingform" method="POST">
                    <div class="addId">
                        <label for="Dept_Title">Select Course ID:</label>
                        <select type="text" id="Course_ID" name="Course_ID" placeholder="Enter the Course ID" required>
                            <?php
                            if ($courseResultMult) {
                                foreach ($courseResultMult as $result) {
                                    echo "<option value=" . $result[0] . ">" . $result[0] . "</option>";
                                }
                            }
                            ?>
                        </select>

                    </div>
                    <div class="addTerm">
                        <label for="Dept_Title">Select a term</label>
                        <select type="text" id="Course_Term" name="Course_Term" placeholder="Enter the Course Term" required>
                            <option value="Spring">Spring</option>
                            <option value="Fall">Fall</option>
                        </select>
                    </div>
                    <div class="addYear">
                        <label for="Dept_Title">Enter Course Year:</label>
                        <input type="text" id="Course_Year" name="Course_Year" placeholder="Enter the Course_Year" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Course Offering</button>
                    </div>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $ID = $_POST['Course_ID'];
                    $Term = $_POST['Course_Term'];
                    $Year = $_POST['Course_Year'];

                    $inserting = $course_offering_obj->insert($ID, $Term, $Year);

                    if ($inserting) {
                        echo ("Successful insert");
                    } else {

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

<!-- <script>
    document.getElementById("addCourseForm").addEventListener("submit", function(event) {
        event.preventDefault();


    });
</script> -->

</html>