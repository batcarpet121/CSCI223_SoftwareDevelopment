<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Add Textbook</title>
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
            <a href="../php/user_registration_form.php">Login/Register</a>
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Available courses
            </h2>
            <p>
                <?php
                require_once("../php/textbook_ds.php");
                require_once("../php/textbook_join_tables.php");
                $tableJoins = new Textbook_Join();
                $testTextbook = new Textbook_ds();

                $qryResult = $tableJoins->getCourseOfferings('');
                if($qryResult){
                    foreach($qryResult as $result){
                        echo "Course: " . $result[3] . "<br>";
                        echo "Year: " . $result[2] . "<br>";
                        echo "Term: " . $result[1] . "<br>";
                        echo "<br>";
                    }        
                    
                } else {
                    echo "No Records found";
                }
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Add textbook
            </h2>
            <div class="formWrapper">
                <form action="../php/add_textbook.php" method="post">
                    <label for="course_offering_id">Course Offering ID:</label>
                    <select id="course_offering_id" name="course_offering_id" required>
                    <?php 
                        $options = $tableJoins->getCourseOfferings();
                        if (!empty($options)) {
                            foreach ($options as $option) {
                                echo "<option value='{$option[0]}'>{$option[3]} - {$option[1]} - {$option[2]}</option>";
                            }  
                        } else {
                            echo '<option value="">No Results Found</option>';
                        }
                                
                    
                    ?>

                    </select><br><br>

                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br><br>

                    <label for="author">Author:</label>
                    <input type="text" id="author" name="author" required><br><br>

                    <label for="isbn">ISBN:</label>
                    <input type="text" id="isbn" name="isbn" required><br><br>

                    <label for="publisher">Publisher:</label>
                    <input type="text" id="publisher" name="publisher" required><br><br>

                    <label for="edition">Edition:</label>
                    <input type="text" id="edition" name="edition" required><br><br>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required><br><br>

                    <label for="date_added">Date:</label>
                    <input type="text" id="date_added" name="date_added" required><br><br>

                    <input type="submit" value="Add Textbook" id="submitTextbook">
                </form>
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