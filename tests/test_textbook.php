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

    $textbookID = '1';

    $qryResult = $testTextbook->selectSingle($textbookID);
    
    print_r($qryResult);
    echo '<br><br><br>';
    var_dump($qryResult);

    if($qryResult) {
        echo 'What is wrong?';
    } else {
        echo 'I am bad at this';
    }
    
?>

</body>
</html>