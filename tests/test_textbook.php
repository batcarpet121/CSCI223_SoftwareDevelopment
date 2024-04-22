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
    $textbookID = '1';
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

    echo '<br><br><br>Insert test<br>';
    $textbookInsert = array(1, 'Insert Test', 'Aaron Polaske', '0123456789', 'GF Press', '3rd', 79.95 );

    $testTextbook->insert($textbookInsert);


    $textbookUpdate = '';
    $textbookDelete = '';
    
?>

</body>
</html>