<?php
session_start();
unset($_SESSION["user"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hope";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "";

$logname = $_POST["uname"];
$logpass = md5($_POST["password"]);



$sql = "SELECT * FROM users where username='" . $logname . "' && password='" . $logpass . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$_SESSION['user'] = $row['username'];
		$type = $row['type'];
		if ($type == 'admin') {
			header("Location: ../admin.php", true, 301);
		} else if ($type == 'user') {
			header("Location: ../home.php", true, 301);
		}
	}
} else {
	echo '<script language="javascript">';
	echo 'alert("Username Or Password not valid");';
	echo 'window.location.href="../loginsignup.php";';
	echo '</script>';
}
$conn->close();
