<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
   
</body>
</html>

<?php
// Database connection settings
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'mysql';
$dbName = 'lbs-demo';

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT * FROM submissions";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<h2>Contact Form Submissions</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Date</th></tr>";

    // Loop through the data and display it in a table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["message"] . "</td>";
        echo "<td>" . $row["created_at"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>



