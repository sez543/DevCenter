<?php
require("../deny_non_ajax_access.php");
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$from = $_SESSION["user"];
$to = $_REQUEST["user"];
$value = $_REQUEST["rating"];

$sql = "SELECT * FROM `ratings` WHERE `first`=$from AND `second`=$to";
$result = $conn->query($sql);
if ($result->num_rows>0) {
    // Rating already exists
    $sql = "UPDATE `ratings` SET `value`=$value WHERE `first`=$from AND `second`=$to";
    $conn->query($sql);
} else {
    // No rating has been made before
    $sql = "INSERT INTO `ratings`(`first`, `second`, `value`) VALUES ('$from','$to','$value')";
    $conn->query($sql);
}

//Fetch total number of rating for this account
$sql = "SELECT * FROM `ratings` WHERE `second`=$to";
$result = $conn->query($sql);
$count = $result->num_rows;
$average = 0;
while ($row = $result->fetch_assoc()) {
    $average = $average + $row["value"];
}
$average = round($average/$count, 1);
$sql = "UPDATE `users` SET `Rating`=$average WHERE `id`=$to";
$conn->query($sql);

if ($count) {
    echo $count;
} else {
    echo "0";
}