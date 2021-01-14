<?php
$sql_ui = "SELECT * FROM `tos` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$tos_terms = $row_ui["value"];