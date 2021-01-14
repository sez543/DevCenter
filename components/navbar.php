<md-toolbar class="md-primary" md-elevation="1">
    <h3 class="md-title" style="flex: 1"><a href="index.php"
            style="color: #fff; text-decoration:none;"><?php echo $title; ?></a>
    </h3>
    <?php
        if (isset($_SESSION["user"])) {
            $sql_a = "SELECT * FROM `users` WHERE id=".$_SESSION["user"];
            $result_a = $conn->query($sql_a);
            $row_a = $result_a->fetch_assoc();
            if ($row_a["Is_Admin"]=="1") {
                ?>
    <md-button href="dashboard.php" class="md-accent md-raised"><?php echo $admin; ?></md-button>
    <?php
            } elseif ($row_a["Is_Moderator"]=="1") {
                ?>
    <md-button class="md-accent md-raised disabled"><?php echo $moderator; ?></md-button>
    <?php
            }
        }
    ?>
    <md-button href="index.php" class="dynamic"><?php echo $home; ?></md-button>
    <md-button href="all_posts.php" class="dynamic"><?php echo $jobs; ?></md-button>
    <md-button href="about_us.php" class="dynamic"><?php echo $about; ?></md-button>
    <md-button href="contacts.php" class="dynamic"><?php echo $contacts; ?></md-button>

    <?php

    ?>

    <md-menu class="dynamic" md-direction="bottom-start" md-align-trigger md-size="big">
        <md-button md-menu-trigger class="md-icon-button">
            <md-icon>account_circle</md-icon>
        </md-button>
        <md-menu-content class="first">
            <?php
                if (isset($_POST["signout"])) {
                    unset($_SESSION["user"]);
                    header("Location: index.php");
                }
            ?>
            <?php
            if (!isset($_SESSION["user"])) {
                $set = false; ?>
            <md-menu-item>
                <md-button href="login.php"><?php echo $sign_in; ?></md-button>
            </md-menu-item>
            <md-menu-item>
                <md-button href="register.php"><?php echo $register; ?></md-button>
            </md-menu-item>
            <?php
            } else {
                $set = true; ?>
            <md-menu-item>
                <md-button id="<?php echo $_SESSION["user"] ?>" class="user_button" href="profile.php">
                    <?php
                    $sql = "SELECT * FROM `users` WHERE id = '".$_SESSION["user"]."'";
                $result = $conn->query($sql); ?>
                    <md-avatar class="md-large">
                        <img src="<?php $row = $result->fetch_assoc();
                echo $row["Profile_Picture"]; ?>" alt="avatar">
                    </md-avatar>
                    <?php
                        echo $row["First_Name"]." ".$row["Last_Name"]; ?>
                </md-button>
            </md-menu-item>
            <md-menu-item>
                <md-button href="edit_post.php"><?php echo $my_posts; ?></md-button>
            </md-menu-item>
            <md-menu-item>
                <form action="" method="POST">
                    <input name="signout" type="checkbox" checked style="display: none;">
                    <md-button type="submit" href=""><?php echo $sign_out; ?></md-button>
                </form>
            </md-menu-item>
            <?php
            }
        ?>
        </md-menu-content>
    </md-menu>

    <?php
        if (isset($_SESSION["user"])) {
            ?>
    <md-menu md-direction="bottom-start" md-align-trigger md-size="auto">
        <?php

            //! Fetch all conversations of logged user

            $sql_con = "SELECT * FROM `conversations` WHERE (`user_2`=".$_SESSION["user"]." OR `user_1`=".$_SESSION["user"].") AND is_read=0 AND last_message_by!=".$_SESSION["user"];
            $result_con = $conn->query($sql_con);
            if ($result_con->num_rows!=0) {
                ?>
        <md-badge md-content="<?php echo $result_con->num_rows; ?>">
            <?php
            } ?>
            <md-button style="margin: 0;" md-menu-trigger class="md-icon-button">
                <md-icon>chat</md-icon>
            </md-button>
        </md-badge>
        <md-menu-content class="second">
            <md-button id="all_msg" class="md-raised md-primary" href="profile.php#messages">
                <?php echo $view_all_messages; ?>
            </md-button>
            <?php
                //Fetch all messages
                //Sort them by date
                // Highlight the ones not yet read
            if ($result_con->num_rows==0) {
                ?>
            <div class="md-subheading" style="padding: 20px"><?php echo $no_new_messages; ?></div>
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
                        <?php echo $unread_messages_from; ?>
                        <?php echo $row_unread["First_Name"]." ".$row_unread["Last_Name"]; ?>
                    </div>
                    <div class="md-caption">
                        <?php echo $last_message; ?>: <?php echo date("d/m/Y - h:i:sa", $row_unread["time"]); ?>
                        <?php echo $by; ?>
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
                        <?php echo $about_post; ?>: <?php echo $row_con["post"]; ?>
                    </div>
                    <?php
                        } ?>
                </div>
            </md-button>
            <?php
                }
            } ?>
        </md-menu-content>
    </md-menu>
    <?php
        }
    ?>

    <md-button onclick="toggleTheme()" class="md-icon-button">
        <md-icon id="th_ico"><?php if (isset($_COOKIE["theme"])) {
        if ($_COOKIE["theme"]=="light") { ?>nights_stay<?php } else {?>wb_sunny<?php }
    } else {
        echo "nights_stay";
    }?>
        </md-icon>
    </md-button>

    <md-button onclick="changeLanguage()" class="md-icon-button lang">
        <div id="lang" class="md-subheading"><?php if (isset($_COOKIE["language"])) {
        if ($_COOKIE["language"]=="EN") {
            echo "BG";
        } else {
            echo "EN";
        }
    } else {
        echo "BG";
    } ?></div>
    </md-button>

    <md-button id="menu" class="md-icon-button dropdown-toggle" data-toggle="dropdown">
        <md-icon id="th_ico" style="font-size:30px!important;">menu</md-icon>
    </md-button>

    <div class="animated dropdown-menu primary-color text-white fadeIn faster" style="width: 100%;">
        <md-button style="display: block; margin: 6px 8px !important;" href="index.php"><?php echo $home; ?></md-button>
        <md-button style="display: block; margin: 6px 8px !important;" href="all_posts.php"><?php echo $jobs; ?>
        </md-button>
        <md-button style="display: block; margin: 6px 8px !important;" href="about_us.php"><?php echo $about; ?>
        </md-button>
        <md-button style="display: block; margin: 6px 8px !important;" href="contacts.php"><?php echo $contacts; ?>
        </md-button>
        <div class="dropdown-divider"></div><?php if (!$set) {?><md-button
            style="display: block; margin: 6px 8px !important;" href="login.php"><?php echo $sign_in; ?></md-button>
        <md-button style="display: block; margin: 6px 8px !important;" href="register.php"><?php echo $register; ?>
        </md-button>
        <?php } else { ?>
        <md-button style="display: block; margin: 6px 8px !important; height: auto;" href="profile.php">
            <md-avatar class="md-large">
                <img src="<?php echo $row["Profile_Picture"];?>" alt="avatar">
            </md-avatar>
            <?php echo $row["First_Name"]." ".$row["Last_Name"]; ?>
        </md-button>
        <md-button style="display: block; margin: 6px 8px !important;" href="edit_post.php"><?php echo $my_posts; ?>
        </md-button>
        <form style="display: block; margin: 6px 8px !important;" action="" method="POST">
            <input name="signout" type="checkbox" checked style="display: none;">
            <md-button style="display: block; margin: 6px 8px !important;" type="submit" href="#">
                <?php echo $sign_out; ?></md-button>
        </form>
        <?php } ?>
    </div>
</md-toolbar>

<?php
    if (isset($_COOKIE["theme"])) {
        if ($_COOKIE["theme"]=="dark") {
            $theme = "#303030";
        } else {
            $theme = "#fafafa";
        }
    } else {
        $theme = "#fafafa";
    }
?>
<div class="loading" style="background-color: <?php echo $theme; ?>">
    <div class="orbit-spinner">
        <div class="orbit"></div>
        <div class="orbit"></div>
        <div class="orbit"></div>
    </div>
</div>