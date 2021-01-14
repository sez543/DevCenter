<?php
$sql_ui = "SELECT * FROM `dashboard` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$dashboard = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$mods = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$users = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$joined = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$action = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$remove = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$make_mod = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();