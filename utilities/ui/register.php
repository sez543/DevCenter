<?php
$sql_ui = "SELECT * FROM `register` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$first_name = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$last_name = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$email_taken = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$password = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$password_req = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$phone = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$login = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$phone_taken = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$by_clicking = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$you_agree = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$and = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();