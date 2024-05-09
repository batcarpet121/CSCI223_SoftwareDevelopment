<?php
$method = $_POST['method'];
require_once('course_ds.php');

// Set headers to allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function runApi()
{
    $course_ds = new course_ds(null);
    $allResults = $course_ds->selectAll(null);
    return json_encode($allResults);
}
// $course_ds = new course_ds(null);
// $allResults = $course_ds->selectAll(null);
// return json_encode($allResults);
// //course
// switch ($method) {
//     case 'GET':
//         // Retrieve all items

//         $course_ds = new course_ds(null);
//         $allResults = $course_ds->selectAll(null);
//         return json_encode($allResults);

//         break;
// }
