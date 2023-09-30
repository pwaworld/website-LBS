<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio  Form</title>
</head>
<body>
    <h1>Blog create</h1>
    <form action="blog-create.php" method="POST" enctype="multipart/form-data">


        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="subtitle">Sub Title:</label>
        <input type="text" name="subtitle" id="subtitle" required><br>

        <label for="authorname" >Authorname: </label>
        <input type="text" name="authorname" id="authorname" required><br>

        <label for="thumnail_img">thumnail_img:</label>
        <input type="file" name="thumnail_img" accept="image/*" required><br><br>

        <label for="post_img">post_img:</label>
        <input type="file" name="post_img" accept="image/*" required><br><br>

        
        <label for="video_link">video_link:</label>
        <input type="file" name="video_link" accept="video/*" ><br><br>


        <label for="metatags">metatags :</label>
        <input type="text" name="metatags" id="metatags" required><br>

     
        <label for="m_description1">description 1:</label>
        <input type="text" name="m_description1" id="m_description1" required><br>

        <label for="m_description2">description 2:</label>
        <input type="text" name="m_description2" id="m_description2" ><br>

        <label for="m_description3">description 3:</label>
        <input type="text" name="m_description3" id="m_description3" ><br>

        <label for="m_description4">description 4:</label>
        <input type="text" name="m_description4" id="m_description4" ><br>

        <label for="m_description5">description 5:</label>
        <input type="text" name="m_description5" id="m_description5" ><br>

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
$subtitle = $_POST['subtitle'];
$authorname = $_POST['authorname'];
$m_description1 = $_POST['m_description1'];
$m_description2 = $_POST['m_description2'];
$m_description3 = $_POST['m_description3'];
$m_description4 = $_POST['m_description4'];
$m_description5 = $_POST['m_description5'];
$metatags = $_POST['metatags'];

// Image upload
$target_dir = "portfolio/";
$target_file_thumnail_img = $target_dir . basename($_FILES["thumnail_img"]["name"]);
$target_file_post_img = $target_dir . basename($_FILES["post_img"]["name"]);
$target_file_video_link = $target_dir . basename($_FILES["video_link"]["name"]);

$uploadOk = 1;
$imageFileType_thumnail_img = strtolower(pathinfo($target_file_thumnail_img, PATHINFO_EXTENSION));
$imageFileType_post_img = strtolower(pathinfo($target_file_post_img, PATHINFO_EXTENSION));
$imageFileType_video_link = strtolower(pathinfo($target_file_video_link, PATHINFO_EXTENSION));


$allowed = array('png', 'jpg');

if (!in_array($imageFileType_thumnail_img, $allowed)) {
    echo "File is not an image. <br>";
    $uploadOk = 0;
}

if (!in_array($imageFileType_post_img, $allowed)) {
    echo "File is not an image . <br>";
    $uploadOk = 0;
}


// Check file size (limit it to, for example, 2MB)
if ($_FILES["thumnail_img"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB <br>";
    $uploadOk = 0;
}


// Check file size (limit it to, for example, 2MB)
if ($_FILES["post_img"]["size"] > 2000000) {
    echo "Sorry, your file is too large. Please Upload less then 2MB  <br>";
    $uploadOk = 0;
}

// Insert data into the database
$sql = "INSERT INTO blog_submissions (title, subtitle, authorname, thumnail_img, post_img, video_link, m_description1, m_description2, m_description3, m_description4, m_description5, metatags ) VALUES (?, ?, ? ,?, ?, ?,?, ?, ? ,?, ?, ?)";



if($uploadOk==1 && $title != ""){

$oldpath_thumnail_img = $_FILES['thumnail_img']['tmp_name'];
$newpath_thumnail_img ="portfolio/".$_FILES['thumnail_img']['name'];

$oldpath_post_img = $_FILES['post_img']['tmp_name'];
$newpath_post_img ="portfolio/".$_FILES['post_img']['name'];


$oldpath_video_link = $_FILES['video_link']['tmp_name'];
$newpath_video_link ="portfolio/".$_FILES['video_link']['name'];




move_uploaded_file($oldpath_thumnail_img, $newpath_thumnail_img);
move_uploaded_file($oldpath_post_img, $newpath_post_img);

move_uploaded_file($oldpath_video_link, $newpath_video_link);


$absolute_thumnail_img = realpath($newpath_thumnail_img);
$absolute_post_img = realpath($newpath_post_img);

$absolute_video_link = realpath($newpath_video_link);

print "Absolute path is: " . $absolute_thumnail_img;



if ($uploadOk==1) {

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $title, $subtitle, $authorname, $absolute_thumnail_img, $absolute_post_img, $absolute_video_link , $m_description1, $m_description2,  $m_description3, $m_description4, $m_description5, $metatags);


    

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

