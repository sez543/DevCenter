<?php
$sql_ui = "SELECT * FROM `about_us_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$who_are_we = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$first = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$our_history = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$second = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$our_mission = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$third = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();