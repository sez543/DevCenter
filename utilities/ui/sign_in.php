<?php
$sql_ui = "SELECT * FROM `login` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$forgotten = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$incorrect = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$not_a_member = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$register = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$error_login = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();