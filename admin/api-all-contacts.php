<?php

// Database connection settings
include('config.php');

// Create a database connection
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the database (you can customize this query as needed)
$query = "SELECT id, name, email ,phoneno, categorytype, message,comments, created_at, is_active FROM contact_submissions";


$result = $mysqli->query($query);

if (!$result) {
    die("Query failed: " . $mysqli->error);
}

// Create an array to store the fetched data
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$mysqli->close();

// Set the response content type to JSON
header("Content-Type: application/json");

// Convert the PHP array to JSON and echo it
echo json_encode($data);
?>





