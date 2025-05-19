<?php
session_start();

$servername = "localhost";
$username = "root";
$password = ""; // You may need to replace this with your actual MySQL password
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Securely handle user inputs
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$mobnum = mysqli_real_escape_string($conn, $_POST["mob_num"]);
$pass = mysqli_real_escape_string($conn, $_POST["pass"]);

$sql = "INSERT INTO `user` (`fname`, `lname`, `email`, `mobnum`, `pass`) 
VALUES ('$fname', '$lname', '$email', '$mobnum', '$pass')";

if ($conn->query($sql) === TRUE) {
    header("Location: http://localhost/xampp/new/login.php");
    exit(); // Important to exit after redirecting
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
