<?php
$sql_ui = "SELECT * FROM `create_post` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$spam = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$create = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$err = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();