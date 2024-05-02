<!DOCTYPE html>
<html>

<head>
    <title>Redirecting to Another page in HTML</title>
    <!-- Redirecting to another page using meta tag -->
    <meta http-equiv="refresh" content="5; url =../php/textbook_form.php" />
    <script>
        window.onload = function() {
            var countdownElement = document.getElementById('countdown');
            var countdownTime = parseInt(countdownElement.innerText);

            var countdownInterval = setInterval(function() {
                countdownTime--;
                countdownElement.innerText = countdownTime;

                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                }
            }, 1000);
        };
    </script>
</head>

<body>
    <?php

    require("../php/textbook_ds.php");
    $textbookConn = new Textbook_ds();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $values = [
            'textbook_id' => $_POST['textbook_id'],
            'course_offering_id' => $_POST['course_offering_id'],
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'isbn' => $_POST['isbn'],
            'publisher' => $_POST['publisher'],
            'edition' => $_POST['edition'],
            'price' => $_POST['price'],
            'date_added' => $_POST['date_added']
        ];


        $rowsAffected = $textbookConn->update($values);

        if ($rowsAffected == 1) {
            echo ("<p>Successful update</p>");
        } else {
            echo ("<p>Failed update</p>");
        }
    }


    ?>
    <h3>
        Redirecting to Another page in HTML
    </h3>
    <p><strong>Note:</strong> If your browser supports Refresh, you'll be
        redirected to the add textbook page, in <span id="countdown">5</span> seconds.
    </p>
</body>

</html>