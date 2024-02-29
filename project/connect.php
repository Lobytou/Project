<?php
$dbHost = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testedrive";

// Create connection
$conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//echo "<br>"
?>