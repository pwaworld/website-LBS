<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LBS</title>
</head>
<body>
    <h1>Create Project : </h1>
    <form action="project-create.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>
     
        <label for="small_image">small_image:</label>
        <input type="file" name="small_image" accept="image/*" required><br><br>

        <label for="big_image">Big Image:</label>
        <input type="file" name="big_image" accept="image/*" required><br><br>

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
$title = $_POST['title'];

// Image upload
$target_dir = "uploads/";
$target_file_small = $target_dir . basename($_FILES["small_image"]["name"]);
$target_file_big = $target_dir . basename($_FILES["big_image"]["name"]);
$uploadOk = 1;
$imageFileType_small = strtolower(pathinfo($target_file_small, PATHINFO_EXTENSION));
$imageFileType_big = strtolower(pathinfo($target_file_big, PATHINFO_EXTENSION));


$allowed = array('png', 'jpg');

if (!in_array($imageFileType_small, $allowed)) {
    echo "File is not an image. <br>";
    $uploadOk = 0;
}

if (!in_array($imageFileType_big, $allowed)) {
    echo "File is not an image . <br>";
    $uploadOk = 0;
}


// Check file size (limit it to, for example, 2MB)
if ($_FILES["small_image"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB <br>";
    $uploadOk = 0;
}


// Check file size (limit it to, for example, 2MB)
if ($_FILES["big_image"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB  <br>";
    $uploadOk = 0;
}

// Insert data into the database
$sql = "INSERT INTO project_submissions (title, small_img, big_img) VALUES (?, ?, ?)";


if($uploadOk==1 && $title != ""){

$oldpath_small = $_FILES['small_image']['tmp_name'];
$newpath_small ="projects/".$_FILES['small_image']['name'];

$oldpath_big = $_FILES['big_image']['tmp_name'];
$newpath_big ="projects/".$_FILES['big_image']['name'];


move_uploaded_file($oldpath_small, $newpath_small);
move_uploaded_file($oldpath_big, $newpath_big);


$absolute_path_small = realpath($newpath_small);
$absolute_path_big = realpath($newpath_big);

print "Absolute path is: " . $absolute_path;



if ($uploadOk==1) {

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $absolute_path_small, $absolute_path_big);

    if ($stmt->execute()) {
        echo "<h2> Record saved successful! </h2> <br>";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
$stmt->close();
$conn->close();

}


}else{
    echo "<h2> <br> Sorry, Error while upload </h2>";
}




?>

