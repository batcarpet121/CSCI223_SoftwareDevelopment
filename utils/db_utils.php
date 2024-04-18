<?php

function db_connect(){
    
    // Database connection parameters
    $servername = "localhost"; 
    $username = "srobinett_tracker2024@10.123.0.54"; 
    $password = "track#!2024GFC"; 
    $database = "tracker2024"; 
    
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);
     
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    echo "Connected successfully";
    
    // Close connection (optional, PHP will automatically close it at the end of the script execution)
    $conn->close();
   
    
    
}

?>