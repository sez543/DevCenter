<?php
$sql_ui = "SELECT * FROM `edit_post` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$your_posts = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$completed = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$go_to_page = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$no_permission = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$redirect = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();