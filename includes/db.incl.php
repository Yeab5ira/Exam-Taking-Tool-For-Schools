<?php
// $dbServerName = "remotemysql.com";
// $dbUsername = "0k4AroPFdN";
// $dbPassword = "oReFihvo5F";
// $dbName = "0k4AroPFdN";

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "0k4AroPFdN";


// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>