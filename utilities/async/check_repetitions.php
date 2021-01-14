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

    $value_mail = $_REQUEST["mail"];
    $value_phone = $_REQUEST["phone"];
    $value_mail = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($value_mail))));
    $value_phone = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($value_phone))));
    $sql = "SELECT * FROM `users` WHERE mail='$value_mail'";
    $result = $conn->query($sql);
    if ($result->num_rows>=1) {
        echo "true ";
    } else {
        echo "false ";
    }
    $sql = "SELECT * FROM `users` WHERE Phone_Number='$value_phone'";
    $result = $conn->query($sql);
    if ($result->num_rows>=1) {
        echo "true";
    } else {
        echo "false";
    }

    $conn->close();