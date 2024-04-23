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

    // echo '<br><br><br>Insert test<br>';
    // $deptInsert = array(    
    // 'dept_name' => 'Aarons Dept 2');
    // $testDepartment->insert($deptInsert);


    echo '<br><br><br>Update test<br>';
    $deptUpdate = array(
    'dept_id' => 4,
    'dept_name' => 'Something Else');
    $testDepartment->update($deptUpdate);
    



    // $textbookDelete = '';
    
?>

</body>
</html>