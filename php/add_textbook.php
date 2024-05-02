<!DOCTYPE html>
<html>

<head>
    <title>Redirecting to Another page in HTML</title>
    <!-- Redirecting to another page using meta tag -->
    <meta http-equiv="refresh" content="5; url =../php/textbook_form.php" />
</head>

<body>
    <?php

    require("../php/textbook_ds.php");
    $textbookConn = new Textbook_ds();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $values = [
            'course_offering_id' => $_POST['course_offering_id'],
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'isbn' => $_POST['isbn'],
            'publisher' => $_POST['publisher'],
            'edition' => $_POST['edition'],
            'price' => $_POST['price'],
            'date_added' => $_POST['date_added']
        ];

        $rowsAffected = $textbookConn->insert($values);

        if ($rowsAffected == 1) {
            echo ("<p>Successful insert</p>");
        } else {
            echo ("<p>Failed insert</p>");
        }
    }


    ?>
    <h3>
        Redirecting to Another page in HTML
    </h3>
    <p><strong>Note:</strong> If your browser supports Refresh, you'll be
        redirected to the Registration/Login page, in 5 seconds.
    </p>
</body>

</html>