<?php
require("../deny_non_ajax_access.php");
$servername = "localhost";
$username = "root";
$password = "";
$database = "dev";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["user"];

$sql_con = "SELECT * FROM `conversations` WHERE (`user_2`=".$user." OR `user_1`=".$user.") AND is_read=0 AND last_message_by!=".$user;
$result_con = $conn->query($sql_con);

?>
<md-button id="all_msg" class="md-raised md-primary" href="profile.php#messages">
    View all messages
</md-button>
<?php
                //Fetch all messages
                //Sort them by date
                // Highlight the ones not yet read
            if ($result_con->num_rows==0) {
                ?>
<div class="md-subheading" style="padding: 20px">No new messages!</div>
<?php
            } else {
                while ($row_con = $result_con->fetch_assoc()) {

//! Get the last mesage from a given conversation
                    $sql_unread = "SELECT * FROM `messages` LEFT JOIN `users` ON messages.user_from=users.id WHERE `conversation`=".$row_con["id"]." AND `is_read`=0";
                    $result_unread = $conn->query($sql_unread);
                    mysqli_data_seek($result_unread, $result_unread->num_rows-1);
                    $row_unread = $result_unread->fetch_assoc(); ?>
<md-button href="message.php?user=<?php echo $row_unread["user_from"];
                    if ($row_con["post"]!=0) {
                        echo "&post=".$row_con["post"];
                    } ?>">
    <md-avatar class="md-large">
        <img src="<?php echo $row_unread["Profile_Picture"]; ?>" alt="avatar">
    </md-avatar>
    <div class="msg_content">
        <div class="md-body-1">
            <div class="text-primary font-weight-bold"><?php echo $result_unread->num_rows; ?></div>
            Unread
            messages from
            <?php echo $row_unread["First_Name"]." ".$row_unread["Last_Name"]; ?>
        </div>
        <div class="md-caption">
            Last Message: <?php echo $row_unread["time"]; ?> by
            <?php
if ($row_unread["user_from"]==$_SESSION["user"]) {
                        echo "You";
                    } else {
                        echo $row_unread["First_Name"]." ".$row_unread["Last_Name"];
                    } ?>
        </div>
        <?php
if ($row_con["post"]!=0) {
                        ?>
        <div class="md-caption">
            About post: <?php echo $row_con["post"]; ?>
        </div>
        <?php
                    } ?>
    </div>
</md-button>
<?php
                }
            }


            ?>


<div class="second md-menu-content-bottom-start md-menu-content-auto md-menu-content md-theme-default"
    x-placement="bottom-start" style="position: absolute; top: 52px; left: 1026px; will-change: top, left;">
    <div class="md-menu-content-container md-scrollbar md-theme-default">
        <ul class="md-list md-theme-default"><a href="profile.php#messages"
                class="md-button md-raised md-primary md-theme-default" id="all_msg">
                <div class="md-ripple">
                    <div class="md-button-content">
                        View all messages
                    </div>
                </div>
            </a>
            <div class="md-subheading" style="padding: 20px;">No new messages!</div>
        </ul>
    </div>
</div>