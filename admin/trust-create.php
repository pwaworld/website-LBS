<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LBS</title>
</head>
<body>
    <h1>Create Trusted Profile : </h1>
    <form action="trust-create.php" method="POST" enctype="multipart/form-data">
        
    
    <label for="clientname">clientname:</label>
        <input type="text" name="clientname" id="clientname" required><br>


    <label for="comments">comments:</label>
        <input type="text" name="comments" id="comments" required><br>
     
        <label for="small_image">small_image:</label>
        <input type="file" name="small_image" accept="image/*" required><br><br>

        

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
$comments = $_POST['comments'];
$clientname = $_POST['clientname'];

// Image upload
$target_dir = "uploads/";
$target_file_small = $target_dir . basename($_FILES["small_image"]["name"]);

$uploadOk = 1;
$imageFileType_small = strtolower(pathinfo($target_file_small, PATHINFO_EXTENSION));



$allowed = array('png', 'jpg');

if (!in_array($imageFileType_small, $allowed)) {
    echo "File is not an image. <br>";
    $uploadOk = 0;
}



// Check file size (limit it to, for example, 2MB)
if ($_FILES["small_image"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB <br>";
    $uploadOk = 0;
}



// Insert data into the database
$sql = "INSERT INTO trusted_submissions (comments, clientname, small_img) VALUES (?, ?, ?)";




if($uploadOk==1 && $comments != ""){

$oldpath_small = $_FILES['small_image']['tmp_name'];
$newpath_small ="projects/".$_FILES['small_image']['name'];




move_uploaded_file($oldpath_small, $newpath_small);



$absolute_path_small = realpath($newpath_small);


print "Absolute path is: " . $absolute_path_small;



if ($uploadOk==1) {

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $comments, $clientname, $absolute_path_small);

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

