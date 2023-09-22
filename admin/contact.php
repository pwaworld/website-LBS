<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="4" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
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

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO submissions (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "Submission successful!";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
