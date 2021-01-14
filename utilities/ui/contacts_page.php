<?php
$sql_ui = "SELECT * FROM `contacts_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$contact_us = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$subtitle = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$your_name = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$your_email = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$subject = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$your_message = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$send = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$address = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();