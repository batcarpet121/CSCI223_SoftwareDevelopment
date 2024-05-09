<?php
$method = $_POST['method'];
require_once('course_ds.php');

// Set headers to allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//course
switch ($method) {
    case 'GET':
        // Retrieve all items

        $course_ds = new course_ds(null);
        $allResults = $course_ds->selectAll(null);
        echo json_encode($allResults);
        break;
        break;
}
