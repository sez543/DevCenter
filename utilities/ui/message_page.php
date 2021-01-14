<?php
$sql_ui = "SELECT * FROM `message_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$send_message_to_start = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$please_enter_message = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$me = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$message_to = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$personal = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$personal_short = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$me_alt = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();