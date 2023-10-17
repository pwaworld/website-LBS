<?php
// Database connection settings
include('config.php');


echo $_GET['id'];

// Create a database connection
$mysqli = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


// Retrieve form data
$id = $_GET['id'];

// sql to delete a record
$sql = "DELETE FROM lbs_config WHERE id= ?";


$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $id);

if ($stmt->execute()) {
    echo "Submission successful!";
} else {
    echo "Error: " . $conn->error;
}

// Create an array to store the fetched data
$data = [];

// Close the database connection
$mysqli->close();

// Set the response content type to JSON
header("Content-Type: application/json");

// Convert the PHP array to JSON and echo it
echo json_encode($data);
?>





