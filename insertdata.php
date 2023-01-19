<?php
include 'config.php';

function insertData($address_line1, $address_line2, $city, $state, $zipcode)
{
  $servername = constant("SERVER_NAME");
  $username = constant("USERNAME");
  $password = constant("PASSWORD");
  $databaseName = constant("DATABASENAME");
  // Create connection
  $conn = new mysqli($servername, $username, $password, $databaseName);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO Address (address_line1, address_line2, city,state,zipcode)
VALUES ('$address_line1','$address_line2', '$city','$state','$zipcode')";
  $reponse = [];
  if ($conn->query($sql) === TRUE) {
    $reponse = ['success' => 'Address Saved Sucessfully.'];
  } else {
    $reponse = ['error' => 'Error in Posted Data.'];
  }
  $conn->close();
  return $reponse;
}

if ($_POST["city"] && $_POST["zipcode"] && $_POST["address_line_1"] && $_POST["address_line_2"] && $_POST["state"]) {
  try {
    $validate_result = insertData($_POST["address_line_1"], $_POST["address_line_2"], $_POST["city"], $_POST["state"], $_POST["zipcode"]);
  } catch (Exception $e) {
    $validate_result = array('error' => 'Error in Posted Data.');
  }
  print_r(json_encode($validate_result));
} else {
  print_r(
    json_encode(
      array(
        "error" => 1,
      )
    )
  );
}