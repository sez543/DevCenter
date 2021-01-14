<?php
$sql_ui = "SELECT * FROM `index_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$title_index = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$button = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$from_today = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$no_new_listings_have_been_posted_today = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$here = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();