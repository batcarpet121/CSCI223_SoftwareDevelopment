<?php

// Function db_connect()
// PARAMS - None
// RETURNS instance of mysqli
// caller should check $conn->connect_error. values are 
//              null on success
//              error number on fail
//          

function db_connect()
{

    // Database connection params   
    $servername = "localhost";
    $username = "srobinett_tracker2024";
    $password = "Track##2024";
    $database = "srobinett_tracker2024";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return $conn;
    } else {
        return $conn;
    }


    echo "Connected successfully";

    // Close connection (optional, PHP will automatically close it at the end of the script execution)
    $conn->close();
}
