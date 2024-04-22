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

    echo 'Select single test';
    $textbookID = '1';
    $qryResult = $testTextbook->selectSingle($textbookID);   
    print_r($qryResult);

    echo 'Select all test';
    $textbookSelectMult = '';
    $qryResultMult = $testTextbook->selectAll($textbookSelectMult);
    print_r($qryResultMult);

    
?>

</body>
</html>