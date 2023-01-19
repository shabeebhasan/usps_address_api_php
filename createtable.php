<?php 
include 'config.php';

$servername = constant("SERVER_NAME");;
$username = constant("USERNAME");;
$password = constant("PASSWORD");;
$databaseName = constant("DATABASENAME");

$conn = mysqli_connect($servername, $username, $password, $databaseName);

$sql = "CREATE TABLE Address (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
address_line1 VARCHAR(200) NOT NULL,
address_line2 VARCHAR(200) NOT NULL,
city VARCHAR(100) NOT NULL,
state VARCHAR(5) NOT NULL,
zipcode VARCHAR(10) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Address created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();