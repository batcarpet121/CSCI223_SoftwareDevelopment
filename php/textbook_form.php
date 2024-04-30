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
            <a href="../index.html">Home</a>
            <a href="../html/course_form.html">Course Form</a>
            <a href="../html/view.html">View</a>
        </div>
        <input id="SearchBar" type="text" placeholder="Search...">
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                Add Textbook
            </h2>
            <p>
                <?php
                require_once("../php/textbook_ds.php");
        
                $testTextbook = new Textbook_ds();
                ?>
            </p>
        </div>

        <div id="mainContent">
            <h2>
                Main Content
            </h2>
            <div class="formWrapper">
                <form action="../php/add_textbook.php" method="post">
                    <label for="course_offering_id">Course Offering ID:</label>
                    <select id="course_offering_id" name="course_offering_id" required>
                    <?php 
                        //Need to join course_offerings term and year and course course name to the respective IDs next
                        $options = $testTextbook->getCourseOfferings();
                       
                        if(!empty($options)){
                            foreach ($options as $option) {
                                echo "<option value='{$option['course_offering_id']}'>{$option['course_offering_id']}</option>";                            }  
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