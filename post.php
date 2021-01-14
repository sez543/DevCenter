<?php
    require("./utilities/config.php");
    $post = $_REQUEST["id"];
    $sql = "SELECT * FROM `posts` WHERE id=$post";
    $result = $conn->query($sql);
    if ($result->num_rows==0) {
        header("Location: 404.php");
    } else {
        $row_post = $result->fetch_assoc();
    }

    if (isset($_SESSION["user"])) {
        $sql_a = "SELECT * FROM `users` WHERE id=".$_SESSION["user"];
        $result_a = $conn->query($sql_a);
        $row_a = $result_a->fetch_assoc();
    }

    if (isset($_POST["del"])) {
        if (!isset($_SESSION["user"])) {
            header("Location: 403.php");
        } else {
            if ($_SESSION["user"]!=$row_post["Author"] && $row_a["Is_Moderator"]!="1") {
                header("Location: 403.php");
            }
        }
        $sql_delete = "DELETE FROM `posts` WHERE id=$post";
        if ($conn->query($sql_delete)===true) {
            header("Location: edit_post.php");
        }
    }

    if (isset($_POST["done"])) {
        if (!isset($_SESSION["user"])) {
            header("Location: 403.php");
        }
        if ($_SESSION["user"]!=$row_post["Author"]) {
            header("Location: 403.php");
        }
        $sql_delete = "UPDATE `posts` SET `Is_Finished`='1' WHERE id=$post";
        $conn->query($sql_delete);
        header("Location: post.php?id=$post");
    }

    if (isset($_POST["act"])) {
        if (!isset($_SESSION["user"])) {
            header("Location: 403.php");
        }
        if ($_SESSION["user"]!=$row_post["Author"]) {
            header("Location: 403.php");
        }
        $sql_delete = "UPDATE `posts` SET `Is_Finished`='0' WHERE id=$post";
        $conn->query($sql_delete);
        header("Location: post.php?id=$post");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title><?php echo $row_post["Title"] ?></title>
    <link rel="stylesheet" href="styles/post/styles.css">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/comment.js" defer></script>
    <style>
    .main p span {
        background-color: unset !important;
    }
    </style>
</head>

<body>
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <div id="a" class="md-scrollbar md-theme-default">
            <md-content style="flex: 1; flex-basis: 500vh">
                <div class="padding">
                    <md-card id="page" class="border border-light">
                        <div class="md-card detail-split content card testimonial-card border border-light z-depth-1 md-theme-default"
                            style="margin-bottom: 25px;">
                            <div style="display: flex; flex-direction: column; justify-content: center; padding: 30px;"
                                class="card-up <?php if ($row_post["Is_Finished"]==1) {
            echo "grey darken-1";
        } else {
            echo "primary-color";
        } ?> lighten-1">
                                <div class="md-display-2 text-white">
                                    <?php echo $row_post["Title"]; ?><?php if ($row_post["Is_Finished"]==1) {
            echo " (Completed)";
        } ?>
                                </div>
                                <div class="md-caption text-white"><?php echo $posted_on; ?>:
                                    <?php echo date("d/m/Y - h:i:sa", $row_post["Date"]); ?>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION["user"])) {
                                ?>
                            <div class="card-body">
                                <?php
                                     if ($row_a["Is_Moderator"]=="1") {
                                         ?>
                                <form action="" method="POST" style="display: inline-block;">
                                    <input style="display: none;" type="text" name="del" id="del" value="del">
                                    <md-button type="submit" class="md-raised <?php if ($row_post["Is_Finished"]==1) {
                                             echo "md-accent";
                                         } else {
                                             echo "md-primary";
                                         } ?> md-theme-default">
                                        <div class="md-ripple">
                                            <div class="md-button-content">
                                                <?php echo $delete_post; ?>
                                            </div>
                                        </div>
                                    </md-button>
                                </form>
                                <?php
                                     }
                                if ($row_post["Author"]!=$_SESSION["user"]) {
                                    ?>
                                <a href="message.php?user=<?php echo $row_post["Author"]."&post=".$row_post["id"]; ?>"
                                    class="md-button md-raised md-primary md-theme-default">
                                    <div class="md-ripple">
                                        <div class="md-button-content"><?php echo $send_message; ?>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                } else {
                                    ?>
                                <a href="edit_post.php?id=<?php echo $row_post["id"]; ?>" class="md-button md-raised <?php if ($row_post["Is_Finished"]==1) {
                                        echo "md-accent";
                                    } else {
                                        echo "md-primary";
                                    } ?> md-theme-default">
                                    <div class="md-ripple">
                                        <div class="md-button-content"><?php echo $edit; ?>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                    if ($row_post["Is_Finished"]==1) {
                                        ?>
                                <form action="" method="POST" style="display: inline-block;">
                                    <input style="display: none;" type="text" name="act" id="act" value="act">
                                    <md-button type="submit" class="md-raised md-accent md-theme-default">
                                        <div class="md-ripple">
                                            <div class="md-button-content">
                                                <?php echo $mark_as_active; ?>
                                            </div>
                                        </div>
                                    </md-button>
                                </form>
                                <?php
                                    } else {
                                        ?>
                                <form action="" method="POST" style="display: inline-block;">
                                    <input style="display: none;" type="text" name="done" id="done" value="done">
                                    <md-button type="submit" class="md-raised md-primary md-theme-default">
                                        <div class="md-ripple">
                                            <div class="md-button-content">
                                                <?php echo $mark_as_done; ?>
                                            </div>
                                        </div>
                                    </md-button>
                                </form>
                                <?php
                                    } ?>
                                <form action="" method="POST" style="display: inline-block;">
                                    <input style="display: none;" type="text" name="del" id="del" value="del">
                                    <md-button type="submit" class="md-raised <?php if ($row_post["Is_Finished"]==1) {
                                        echo "md-accent";
                                    } else {
                                        echo "md-primary";
                                    } ?> md-theme-default">
                                        <div class="md-ripple">
                                            <div class="md-button-content">
                                                <?php echo $delete_post; ?>
                                            </div>
                                        </div>
                                    </md-button>
                                </form>
                                <?php
                                } ?>
                            </div>
                            <?php
                            } else {
                                ?>
                            <div style="margin: 30px 0;" class="md-subheading"><a
                                    href="login.php"><?php echo $login_user; ?></a> <?php echo $to_send; ?></div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- If posted by user - Edit button and an option to mark it as done-->
                        <!-- If not - Message button and a link to the the creator -->
                        <div class="main border border-light">
                            <?php echo htmlspecialchars_decode($row_post["Body"]); ?>
                        </div>
                        <!-- Comment section -->
                        <div style="margin-top: 25px;" class="comments border border-light">
                            <div class="body_com">
                                <?php
                                $sql_comments = "SELECT *, comments.id AS 'test' FROM `comments` LEFT JOIN `users` ON comments.Author=users.id WHERE Post=$post";
                                $result_comments = $conn->query($sql_comments);
                                if ($result_comments->num_rows==0) {
                                    if (!isset($_SESSION["user"])) {
                                        ?>
                                <div class="md-subheading mrg"><?php echo $no_comments; ?></div>
                                <?php
                                    } else {
                                        ?>
                                <div class="md-subheading mrg"><?php echo $be_the_first; ?></div>
                                <?php
                                    }
                                } else {
                                    ?>
                                <div id="count" class="card-header border-0 font-weight-bold">
                                    <?php echo $result_comments->num_rows; ?> <?php echo $comments; ?></div>
                                <?php
                                    while ($row_comments = $result_comments->fetch_assoc()) {
                                        if (isset($_SESSION["user"])) {
                                            $sql_rating = "SELECT * FROM `comment_rating` WHERE comment=".$row_comments["test"]." AND user_from=".$_SESSION["user"];
                                            $result_rating = $conn->query($sql_rating);
                                            if ($result_rating->num_rows==0) {
                                                $no_rating = true;
                                            } else {
                                                $no_rating = false;
                                                $row_rating = $result_rating->fetch_assoc();
                                            }
                                        } else {
                                            $no_rating = true;
                                        } ?>
                                <div id="cmt" style="padding: 20px;"
                                    class="border border-white media d-block d-md-flex mt-4">
                                    <img class="card-img-64 d-flex mx-auto mb-3"
                                        src="<?php echo $row_comments["Profile_Picture"]; ?>" alt="user-image">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <div class="md-headline mt-0">
                                            <a
                                                href="user.php?id=<?php echo $row_comments["Author"] ?>"><?php echo $row_comments["First_Name"]." ".$row_comments["Last_Name"]; ?></a>
                                        </div>
                                        <p style="margin: 1rem 0;">
                                            <?php echo $row_comments["Body"]; ?>
                                        </p>
                                        <?php
                                            if (isset($_SESSION["user"])) {
                                                ?>
                                        <hr>
                                        <div class="rating comment-<?php echo $row_comments['test']; ?>">
                                            <md-button
                                                onclick="send_rating('like', <?php echo $row_comments['test']; ?>)"
                                                class="ib <?php if (!$no_rating && $row_rating["is_positive"]==1) {
                                                    echo "sel_g";
                                                } ?> md-icon-button md-raised md-primary md-dense">
                                                <md-icon class="rating_icon">thumb_up</md-icon>
                                            </md-button>
                                            <div class="text-primary md-body-1 count">
                                                <?php echo $row_comments["Likes"]; ?>
                                            </div>
                                            <md-button
                                                onclick="send_rating('dislike', <?php echo $row_comments['test']; ?>)"
                                                class="ib <?php if (!$no_rating && $row_rating["is_positive"]==0) {
                                                    echo "sel_r";
                                                } ?> md-icon-button md-raised md-primary md-dense">
                                                <md-icon class="rating_icon">thumb_down</md-icon>
                                            </md-button>
                                            <div class="text-primary md-body-1 count">
                                                <?php echo $row_comments["Dislikes"]; ?>
                                            </div>
                                        </div>
                                        <?php
                                            } ?>
                                        <?php
                                            if (isset($_SESSION["user"])) {
                                                if ($_SESSION["user"]==$row_comments["Author"] || $row_a["Is_Moderator"]=="1") {
                                                    ?>
                                        <div style="text-align: right; margin-top: 15px;"
                                            class="md-body-1 text-primary">
                                            <md-button onclick="delete_comment(<?php echo $row_comments['test']; ?>)"
                                                style="margin-right: 0;" class="md-raised md-primary">
                                                <?php echo $delete_comment; ?></md-button>
                                        </div>
                                        <?php
                                                }
                                            } ?>
                                    </div>
                                </div>
                                <?php
                                    } ?>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                                if (isset($_SESSION["user"])&&$row_post["Is_Finished"]==0) {
                                    ?>
                            <div class="md-form" style="margin: 40px 10px; margin-top: 75px;">
                                <textarea required type="text" id="message" name="message" rows="1"
                                    class="form-control md-textarea"></textarea>
                                <label style="top: -1.6rem;" for="message"><?php echo $your_comment; ?></label>
                                <button type="button" onclick="send_comment(<?php echo $post; ?>)"
                                    class="btn btn-primary btn-rounded btn-sm waves-effect waves-light float-right"
                                    id="btn"><?php echo $send; ?></button>
                            </div>
                            <p style="text-align: left; display: none;" id="error" class="text-danger">
                                <?php echo $cannot_send; ?></p>
                            <?php
                                }
                            ?>
                        </div>
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