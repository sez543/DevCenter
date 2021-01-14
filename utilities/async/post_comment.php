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

$from = $_SESSION["user"];
$post = $_POST["post"];
$comment = $_POST["comment"];

$comment = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($comment))));

if (strlen($comment)<=0) {
    if (!isset($_COOKIE["language"])) {
        ?>
<script>
console.log("Моля въведете съобщение!");
</script>
<?php
    } else {
        if ($_COOKIE["language"]=="BG") {
            ?>
<script>
console.log("Моля въведете съобщение!");
</script>
<?php
        } else {
            ?>
<script>
console.log("Please enter a message");
</script>
<?php
        }
    }
} else {
    $sql_user = "SELECT * FROM `users` WHERE id=$from";
    $result_user = $conn->query($sql_user);
    $row_user = $result_user->fetch_assoc();
    
    $sql = "INSERT INTO `comments`(`Author`, `Post`, `Body`, `Date`, `Likes`, `Dislikes`) VALUES ('$from','$post','$comment','".time()."','0','0')";
    if ($conn->query($sql)===true) {
        $last_id = $conn->insert_id; ?>
<div id="cmt" style="padding: 20px;" class="border border-white media d-block d-md-flex mt-4">
    <img class="card-img-64 d-flex mx-auto mb-3" src="<?php echo $row_user["Profile_Picture"]; ?>" alt="user-image">
    <div class="media-body text-center text-md-left ml-md-3 ml-0">
        <div class="md-headline mt-0">
            <a
                href="user.php?id=<?php echo $from; ?>"><?php echo $row_user["First_Name"]." ".$row_user["Last_Name"]; ?></a>
        </div>
        <p style="margin: 1rem 0;">
            <?php echo $comment; ?>
        </p>
        <hr>
        <div class="rating comment-<?php echo $last_id; ?>">
            <button type="button" class="md-button ib md-icon-button md-raised md-primary md-dense md-theme-default"
                onclick="send_rating('like', <?php echo $last_id; ?>)">
                <div class="md-ripple">
                    <div class="md-button-content"><i
                            class="md-icon md-icon-font rating_icon md-theme-default">thumb_up</i></div>
                </div>
            </button>
            <div class="text-primary md-body-1 count">0 </div> <button type="button"
                class="md-button ib md-icon-button md-raised md-primary md-dense md-theme-default"
                onclick="send_rating('dislike', <?php echo $last_id; ?>)">
                <div class="md-ripple">
                    <div class="md-button-content"><i
                            class="md-icon md-icon-font rating_icon md-theme-default">thumb_down</i></div>
                </div>
            </button>
            <div class="text-primary md-body-1 count">0 </div>
        </div>
        <div style="text-align: right; margin-top: 15px;" class="md-body-1 text-primary">
            <button type="button" class="md-button md-raised md-primary md-theme-default"
                onclick="delete_comment(<?php echo $last_id; ?>)" style="margin-right: 0px;">
                <div class="md-ripple">
                    <div class="md-button-content"><?php if ($lang == "EN") {
            echo "Delete comment";
        } else {
            echo "Изтрий коментар";
        } ?></div>
                </div>
            </button>
        </div>
    </div>
    <?php
    } else {
        if ($lang=="EN") {
            echo "An Error occured while processing your request!";
        } else {
            echo "Възникна грешка при обработването на вашата заявка!";
        }
    }
}