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
            <h2>
                Deparments
            </h2>
            <p>
                <?php 
                    require("php/deparment_ds.php");

                    $department = new Department_ds();

                    $departmentSelectMult = '';
                    $qryResultMult = $department->selectAll($departmentSelectMult);
                    if($qryResultMult);
                        foreach($qryResultMult as $result){
                            echo "id: ". $result[0]. "Name: ". $result[1];
                        }
                ?>
                <div>
                    <button onclick="window.location.href='../index.html'">Add Course Offering</button>
                </div>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="" id="addCourseForm">
                    <div class="addForm">
                        <label for="addMultipleCourses">Add multiple Courses:</label>
                        <input type="checkbox" id="addMultipleCourses">
                    </div>
                    <div class="addForm">
                        <label for="DEPT">Select a Department: </label>
                        <select name="DEPT" id="DEPT">
                            <div id="DEPT_FORM">
                                <option value="TEST_ONE">TEST ONE</option>
                                <option value="TEST_TWO">TEST TWO</option>
                            </div>
                        </select>
                    </div>
                    <div id="ADD_COURSE" class="addForm">
                        <label for="COURSE_Title">Enter Course Title:</label>
                        <input type="text" id="COURSE_TITLE" name="COURSE_TITLE" placeholder="Enter the Course Title" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Course</button>
                    </div>
                    <div id="currentAddedCourses">
                        <p>Added Courses</p>
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

    document.getElementById("addCourseForm").addEventListener("submit", function(event){
        event.preventDefault();
        
        alert("Course Succesfully added");

        var courseTitle = document.getElementById("COURSE_TITLE").value;
        var newCourseElement = document.createElement("p");

        newCourseElement.textContent = courseTitle;

        document.getElementById("currentAddedCourses").appendChild(newCourseElement);
        document.getElementById("COURSE_TITLE").value = "";

        var addMultipleCoursesCheckbox = document.getElementById("addMultipleCourses");
        if (!addMultipleCoursesCheckbox.checked) {
            window.location.href = '../index.html';
        }
    });

</script>

</html>