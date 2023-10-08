<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LBS</title>
</head>
<body>
    <h1>Create Job Profile :</h1>
    <form action="job-create.php" method="post">
        <label for="role">Role:</label>
        <input type="text" name="role" id="role" required><br>

        <label for="experience">Experience:</label>
        <input type="text" name="experience" id="experience" required><br>
     

        <label for="jobtype">Jobtype:</label>

        <select name="jobtype" id="cars" required>
    <option value="Intern">Intern</option>
    <option value="Full Time">Full Time</option>
    <option value="FreeLancer">FreeLancer</option>
   
  </select>

  <br>

      

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" required><br>

        <label for="department">department:</label>
        <input type="text" name="department" id="department" required><br>

        <label for="jobdetails">Job Details:</label>
        <textarea name="jobdetails" id="jobdetails" rows="4" required></textarea><br>
       
        <input type="submit" value="Submit">
    </form>
</body>
</html>



<?php
// Database connection settings
include('config.php');

// Create a database connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$role = $_POST['role'];
$experience = $_POST['experience'];
$jobtype = $_POST['jobtype'];
$location = $_POST['location'];
$department = $_POST['department'];
$jobdetails = $_POST['jobdetails'];


// Insert data into the database
$sql = "INSERT INTO job_profile_submissions (role,experience, jobtype, location, department, jobdetails) VALUES (?, ?, ? ,? , ?, ?)";



$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $role, $experience, $jobtype,$location, $department, $jobdetails);

if ($stmt->execute()) {
    echo "Submission successful!";
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$stmt->close();
$conn->close();
?>
