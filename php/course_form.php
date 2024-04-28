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
        </div>

        <div id="mainContent">
            <h2>Main Content</h2>
            <div class="formWrapper">
                <form action="" id="addCourseform" method="POST">
                    <div class="addForm">
                        <label for="Course_Name">Enter Course Name:</label>
                        <input type="text" id="Course_Name" name="Course_Name" placeholder="Enter Course Name" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<footer>
    <p>This is footer content</p>
</footer>

</html>