<?php
$sql_ui = "SELECT * FROM `404` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$err_404 = $row_ui["value"];
$row_ui = $result_ui->fetch_assoc();