<?php
    require("./utilities/config.php");
?>
<?php
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <base target="_parent">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <link rel="stylesheet" href="styles/profile/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/rating/rater.js"></script>
    <script defer>
    $(document).ready(function() {
        var url = document.location.toString();
        if (url.match('#')) {
            $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
    });
    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function(e) {
        window.location.hash = e.target.attr("href");
    });

    $("#all_msg").click(function() {
        console.log(123);
        $('.nav-tabs a[href="#messages"]').tab('show');
    });
    </script>
    <?php
    $sql = "SELECT *  FROM `users` WHERE id=".$_SESSION["user"];
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row["Rating"]!="NA") {
        echo "<script>
    $(document).ready(function() {
        options = {
            readonly: true,
            initial_value: ".round($row["Rating"], 1).",
            step_size: 0.1,
        }
        $('.rating').rate(options);
    });
    </script>";
    }
    ?>
    <style>
    .rating {
        margin: 0 auto;
        font-size: 25px;
    }

    .rate-base-layer {
        color: #aaa;
    }

    .rate-hover-layer {
        color: orange;
    }

    .rate-select-layer {
        color: orange;
    }
    </style>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar md-theme-default" style="flex: 1; flex-basis: 500vh">
            <div class="padding">
                <div class="upper">
                    <md-card class="img-split content card testimonial-card border border-light z-depth-1">
                        <!-- Background color -->
                        <div class="card-up primary-color lighten-1">
                            <div class="contacts">
                                <?php
                                    if (strlen($row["Facebook"])!=0) {
                                        ?>
                                <md-button href="https://www.facebook.com/<?php echo $row["Facebook"]; ?>/"
                                    class="md-icon-button md-dense">
                                    <md-icon class="text-white" id="th_ico">facebook</md-icon>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row["LinkedIn"])!=0) {
                                        ?>
                                <md-button href="https://www.linkedin.com/in/<?php echo $row["LinkedIn"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-linkedin fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row["Twitter"])!=0) {
                                        ?>
                                <md-button href="https://twitter.com/<?php echo $row["Twitter"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-twitter fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row["GitHub"])!=0) {
                                        ?>
                                <md-button href="https://github.com/<?php echo $row["GitHub"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-github fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                ?>
                                <div style="text-align: right;">
                                    <div class="md-caption text-white"><u><?php echo $row["mail"]; ?></u></div>
                                    <div class="md-caption text-white"><u><?php echo $row["Phone_Number"]; ?></u></div>
                                </div>
                            </div>
                        </div>
                        <!-- Avatar -->
                        <div class="avatar mx-auto white">
                            <img src="<?php echo $row["Profile_Picture"]; ?>"
                                onerror="this.src='media/profile/default/default.png';" class="rounded-circle"
                                alt="avatar">
                        </div>
                        <!-- Content -->
                        <div class="card-body">
                            <!-- Name -->
                            <h4 class="card-title"><?php echo $row["First_Name"]." ".$row["Last_Name"]; ?></h4>
                            <div class="md-body-2 rate">
                                <?php
                                    if ($row["Rating"]=="NA") {
                                        echo $no_user_scores;
                                    } else {
                                        echo round($row["Rating"], 1)."/5 ".$user_score;
                                    }
                                ?>
                            </div>
                            <div class="rating"></div>
                            <hr>
                            <!-- Quotation -->
                            <p><i class="fas fa-quote-left"></i> <?php echo $row["Brief_Desription"]; ?></p>
                        </div>
                    </md-card>
                    <md-card class="detail-split content card testimonial-card border border-light z-depth-1">
                        <!-- Background color -->
                        <div class="card-up primary-color lighten-1"></div>
                        <!-- Content -->
                        <div class="card-body">
                            <md-button href="edit_profile.php" class="md-raised md-primary"><?php echo $edit_profile; ?>
                            </md-button>
                            <md-button href="create_listing.php" class="md-raised md-primary">
                                <?php echo $create_a_listing; ?>
                            </md-button>
                            <md-button href="edit_post.php" class="md-raised md-primary">
                                <?php echo $edit_existing_listings; ?>
                            </md-button>
                        </div>
                    </md-card>
                </div>
                <md-card class="content border border-light z-depth-1" style="padding: 20px">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="resume-tab" data-toggle="tab" href="#resume" role="tab"
                                aria-controls="resume" aria-selected="true"><?php echo $resume; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="portfolio-tab" data-toggle="tab" href="#portfolio" role="tab"
                                aria-controls="portfolio" aria-selected="false"><?php echo $portfolio; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="ra-tab" data-toggle="tab" href="#ra" role="tab" aria-controls="ra"
                                aria-selected="false"><?php echo $recent_activity; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab"
                                aria-controls="messages" aria-selected="false"><?php echo $messages; ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                            <?php echo htmlspecialchars_decode($row["Resume"]); ?>
                        </div>
                        <div class="tab-pane fade" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                            <?php echo htmlspecialchars_decode($row["Portfolio"]); ?>
                        </div>
                        <div class="tab-pane fade" id="ra" role="tabpanel" aria-labelledby="ra-tab">



                            <?php
                                        $post_sql = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM posts LEFT JOIN users ON posts.Author = users.id WHERE users.id=".$_SESSION["user"];
                                        $result = $conn->query($post_sql);
                                        while ($row = $result->fetch_assoc()) {
                                            // echo "id: " . $row["id"]. " - Title: " . $row["Title"]. "<br>";?>
                            <md-card class="<?php if ($row["Is_Finished"]==1) {
                                                echo "grey darken-4";
                                            } ?> tile border border-light view overlay">
                                <div class="cont" style="display:flex; width: 100%; justify-content: space-between;">
                                    <div class="main_content">
                                        <md-card-media>
                                            <img src="<?php echo $row["image"]; ?>"
                                                onerror="this.src='media/profile/default/default.png';" alt="avatar">
                                        </md-card-media>
                                        <md-card-header>
                                            <a href="user.php?id=<?php echo $row["author_id"] ?>">
                                                <div class="md-title"><?php echo $row["author"] ?></div>
                                            </a>
                                            <div class="md-caption"><?php echo $row["mail"] ?></div>
                                            <div class="md-subheading">
                                                <?php echo $row["Title"]; ?><?php if ($row["Is_Finished"]==1) {
                                                echo " "; ?>
                                                <div style="display: inline-block;" class="text-primary">
                                                    (<?php echo $completed; ?>)
                                                </div>
                                                <?php
                                            } ?>
                                            </div>
                                            <div class="md-caption" style="margin-top: 5px">
                                                <?php echo $row["Reward"]; ?>$
                                            </div>
                                        </md-card-header>
                                    </div>
                                    <div style="display:flex; flex-direction: column; justify-content: space-between;">
                                        <div class="date md-caption">
                                            <?php echo $posted_on; ?>:
                                            <?php echo date("d/m/Y - h:i:sa", $row["Date"]); ?>
                                        </div>
                                        <md-button style="margin-bottom: 15px" class="md-primary md-raised"
                                            href="./post.php?id=<?php echo $row["id"] ?>">
                                            <?php echo $go_to_page; ?>
                                        </md-button>
                                        <md-button style="margin-bottom: 15px" class="md-primary md-raised"
                                            href="./edit_post.php?id=<?php echo $row["id"] ?>">
                                            <?php echo $edit; ?>
                                        </md-button>
                                    </div>
                                </div>
                            </md-card>
                            <?php
                                        }
                                        ?>



                        </div>
                        <div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <?php
                                $sql_con = "SELECT * FROM `conversations` WHERE `user_2`=".$_SESSION["user"]." OR `user_1`=".$_SESSION["user"];
                                $result_con = $conn->query($sql_con);
                                if ($result_con->num_rows==0) {
                                    ?>
                            <div class="md-subheading"><?php echo $no_new_messages; ?></div>
                            <?php
                                } else {
                                    while ($row_con = $result_con->fetch_assoc()) {
                                        $sql_all = "SELECT * FROM `messages` LEFT JOIN `users` ON messages.user_from=users.id WHERE `conversation`=".$row_con["id"];
                                        $result_all = $conn->query($sql_all);
                                        mysqli_data_seek($result_all, $result_all->num_rows - 1);
                                        $row_all = $result_all->fetch_assoc();

                                        if ($row_con["user_1"]==$_SESSION["user"]) {
                                            $user_other = $row_con["user_2"];
                                        } else {
                                            $user_other = $row_con["user_1"];
                                        }
                                        $sql_other = "SELECT * FROM `users` WHERE id=".$user_other;
                                        $result_other = $conn->query($sql_other);
                                        $row_other = $result_other->fetch_assoc(); ?>

                            <md-card class="<?php if ($row_con["last_message_by"]!=$_SESSION["user"]&&$row_con["is_read"]==0) {
                                            echo "md-primary";
                                        } ?> tile border border-light view overlay">
                                <div class="cont" style="display:flex; width: 100%; justify-content: space-between;">
                                    <div class="main_content">
                                        <md-card-media>
                                            <img src="<?php echo $row_other["Profile_Picture"]; ?>"
                                                onerror="this.src='media/profile/default/default.png';" alt="avatar">
                                        </md-card-media>
                                        <md-card-header
                                            style="display: flex; flex-direction: column; justify-content: space-between;">
                                            <div>
                                                <div class="md-title">
                                                    <?php
                                                        if ($row_con["last_message_by"]!=$_SESSION["user"]&&$row_con["is_read"]==0) {
                                                            ?>
                                                    <?php echo $unread_messages_from; ?>
                                                    <?php
                                                        } ?>
                                                    <a class="u" href="user.php?id=<?php echo $row_other["id"] ?>">
                                                        <?php
                                                    echo $row_other["First_Name"]." ".$row_other["Last_Name"]; ?>
                                                    </a>
                                                </div>
                                                <div class="md-subheading">
                                                    <?php
                                                        if ($row_con["post"]!=0) {
                                                            $sql_post = "SELECT * FROM `posts` WHERE id=".$row_con["post"];
                                                            $result_post = $conn->query($sql_post);
                                                            $row_post = $result_post->fetch_assoc(); ?>
                                                    <?php echo $about_post; ?>: <?php echo $row_post["Title"]; ?>
                                                    <?php
                                                        } else {
                                                            echo $personal_short.":";
                                                        } ?>
                                                </div>
                                            </div>
                                            <div class="md-body-1">
                                                <?php echo $last_message; ?>:
                                                <?php echo date("d/m/Y - h:i:sa", $row_all["time"]); ?>
                                                <?php echo $by; ?>
                                                <div style="display: inline-block;"
                                                    class="text-primary font-weight-bold">
                                                    <?php
                                                    if ($row_con["last_message_by"]==$_SESSION["user"]) {
                                                        echo $me_alt;
                                                    } else {
                                                        echo $row_other["First_Name"]." ".$row_other["Last_Name"];
                                                    } ?>
                                                </div>
                                            </div>
                                        </md-card-header>
                                    </div>
                                    <div style="display:flex; flex-direction: column; justify-content: flex-end;">
                                        <md-button style="margin-bottom: 15px" class="md-primary md-raised" href="message.php?user=<?php echo $row_other["id"];
                                        if ($row_con["post"]!=0) {
                                            echo "&post=".$row_con["post"];
                                        } ?>">
                                            <?php echo $open_conversation; ?>
                                        </md-button>
                                    </div>
                                </div>
                            </md-card>

                            <?php
                                    }
                                }

                            ?>
                        </div>
                    </div>
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>