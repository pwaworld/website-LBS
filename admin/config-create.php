<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LBS</title>
</head>
<body>
    <h1>Create Config : </h1>
    <form action="config-create.php" method="POST" enctype="multipart/form-data">
        <label for="m_key">Key:</label>
        <input type="text" name="m_key" id="m_key" required><br>
     
        <label for="m_link">Link:</label>
        <input type="file" name="m_link" accept="image/*" required><br><br>

        <label for="m_text">Text:</label>
        <input type="text" name="m_text" id="m_text" required><br>

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
$m_key = $_POST['m_key'];
$m_text = $_POST['m_text'];


// Image upload
$target_dir = "uploads/";
$target_file_link = $target_dir . basename($_FILES["m_link"]["name"]);

$uploadOk = 1;
$imageFileType_link = strtolower(pathinfo($target_file_link, PATHINFO_EXTENSION));


$allowed = array('png', 'jpg');

if (!in_array($imageFileType_link, $allowed)) {
    echo "File is not an image. <br>";
    $uploadOk = 0;
}



// Check file size (limit it to, for example, 2MB)
if ($_FILES["m_link"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB <br>";
    $uploadOk = 0;
}



// Insert data into the database
$sql = "INSERT INTO lbs_config (m_key, m_link, m_text) VALUES (?, ?, ?)";


if($uploadOk==1 && $m_key != ""){

$oldpath_link = $_FILES['m_link']['tmp_name'];
$newpath_link ="lbssource/".$_FILES['m_link']['name'];



move_uploaded_file($oldpath_link, $newpath_link);



$absolute_path_link = realpath($newpath_link);


print "Absolute path is: " . $absolute_path_link;



if ($uploadOk==1) {

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $m_key, $absolute_path_link, $m_text);

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

