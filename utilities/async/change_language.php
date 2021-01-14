<?php
require("../deny_non_ajax_access.php");
$lang = $_REQUEST["lang"];
if ($lang == "BG" || $lang == "EN") {
    setcookie("language", $lang, time() + (86400 * 30), "/");
}
echo $_COOKIE["language"];