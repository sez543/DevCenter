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

$rating = $_POST["rating"];
if ($rating=="like") {
    $rt = 1;
} else {
    $rt = 0;
}
$from = $_SESSION["user"];
$comment = $_POST["comment"];

//Fetch comment likes/dislikes
$sql_comment_data = "SELECT Likes, Dislikes FROM `comments` WHERE id=$comment";
$result_comment_data = $conn->query($sql_comment_data);
$row_comment_data = $result_comment_data->fetch_assoc();
$current_likes = $row_comment_data["Likes"];
$current_dislikes = $row_comment_data["Dislikes"];

//Fetch previous user score
$sql_existing = "SELECT * FROM `comment_rating` WHERE user_from=$from AND comment=$comment";
$result_existing = $conn->query($sql_existing);

if ($result_existing->num_rows==0) {
    $sql = "INSERT INTO `comment_rating`(`user_from`, `comment`, `is_positive`) VALUES ($from,$comment,$rt)";
    $conn->query($sql);
    if ($rt == 1) {
        $current_likes++;
    } else {
        $current_dislikes++;
    }
} else {
    $row_existing = $result_existing->fetch_assoc();
    if ($row_existing["is_positive"]==1) {
        $current_likes--;
    } else {
        $current_dislikes--;
    }
    $sql = "UPDATE `comment_rating` SET `is_positive`=$rt WHERE `user_from`='$from' AND `comment`='$comment'";
    if ($conn->query($sql)===true) {
        if ($rt == 1) {
            $current_likes++;
        } else {
            $current_dislikes++;
        }
    }
}

$sql = "UPDATE `comments` SET `Likes`=$current_likes,`Dislikes`=$current_dislikes WHERE id=$comment";
if ($conn->query($sql)===true) {
    $rating = ["Likes"=>$current_likes, "Dislikes"=>$current_dislikes];
    print json_encode($rating);
}