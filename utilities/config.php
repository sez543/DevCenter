<?php
    if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
        header("Location: ../403.php");
    }
    date_default_timezone_set('Europe/Helsinki');

    session_start();
    
    if (!isset($_COOKIE["theme"])) {
        setcookie("theme", "light", time() + (86400 * 30), "/");
    }

    if (!isset($_COOKIE["language"])) {
        setcookie("language", "BG", time() + (86400 * 30), "/");
    }

    // Main database
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

    // UI database
    if (!isset($_COOKIE["language"])) {
        $database = "ui_en";
    } else {
        if ($_COOKIE["language"]=="EN") {
            $database = "ui_bg";
        } else {
            $database = "ui_en";
        }
    }

    $conn_ui = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn_ui->connect_error) {
        die("Connection failed: " . $conn_ui->connect_error);
    }

    require("fetch_ui.php");