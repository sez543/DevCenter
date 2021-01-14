<?php
$sql_ui = "SELECT * FROM `privacy` WHERE 1";
$result_ui = $conn_ui->query($sql_ui);
$row_ui = $result_ui->fetch_assoc();

$privacy_terms = $row_ui["value"];