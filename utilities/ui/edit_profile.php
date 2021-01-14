<?php
$sql_ui = "SELECT * FROM `edit_profile` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$upload = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$description = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$resume = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$portfolio = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$edit = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();