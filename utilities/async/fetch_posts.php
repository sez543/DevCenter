<?php
require("../deny_non_ajax_access.php");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "dev";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $main = $_REQUEST["main"];
    $user = $_REQUEST["user"];
    $date = $_REQUEST["date"];
    $min = $_REQUEST["min"];
    $max = $_REQUEST["max"];
    $sort = $_REQUEST["sort"];
    $order = $_REQUEST["order"];

    if (empty($min)) {
        $min = 0;
    }
    if (empty($max)) {
        $max = PHP_INT_MAX;
    }

    $main = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($main))));
    $user = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($user))));
    $date = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($date))));
    $min = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($min))));
    $max = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($max))));
    $sort = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($sort))));

    switch ($sort) {
        case "default":
            $Column = "`Date`";
            break;
        case "Date":
            $Column = "`Date`";
            break;
        case "Title":
            $Column = "`Title`";
            break;
        case "Reward":
            $Column = "`Reward`";
            break;
        case "User":
            $Column = "CONCAT(First_Name, ' ', Last_Name)";
            break;
    }

    $current_time = time();
    switch ($date) {
        case "all":
            $back = 0;
            break;
        case "today":
            $back = $current_time - 60*60*24;
            break;
        case "td":
            $back = $current_time - 3*60*60*24;
            break;
        case "week":
            $back = $current_time - 7*60*60*24;
            break;
        case "month":
            $back = $current_time - 30*60*60*24;
            break;
    }

    $sql = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM `posts` LEFT JOIN `users` ON posts.Author = users.id WHERE `Title` LIKE '$main%' AND `Is_Finished`='0' AND `Reward` >= $min AND `Reward` <= $max AND `Date` >= $back AND CONCAT(users.First_Name, ' ', users.Last_Name) LIKE '$user%' ORDER BY $Column $order";
    $result = $conn->query($sql);
    $rows = array();
    while ($r = mysqli_fetch_assoc($result)) {
        $r["Date"] = gmdate("d/m/Y - h:i:sa", $r["Date"]);
        $rows[] = $r;
    }
    print json_encode($rows);