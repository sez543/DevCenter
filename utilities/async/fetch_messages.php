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

$from = $_POST["from"];
$to = $_POST["to"];
$post = $_POST["post"];

$sql_conversation = "SELECT * FROM `conversations` WHERE ((user_1=".$from." AND user_2=".$to.") OR (user_2=".$from." AND user_1=".$to.")) AND post= IF($post=0, '%', $post)";
$result_conversation = $conn->query($sql_conversation);
if ($result_conversation->num_rows==0) {
    ?>
<div class="md-body-1">
    <?php
    if ($lang=="EN") {
        echo "Send a message to start this conversation.";
    } else {
        echo "Изпратете съобшение за да започнете разговора.";
    } ?>
</div>
<?php
} else {
        $sql_me = "SELECT * FROM `users` WHERE id=$from";
        $result_me = $conn->query($sql_me);
        $row_me = $result_me->fetch_assoc();

        $sql_other = "SELECT * FROM `users` WHERE id=$to";
        $result_other = $conn->query($sql_other);
        $row_other = $result_other->fetch_assoc();

        $row_conversation = $result_conversation->fetch_assoc();
        // Fetch all messages in this conversation
        $sql_messages = "SELECT * FROM `messages` WHERE `conversation`=".$row_conversation["id"];
        $result_messages = $conn->query($sql_messages);
        $c = 0;
        while ($row_messages = $result_messages->fetch_assoc()) {
            $c++;
            if ($row_messages["user_from"]==$from) {
                $current = "me";
                $current_id = $from;
            } else {
                $current = "other_user";
                $current_id = $to;
            }
            //From me?>
<li class="d-flex mb-4 <?php echo $current; ?>">
    <div class="d-flex box">
        <?php
            if ($current == "other_user") {
                ?>
        <img src="<?php echo $row_other["Profile_Picture"]; ?>" alt="avatar"
            onerror="this.src='media/profile/default/default.png';" class="avatar rounded-circle mr-3 ml-0 z-depth-1">
        <?php
            } ?>
        <div class="chat-body p-3 z-depth-1">
            <div class="header">
                <strong class="primary-font">
                    <?php
                        if ($current == "me") {
                            if ($lang=="EN") {
                                echo "Me";
                            } else {
                                echo "Аз";
                            }
                        } else {
                            echo $row_other["First_Name"]." ".$row_other["Last_Name"];
                        } ?>
                </strong>
            </div>
            <hr class="w-100">
            <?php
                while ($row_messages["user_from"]==$current_id) {
                    ?>

            <small class="pull-right text-muted"><i
                    class="far fa-clock"></i><?php echo gmdate("d/m/Y - h:i:sa", $row_messages["time"]); ?></small>
            <p class="mb-0">
                <?php echo $row_messages["content"]; ?>
            </p>
            <hr class="w-100">
            <?php
                $row_messages = $result_messages->fetch_assoc();
                    $c++;
                } ?>
        </div>
        <?php
            if ($current == "me") {
                ?>
        <img src="<?php echo $row_me["Profile_Picture"]; ?>" alt="avatar"
            onerror="this.src='media/profile/default/default.png';" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
        <?php
            } ?>
    </div>
</li>
<?php
    mysqli_data_seek($result_messages, $c - 1);
            $c--;
        }
    }