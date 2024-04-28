
<?php

require("../php/textbook_ds.php");
$textbookConn = new Textbook_ds();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $course_offering_id = $_POST['course_offering_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $publisher = $_POST['publisher'];
    $edition = $_POST['edition'];
    $price = $_POST['price'];
    
    $inserting = $textbookConn->insert($course_offering_id, $title, $author, $isbn, $publisher, $edition, $price);

    if($inserting){
        echo("Successful insert");
    }
    else{
        echo("Failed insert");
    }
}

?>