<?php
require("../deny_non_ajax_access.php");
session_start();

if (!isset($_COOKIE["language"])) {
    $lang = "BG";
} else {
    if ($_COOKIE["language"]=="BG") {
        $lang = "BG";
    } else {
        $lang = "EN";
    }
}

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

$message = $_POST["message"];
$from = $_POST["from"];
$to = $_POST["to"];
$post = $_POST["post"];
$opp = $_POST["opp"];

$sql_me = "SELECT * FROM `users` WHERE id=$from";
$result_me = $conn->query($sql_me);
$row_me = $result_me->fetch_assoc();

$message = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($message))));

$sql = "SELECT * FROM `conversations` WHERE ((user_1=".$from." AND user_2=".$to.") OR (user_2=".$from." AND user_1=".$to.")) AND post= IF($post=0, '%', $post)";
$result = $conn->query($sql);
if ($result->num_rows==0) {
    //Create conversation
    $sql_c = "INSERT INTO `conversations` (`user_1`, `user_2`, `post`, `is_read`, `last_message_by`) VALUES ($from,$to,$post,0, $from)";
    if ($conn->query($sql_c)===true) {
        $conv = $conn->insert_id;
    }
} else {
    $row = $result->fetch_assoc();
    $conv = $row["id"];
}

$sql = "INSERT INTO `messages` (`time`, `content`, `is_read`, `conversation`, `user_from`, `user_to`) VALUES ('".time()."','$message','0','$conv','$from','$to')";
$conn->query($sql);
$sql = "UPDATE `conversations` SET `last_message_by`=$from WHERE id=$conv";
$conn->query($sql);
$sql = "UPDATE `conversations` SET `is_read`='0' WHERE id=$conv";
$conn->query($sql);
?>

<?php
    if ($opp == "me") {
        ?>
<small class="pull-right text-muted"><i class="far fa-clock"></i><?php echo gmdate("d/m/Y - h:i:sa", time()); ?></small>
<p class="mb-0">
    <?php echo $message; ?>
</p>
<hr class="w-100">
<?php
    } else {
        ?>
<li class="d-flex mb-4 me">
    <div class="d-flex box">
        <div class="chat-body p-3 z-depth-1">
            <div class="header">
                <strong class="primary-font">
                    <?php
                        if ($lang=="EN") {
                            echo "Me";
                        } else {
                            echo "Аз";
                        } ?>
                </strong>
            </div>
            <hr class="w-100">
            <small class="pull-right text-muted"><i
                    class="far fa-clock"></i><?php echo gmdate("d/m/Y - h:i:sa", time()); ?></small>
            <p class="mb-0">
                <?php echo $message; ?>
            </p>
            <hr class="w-100">
        </div>
        <img src="<?php echo $row_me["Profile_Picture"]; ?>" alt="avatar"
            onerror="this.src='media/profile/default/default.png';" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
    </div>
</li>
<?php
    }
?>