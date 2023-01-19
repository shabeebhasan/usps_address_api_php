<?php
include 'config.php';

$servername = constant("SERVER_NAME");;
$username = constant("USERNAME");;
$password = constant("PASSWORD");;
$databaseName = constant("DATABASENAME");;

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "CREATE DATABASE $databaseName";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

?>