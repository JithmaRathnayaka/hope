<?php
$user = "$_SESSION[user]";

$servername="localhost";
$username="root";
$password="";
$dbname="hope";

$conn= new mysqli($servername,$username,$password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$id= $_GET["id"];

$sql = "DELETE FROM articles WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../admin.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
