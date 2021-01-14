<?php
require("../deny_non_ajax_access.php");
$theme = $_REQUEST["theme"];
setcookie("theme", $theme, time() + (86400 * 30), "/");