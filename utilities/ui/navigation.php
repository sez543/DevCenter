<?php
$sql_ui = "SELECT * FROM `navigation` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$title = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$home = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$jobs = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$about = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$contacts = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$sign_in = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$register = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$my_posts = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$view_all_messages = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$no_new_messages = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$unread_messages_from = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$by = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$about_post = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$sign_out = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$last_message = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$moderator = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$admin = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();