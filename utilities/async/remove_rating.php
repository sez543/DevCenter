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
$comment = $_POST["comment"];

$sql_comment_data = "SELECT Likes, Dislikes FROM `comments` WHERE id=$comment";
$result_comment_data = $conn->query($sql_comment_data);
$row_comment_data = $result_comment_data->fetch_assoc();
$current_likes = $row_comment_data["Likes"];
$current_dislikes = $row_comment_data["Dislikes"];

$sql_existing = "SELECT * FROM `comment_rating` WHERE user_from=$from AND comment=$comment";
$result_existing = $conn->query($sql_existing);
$row_existing = $result_existing->fetch_assoc();

if ($row_existing["is_positive"]==0) {
    $current_dislikes--;
} else {
    $current_likes--;
}

$sql = "UPDATE `comments` SET `Likes`=$current_likes,`Dislikes`=$current_dislikes WHERE id=$comment";
$conn->query($sql);

$sql = "DELETE FROM `comment_rating` WHERE user_from=$from AND comment=$comment";
$conn->query($sql);

$rating = ["Likes"=>$current_likes, "Dislikes"=>$current_dislikes];
print json_encode($rating);