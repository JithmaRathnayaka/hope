<?php
session_start();

// Create database connection
$db = mysqli_connect("localhost", "root", "", "hope");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['submit'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $articlename = $_POST['articlename'];
    $description = $_POST['description'];

    //get user from session
    
    $user = "$_SESSION[user]";


    // image file directory
    $target = "../uploads/" . basename($image);

    $sql = "INSERT INTO articles (articlename,image, description,user) VALUES ('$articlename','$image', '$description','$user')";
    // execute query
    mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo '<script language="javascript">';
        echo 'alert("Article Added");';
        echo 'window.location.href="../articles.php";';
        echo '</script>';
        $msg = "Image uploaded successfully";
    } else {
        echo '<script language="javascript">';
        echo 'alert("Upload Failed");';
        echo 'window.location.href="../articles.php";';
        echo '</script>';
        $msg = "Failed to upload image";
    }
}
