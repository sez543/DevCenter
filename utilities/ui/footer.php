<?php
$sql_ui = "SELECT * FROM `footer` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$footer_text = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$copyright = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$technologies = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$useful_links = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$your_account = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$blog = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$privacy = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$tos = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$contacts = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();