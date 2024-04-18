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

    $testTextbook = new Textbook_ds($conn);

    $textbookID = 1;
    
    $qryOutput = $testTextbook->selectSingle($textbookID);

    if($qryOutput) {
        echo $qryOutput;
    } else {
        echo "Failure";
    }
    
?>

</body>
</html>