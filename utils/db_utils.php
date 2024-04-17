<?php

function db_connect(){
    
    // Database connection parameters
    $servername = "localhost"; // Replace 'localhost' with your MySQL host
    $username = "srobinett_tracker2024"; // Replace 'your_username' with your MySQL username
    $password = "track#!2024GFC"; // Replace 'your_password' with your MySQL password
    $database = "tracker2024"; // Replace 'your_database' with your MySQL database name
    
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