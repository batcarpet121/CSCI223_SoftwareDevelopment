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
    if ($qryResult) {
        echo '<br>';
        echo "Textbook ID: " . $qryResult[0] . "<br>";
        echo "Course Offering ID: " . $qryResult[1] . "<br>";
        echo "Title: " . $qryResult[2] . "<br>";
        echo "Author: " . $qryResult[3] . "<br>";
        echo "ISBN: " . $qryResult[4] . "<br>";
        echo "Publisher: " . $qryResult[5] . "<br>";
        echo "Edition: " . $qryResult[6] . "<br>";
        echo "Price: " . $qryResult[7] . "<br>";
        echo "<br>";
    } else {
        echo "No record found for the given key.";
    }




    echo '<br><br><br>Select all empty test<br>';
    $textbookSelectMult = '';
    $qryResultMult = $testTextbook->selectAll($textbookSelectMult);
    print_r($qryResultMult);
    if($qryResultMult){
        foreach($qryResultMult as $result){
            echo '<br>';
            echo "Textbook ID: " . $qryResult[0] . "<br>";
            echo "Course Offering ID: " . $qryResult[1] . "<br>";
            echo "Title: " . $qryResult[2] . "<br>";
            echo "Author: " . $qryResult[3] . "<br>";
            echo "ISBN: " . $qryResult[4] . "<br>";
            echo "Publisher: " . $qryResult[5] . "<br>";
            echo "Edition: " . $qryResult[6] . "<br>";
            echo "Price: $" . $qryResult[7] . "<br>";
            echo "<br>";
        }        
        
    } else {
        echo "No Records found";
    }



    echo '<br><br><br>Select all test<br>';
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
    
    $textbookSelectFields = ['textbook_id', 'author', 'price'];
    
    foreach ($textbookSelectFields as $field) {
        if (array_key_exists($field, $fieldMapping)) {
            $placeholders[$fieldMapping[$field]] = $field;
        }
    }

    $sqlFields = implode(", ", $placeholders);
    $includedFields = array_flip(explode(", ", $sqlFields));
    
    $qryResultMultSelect = $testTextbook->selectAll($sqlFields);
    print_r($qryResultMultSelect);
    
    if($qryResultMultSelect){
        echo "<br>";
        foreach($qryResultMultSelect as $result){
            if(isset($includedFields['textbook_id'])){
                echo 'Textbook ID: ' . $result[0] . '<br>';
            }
            if(isset($includedFields['course_offering_id'])){
                echo 'Course Offering ID: ' . $result[1] . '<br>';
            }
            if(isset($includedFields['title'])){
                echo 'Title: ' . $result[2] . '<br>';
            }
            if(isset($includedFields['author'])){
                echo 'Author: ' . $result[3] . '<br>';
            }
            if(isset($includedFields['isbn'])){
                echo 'ISBN: ' . $result[4] . '<br>';
            }
            if(isset($includedFields['publisher'])){
                echo 'Publisher: ' . $result[5] . '<br>';
            }
            if(isset($includedFields['edition'])){
                echo 'Edition: ' . $result[6] . '<br>';
            }
            if(isset($includedFields['price'])){
                echo 'Price: $' . $result[7] . '<br>';
            }
        }
    } else {
        echo "No Records found";
    }

    // echo '<br><br><br>Insert test<br>';
    // $textbookInsert = array(    
    //     'course_offering_id' => 1,
    //     'title' => 'Insert Test',
    //     'author' => 'Aaron Polaske',
    //     'isbn' => '0123456789',
    //     'publisher' => 'GF Press',
    //     'edition' => '3rd',
    //     'price' => 79.95);
    // $testTextbook->insert($textbookInsert);

    // echo '<br><br><br>Update test<br>';
    // $textbookUpdate = array(
    //     'textbook_id' => 10,  
    //     'course_offering_id' => 1,
    //     'title' => 'Insert Test',
    //     'author' => 'Aaron Polaske',
    //     'isbn' => '0123456789',
    //     'publisher' => 'GF Press',
    //     'edition' => '3rd',
    //     'price' => 79.95);
    // $testTextbook->update($textbookUpdate);
    
    // echo '<br><br><br>Delete test<br>';
    // $deleteID = 10;
    // $testTextbook->delete($deleteID);
?>

</body>
</html>