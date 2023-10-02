<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LBS</title>
</head>


<body>
    <h1>Create Contact :</h1>
    <form action="contact-create.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

     

        <label for="name">Phone Number:</label>
        <input type="text" name="phoneno" id="phoneno" required><br>

        <label for="categorytype">category type:</label>
       

        <select name="categorytype" id="categorytype" required>
    <option value="vfx">Vfx</option>
    <option value="animation">animation</option>
    <option value="3d">3D</option>
    <option value="others">Others</option>
   
  </select> <br>


        <label for="comments">comments:</label>
        <input type="text" name="comments" id="phoneno" required><br>


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
$phoneno = $_POST['phoneno'];
$categorytype = $_POST['categorytype'];
$comments = $_POST['comments'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO contact_submissions (name, email, phoneno, categorytype, message, comments) VALUES (?, ?, ? ,? , ?, ?)";



$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $phoneno,$categorytype, $message, $comments);

if ($stmt->execute()) {
    echo "Submission successful!";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>




