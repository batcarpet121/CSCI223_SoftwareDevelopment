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
                Course Offerings
            </h2>
            <p>
                <?php 
                    require("../php/courseOffering_ds.php");

                    $course_offering_obj = new Course_Offering_ds($conn);

                    $courseOfferingSelectMult = '';
                    $qryResultMult = $course_offering_obj->selectAll($sel_list);
                    if($qryResultMult){
                        foreach($qryResultMult as $result){
                            echo $result[1]. ". ". $result[2]. ", ". $result[3]. "<br>";
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
                        <label for="Dept_Title">Enter Course ID:</label>
                        <input type="text" id="Dept_Title" name="Course_ID" placeholder="Enter the Course ID" required>
                    </div>
                    <div class="addTerm">
                        <label for="Dept_Title">Enter Course Term:</label>
                        <input type="text" id="Dept_Title" name="Course_Term" placeholder="Enter the Course Term" required>
                    </div>
                    <div class="addYear">
                        <label for="Dept_Title">Enter Course Year:</label>
                        <input type="text" id="Dept_Title" name="Course_Year" placeholder="Enter the Course_Year" required>
                    </div>
                    <div class="SubmitButton">
                        <button type="submit">Add Department</button>
                    </div>
                </form>
                <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $ID = $_POST['Course_ID'];
                        $Term = $_POST['Course_Term'];
                        $Year = $_POST['Course_Year'];
                        
                        $inserting =$course_offering_obj->insert($ID, $Term, $Year);

                        if($inserting){
                            echo("Successful insert");
                        }
                        else{
                            echo $title;
                            echo("Failed insert");
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

    document.getElementById("addCourseForm").addEventListener("submit", function(event){
        event.preventDefault();
        
  
    });

</script>

</html>