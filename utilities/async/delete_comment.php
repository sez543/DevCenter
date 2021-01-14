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

    $sql_m = "SELECT * FROM `users` WHERE id=".$_SESSION["user"];
    $result_m = $conn->query($sql_m);
    $row_m = $result_m->fetch_assoc();

    $comment = $_POST["comment"];
    $sql = "SELECT * FROM `comments` WHERE id=$comment";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["Author"]==$_SESSION["user"] || $row_m["Is_Moderator"]=='1') {
        $sql_d = "DELETE FROM `comments` WHERE id=$comment";
        $conn->query($sql_d);
    } else {
        echo "error";
    }