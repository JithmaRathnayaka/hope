<?php
session_start();echo 
$user=$_SESSION['user'];

$servername="localhost";
$username="root";
$password="";
$dbname="hope";

$conn= new mysqli($servername,$username,$password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$Category= $_POST["Category"];
$Amount=$_POST["Amount"];
$province=$_POST["province"];
$Contact=$_POST["Contact"];
$Notes=$_POST["Notes"];


$sql = "INSERT INTO donationrequests(user,Category,Amount,Province,Contact,Notes) 
VALUES ('$user','$Category','$Amount','$province','$Contact','$Notes')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Request has been sent");';
	echo 'window.location.href="../home.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

