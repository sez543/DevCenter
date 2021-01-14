<?php
require("../deny_non_ajax_access.php");
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

    $mail = $_POST["email"];
    $password = $_POST["password"];

    $mail = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($mail))));
    $password = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($password))));

    $sql = "SELECT * FROM `users` WHERE mail='$mail'";
    $result = $conn->query($sql);
    if ($result->num_rows==0) {
        echo "false";
    } else {
        $row = $result->fetch_assoc();
        if (md5($password)==$row["password"]) {
            echo "true";
        } else {
            echo "false";
        }
    }