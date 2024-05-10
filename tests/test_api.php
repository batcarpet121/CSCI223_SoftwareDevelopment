<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Test</title>
</head>

<body>

    <h4>Api Test</h4>
   <?php
    require('../php/api.php');
    $result=  json_decode(runApi());
    var_dump($result);
   ?>
   



</body>

</html>