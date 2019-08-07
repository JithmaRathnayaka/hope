<?php
$servername="localhost";
$username="root";
$password="";
$dbname="hope";

$conn= new mysqli($servername,$username,$password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$fname= $_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];
$username=$_POST["Username"];
$pass=md5($_POST["password"]);


$sql = "INSERT INTO users(fname,lname,email,username,password) VALUES ('$fname','$lname','$email','$username','$pass')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'alert("Account Created Please log in");';
	echo 'window.location.href="../loginsignup.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

