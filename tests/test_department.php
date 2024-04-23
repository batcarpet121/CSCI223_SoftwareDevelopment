<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST department Datastore</title>
</head>
<body>
    
<?php
    require '../php/department_ds.php';

    $testDepartment = new Department_ds();

    echo '<br><br><br>Select single test<br>';
    $departmentID = 1;
    $qryResult = $testDepartment->selectSingle($departmentID);   
    print_r($qryResult);

    echo '<br><br><br>Select all empty test<br>';
    $departmentSelectMult = '';
    $qryResultMult = $testDepartment->selectAll($departmentSelectMult);
    print_r($qryResultMult);

    echo '<br><br><br>Select all test<br>';
    $departmentSelectField = 'dept_id';
    $qryResultMult = $testDepartment->selectAll($departmentSelectField);
    print_r($qryResultMult);


    // echo '<br><br><br>Insert test Brandons way<br>';
    // $newDept = 'AaronsDepartment';
    // $deptInsert = $testDepartment->insert($newDept);

    echo '<br><br><br>Insert test<br>';
    $deptInsert = array(    
    'dept_name' => 'Aarons Dept 2');
    $testDepartment->insert($deptInsert);

    // $classID = 1;
    // $title = 'Insert Test';
    // $author = 'Aaron Polaske';
    // $isbn = '0123456789';
    // $publisher = 'GF Press';
    // $edition = 'Edition';
    // $price = 79.95;


    // $testTextbook->insert($classID, $title, $author, $isbn, $publisher, $edition, $price);


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