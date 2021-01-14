<?php
$sql_ui = "SELECT * FROM `jobs_page_search` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$discover = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$user_src = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$min_reward = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$max_reward = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$all_time = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$day = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$td = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$week = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$month = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$sort = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$date = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$title_s = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$reward = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$asc = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$desc = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();