<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hope";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$user = $_POST["user"];


$sql = "DELETE FROM users WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
    echo 'window.location.href="../admin.php";';
    echo '</script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
