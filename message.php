<?php
    require("./utilities/config.php");

    //403 errors
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }

    //404 errors
    if (isset($_REQUEST["post"])) {
        $about_post = true;
        $sql_p = "SELECT * FROM `posts` WHERE id=".$_REQUEST["post"];
        $result_p = $conn->query($sql_p);
        if ($result_p->num_rows==0) {
            header("Location: 404.php");
        }
    } else {
        $post = 0;
    }
    if (!isset($_REQUEST["user"])) {
        header("Location: profile.php#messages");
    } elseif ($_REQUEST["user"]==$_SESSION["user"]) {
        header("Location: profile.php#messages");
    } else {
        $sql = "SELECT * FROM `users` WHERE id=".$_REQUEST["user"];
        $result = $conn->query($sql);
        if ($result->num_rows==0) {
            header("Location: 404.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title>Message</title>
    <link rel="stylesheet" href="styles/message/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/messages.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <div id="a" class="md-scrollbar md-theme-default">
            <md-content style="flex: 1; flex-basis: 500vh">
                <div class="padding">
                    <md-card id="page" class="border border-light">
                        <!-- Grid row -->
                        <div class="row px-lg-2 px-2">
                            <!-- Grid column -->
                            <div class="col-md-6" style="flex: unset; max-width: none;">
                                <div class="chat-message">
                                    <ul class="list-unstyled">
                                        <div class="md-title" style="margin-bottom: 20px;">
                                            <?php

                                            $sql_user = "SELECT * FROM `users` WHERE id=".$_REQUEST["user"];
                                            $result_user = $conn->query($sql_user);
                                            $row_user = $result_user->fetch_assoc();
                                            if (isset($_REQUEST["post"])) {
                                                $row_p = $result_p->fetch_assoc();
                                                $post = $row_p["id"];
                                                echo $message_to." ".$row_user["First_Name"]." ".$row_user["Last_Name"].", ".$about_post.": ".$row_p["Title"];
                                            } else {
                                                $post = 0;
                                                echo $personal." ".$row_user["First_Name"]." ".$row_user["Last_Name"];
                                            }
                                        ?>
                                        </div>
                                        <div class="chat border border-white md-scrollbar md-theme-default"
                                            style="height: 500px; overflow: auto; padding: 20px">
                                            <?php
                                                $sql_conversation = "SELECT * FROM `conversations` WHERE ((user_1=".$_SESSION["user"]." AND user_2=".$_REQUEST["user"].") OR (user_2=".$_SESSION["user"]." AND user_1=".$_REQUEST["user"].")) AND post=".$post;
                                                $result_conversation = $conn->query($sql_conversation);
                                                if ($result_conversation->num_rows==0) {
                                                    $new_conversation = true; ?>
                                            <div class="md-body-1"><?php echo $send_message_to_start; ?></div>
                                            <?php
                                                } else {
                                                    $row_conversation = $result_conversation->fetch_assoc();
                                                    $sql_update = "UPDATE `messages` SET is_read='1' WHERE `conversation`=".$row_conversation["id"]." AND user_to=".$_SESSION["user"];
                                                    $conn->query($sql_update);
                                                    if ($row_conversation["last_message_by"]!=$_SESSION["user"]) {
                                                        $sql_update = "UPDATE `conversations` SET is_read='1' WHERE `id`=".$row_conversation["id"];
                                                        $conn->query($sql_update);
                                                    }
                                                    // Fetch all messages in this conversation
                                                    $sql_messages = "SELECT * FROM `messages` WHERE `conversation`=".$row_conversation["id"];
                                                    $result_messages = $conn->query($sql_messages);
                                                    $c = 0;
                                                    while ($row_messages = $result_messages->fetch_assoc()) {
                                                        $c++;
                                                        if ($row_messages["user_from"]==$_SESSION["user"]) {
                                                            $current = "me";
                                                            $current_id = $_SESSION["user"];
                                                        } else {
                                                            $current = "other_user";
                                                            $current_id = $_REQUEST["user"];
                                                        }
                                                        //From me?>
                                            <li class="d-flex mb-4 <?php echo $current; ?>">
                                                <div class="d-flex box">
                                                    <?php
                                                    if ($current == "other_user") {
                                                        ?>
                                                    <img src="<?php echo $row_user["Profile_Picture"]; ?>" alt="avatar"
                                                        onerror="this.src='media/profile/default/default.png';"
                                                        class="avatar rounded-circle mr-3 ml-0 z-depth-1">
                                                    <?php
                                                    } ?>
                                                    <div class="chat-body p-3 z-depth-1">
                                                        <div class="header">
                                                            <strong class="primary-font">
                                                                <?php
                                                                if ($current == "me") {
                                                                    echo $me;
                                                                } else {
                                                                    echo $row_user["First_Name"]." ".$row_user["Last_Name"];
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
                                                    <img src="<?php echo $row["Profile_Picture"]; ?>" alt="avatar"
                                                        onerror="this.src='media/profile/default/default.png';"
                                                        class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                                                    <?php
                                                    } ?>
                                                </div>
                                            </li>
                                            <?php
                                            mysqli_data_seek($result_messages, $c - 1);
                                                        $c--;
                                                    }
                                                }
                                            ?>

                                        </div>
                                        <li>
                                            <div class="md-form" style="margin-top: 4.5rem;">
                                                <textarea required type="text" id="message" name="message" rows="1"
                                                    class="form-control md-textarea"></textarea>
                                                <label style="top: -1.6rem;"
                                                    for="message"><?php echo $your_message; ?></label>
                                            </div>
                                        </li>
                                        <button type="button"
                                            onclick="send_message(<?php echo $_SESSION['user']; ?>, <?php echo $_REQUEST['user']; ?>, <?php echo $post; ?>)"
                                            class="btn btn-primary btn-rounded btn-sm waves-effect waves-light float-right"
                                            id="btn"><?php echo $send; ?></button>
                                        <p style="text-align: left; display: none;" id="error" class="text-danger">
                                            <?php echo $please_enter_message; ?></p>
                                    </ul>
                                </div>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row -->
                    </md-card>

                </div>
            </md-content>
            <?php
                require('components/footer.php');
            ?>
        </div>
    </div>
</body>

</html>