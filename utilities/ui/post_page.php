<?php
$sql_ui = "SELECT * FROM `post_page` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$be_the_first = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$your_comment = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$row_ui = $result_ui->fetch_assoc();

$mark_as_active = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$mark_as_done = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$delete_post = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$login_user = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$to_send = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$no_comments = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$comments = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$delete_comment = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();

$cannot_send = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();