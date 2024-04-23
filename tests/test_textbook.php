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
            echo "Textbook ID: " . $result[0] . "<br>";
            echo "Course Offering ID: " . $result[1] . "<br>";
            echo "Title: " . $result[2] . "<br>";
            echo "Author: " . $result[3] . "<br>";
            echo "ISBN: " . $result[4] . "<br>";
            echo "Publisher: " . $result[5] . "<br>";
            echo "Edition: " . $result[6] . "<br>";
            echo "Price: $" . $result[7] . "<br>";
            echo "<br>";
        }        
        
    } else {
        echo "No Records found";
    }



    // echo '<br><br><br>Select all test<br>';
    // $textbookSelectFields = 'textbook_id, price';

    // $includedFields = array_flip(explode(", ", $textbookSelectFields));

    // $qryResultMultFields = $testTextbook->selectAll($textbookSelectFields);
    // print_r($qryResultMultFields);

    
    // if($qryResultMultFields){
    //     echo "<br>";
    //     foreach($qryResultMultFields as $fieldResult){
    //         if(isset($includedFields['textbook_id'])){
    //             echo 'Textbook ID: ' . $fieldResult[0] . '<br>';
    //         }
    //         if(isset($includedFields['course_offering_id'])){
    //             echo 'Course Offering ID: ' . $fieldResult[1] . '<br>';
    //         }
    //         if(isset($includedFields['title'])){
    //             echo 'Title: ' . $fieldResult[2] . '<br>';
    //         }
    //         if(isset($includedFields['author'])){
    //             echo 'Author: ' . $fieldResult[3] . '<br>';
    //         }
    //         if(isset($includedFields['isbn'])){
    //             echo 'ISBN: ' . $fieldResult[4] . '<br>';
    //         }
    //         if(isset($includedFields['publisher'])){
    //             echo 'publisher: ' . $fieldResult[5] . '<br>';
    //         }
    //         if(isset($includedFields['edition'])){
    //             echo 'Edition: ' . $fieldResult[6] . '<br>';
    //         }
    //         if(isset($includedFields['price'])){
    //             echo 'Price: $' . $fieldResult[7] . '<br>';
    //         }
    //     }         
    // } else {
    //     echo "No Records found";
    // }


    echo '<br><br><br>Select all test<br>';
    $textbookSelectField = 'textbook_id, course_offering_id, title, author, isbn, publisher, edition, price';
    $includedFields = array_flip(explode(", ", $textbookSelectField));

    $qryResultMultFields = $testTextbook->selectAll($textbookSelectField);
    print_r($qryResultMultFields);

    

    if($qryResultMultFields){
        echo "<br>";
        foreach($qryResultMultFields as $resultField){
            if(isset($includedFields['textbook_id'])){
                echo 'Textbook ID: ' . $resultField[0] . '<br>';
            }
            if(isset($includedFields['course_offering_id'])){
                echo 'Course offering ID: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['title'])){
                echo 'Title: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['author'])){
                echo 'Author: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['isbn'])){
                echo 'ISBN: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['publisher'])){
                echo 'Publisher: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['edition'])){
                echo 'Edition: ' . $resultField[1] . '<br>';
            }
            if(isset($includedFields['price'])){
                echo 'Price: $' . $resultField[1] . '<br>';
            }
            echo '<br>';
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