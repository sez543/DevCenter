<?php
$sql_ui = "SELECT * FROM `profile_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$user_score = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$edit_profile = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$create_a_listing = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$edit_existing_listings = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();
$row_ui = $result_ui->fetch_assoc();

$recent_activity = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$messages = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$open_conversation = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$send_message = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$no_user_scores = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();