<?php
$sql_ui = "SELECT * FROM `job_listing` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$currency = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$posted_on = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$learn_more = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();