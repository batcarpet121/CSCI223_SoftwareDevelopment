<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST Textbook Datastore</title>
</head>
<body>
    
<?php
    require '../php/textbook_ds.php';

    $testTextbook = new Textbook_ds();

    echo '<br><br><br>Select single test<br>';
    $textbookID = 1;
    $qryResult = $testTextbook->selectSingle($textbookID);   
    print_r($qryResult);

    echo '<br><br><br>Select all empty test<br>';
    $textbookSelectMult = '';
    $qryResultMult = $testTextbook->selectAll($textbookSelectMult);
    print_r($qryResultMult);

    echo '<br><br><br>Select all test<br>';
    $textbookSelectMult = 'textbook_id, author';
    $qryResultMult = $testTextbook->selectAll($textbookSelectMult);
    print_r($qryResultMult);

    // echo '<br><br><br>Insert test<br>';
    // $textbookInsert = array(    
    // 'class_id' => 1,
    // 'title' => 'Insert Test',
    // 'author' => 'Aaron Polaske',
    // 'isbn' => '0123456789',
    // 'publisher' => 'GF Press',
    // 'edition' => '3rd',
    // 'price' => 79.95);

    $classID = 1;
    $title = 'Insert Test';
    $author = 'Aaron Polaske';
    $isbn = '0123456789';
    $publisher = 'GF Press';
    $edition = 'Edition';
    $price = 79.95;


    $testTextbook->insert($classID, $title, $author, $isbn, $publisher, $edition, $price);


    // echo '<br><br><br>Update test<br>';
    // $textbookUpdate = [
    // 'class_id' => 1,
    // 'title' => 'Developing Software',
    // 'author' => 'David Thomas',
    // 'isbn' => '978-1-489-03264-9',
    // 'publisher' => 'GFCMSU',
    // 'edition' => '1st Edition',
    // 'price' => 64.00,
    // 'textbook_id' => 1];
    // $testTextbook->update($textbookUpdate);
    



    // $textbookDelete = '';
    
?>

</body>
</html>