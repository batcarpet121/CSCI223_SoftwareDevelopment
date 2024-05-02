<?php

// Database configuration
$host = 'localhost';
$username = 'username';
$password = 'password';
$database = 'my_database';

// Connect to MySQL database
$mysqli = new mysqli($host, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Set headers to allow CORS
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Check the HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Retrieve all items
        $result = $mysqli->query("SELECT * FROM items");
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
        break;

    case 'POST':
        // Create a new item
        $data = json_decode(file_get_contents('php://input'), true);
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $mysqli->query("INSERT INTO items (name, description, price) VALUES ('$name', '$description', '$price')");
        echo json_encode(['message' => 'Item created successfully']);
        break;

    case 'PUT':
        // Update an existing item
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $price = $data['price'];
        $mysqli->query("UPDATE items SET name='$name', description='$description', price='$price' WHERE id='$id'");
        echo json_encode(['message' => 'Item updated successfully']);
        break;

    case 'DELETE':
        // Delete an item
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'];
        $mysqli->query("DELETE FROM items WHERE id='$id'");
        echo json_encode(['message' => 'Item deleted successfully']);
        break;

    default:
        // Invalid request method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

// Close database connection
$mysqli->close();

?>