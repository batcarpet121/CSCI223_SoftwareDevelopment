<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Update Textbook</title>
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
            <a href="../php/textbook_form.php">Textbook Update Form</a>
        </div>
    </header>

    <div class="container">
        <div id="sideBar">
            <h2>
                All textbooks
            </h2>
            <p>
                <?php
                require_once("../php/textbook_ds.php");
                require_once("../php/textbook_join_tables.php");
                $tableJoins = new Textbook_Join();
                $testTextbook = new Textbook_ds();


                $qryResult = $testTextbook->selectAll('');
                if ($qryResult) {
                    foreach ($qryResult as $result) {
                        echo "Textbook ID: " . $result[0] . "<br>";
                        echo "Course Offering ID: " . $result[1] . "<br>";
                        echo "Title: " . $result[2] . "<br>";
                        echo "Author: " . $result[3] . "<br>";
                        echo "ISBN: " . $result[4] . "<br>";
                        echo "Publisher: " . $result[5] . "<br>";
                        echo "Edition: " . $result[6] . "<br>";
                        echo "Price: $" . $result[7] . "<br>";
                        echo "Date Added: " . $result[8] . "<br>";
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
                Update Textbook
            </h2>
            <div class="formWrapper">
                <form action="../php/update_textbook.php" method="post">
                    <label for="textbook_id">Textbook ID:</label>
                    <select id="textbook_id" name="textbook_id" required>
                        <?php
                        $textbooks = $testTextbook->selectAll('');
                        foreach ($textbooks as $textbook) {
                            echo "<option value='{$textbook[0]}'>" . $textbook[0] . " - " . $textbook[2] . "</option>";
                        }

                        ?>

                    </select><br><br>
                    <label for="course_offering_id">Course Offering ID:</label>
                    <select id="course_offering_id" name="course_offering_id" required>
                        <?php
                        $options = $tableJoins->getCourseOfferings();
                        foreach ($options as $option) {
                            echo "<option value='{$option[0]}'>{$option[0]} -- {$option[3]} {$option[1]} {$option[2]}</option>";
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

                    <input type="submit" value="Update Textbook" id="submitTextbook">
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