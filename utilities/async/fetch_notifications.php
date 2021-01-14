<?php
require("../deny_non_ajax_access.php");
$servername = "localhost";
$username = "root";
$password = "";
$database = "dev";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["user"];

$sql_con = "SELECT * FROM `conversations` WHERE (`user_2`=".$user." OR `user_1`=".$user.") AND is_read=0 AND last_message_by!=".$user;
$result_con = $conn->query($sql_con);
echo $result_con->num_rows;