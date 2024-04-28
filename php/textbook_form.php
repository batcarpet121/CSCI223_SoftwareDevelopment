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
                require("../php/textbook_ds.php");

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
                            $placeholders = array_fill(0, 8, '0');
    
                            $fieldMapping = [
                                'textbook_id' => 0,
                                'course_offering_id' => 1,
                                'title' => 2,
                                'author' => 3,
                                'isbn' => 4,
                                'publisher' => 5,
                                'edition' => 6,
                                'price' => 7
                            ];
                            
                            $textbookSelectFields = ['course_offering_id'];

                            foreach ($textbookSelectFields as $field) {
                                if (array_key_exists($field, $fieldMapping)) {
                                    $placeholders[$fieldMapping[$field]] = $field;
                                }
                            }

                            $sqlFields = implode(", ", $placeholders);
                            $includedFields = array_flip(explode(", ", $sqlFields));
                            
                            $qryResultMultSelect = $testTextbook->selectAll($sqlFields);

                            while ($row = $result->fetch_assoc()) {
                                $id = $row['course_offering_id'];
                                echo '<option value="'.htmlspecialchars($id).'"></option>';
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