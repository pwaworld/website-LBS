<?php
// Establish a database connection (replace with your own database credentials)
$mysqli = new mysqli("localhost", "root", "mysql", "lbs-demo");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the database (you can customize this query as needed)
$query = "SELECT id, title, subtitle, thumnail_img, post_img ,video_link, m_description, created_at FROM portfolio_submissions";


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





