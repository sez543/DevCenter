<?php
    require("./utilities/config.php");
?>
<?php
    if (!isset($_REQUEST["id"])) {
        header("Location: index.php");
    } else {
        if (isset($_SESSION["user"])) {
            if ($_REQUEST["id"]==$_SESSION["user"]) {
                header("Location: profile.php");
            }
        }
        $sql_user = "SELECT * FROM `users` WHERE id=".$_REQUEST["id"];
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows==0) {
            header("Location: 404.php");
        } else {
            $row_user = $result_user->fetch_assoc();
        }
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
    <script src="scripts/rate.js" defer></script>
    <?php
        if (isset($_SESSION["user"])) {
            $readonly = "false";
            $sql_rating="SELECT * FROM `ratings` WHERE `first`=".$_SESSION["user"]." AND `second`=".$_REQUEST["id"];
            $result_rating = $conn->query($sql_rating);
            if ($result_rating->num_rows==0) {
                $rating = round($row_user["Rating"], 1);
            } else {
                $row_rating = $result_rating->fetch_assoc();
                $rating = $row_rating["value"];
            }
        } else {
            $readonly = "true";
            $rating = round($row_user["Rating"], 1);
        }
        echo "<script>
    $(document).ready(function() {
        options = {
            readonly: $readonly,
            initial_value: $rating,
            step_size: 0.5,
        }
        $('.rating').rate(options);
    });
    </script>"; ?>
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
        <?php if (isset($_SESSION["user"])) {
            if ($result_rating->num_rows==0) {
                echo "color: orange;";
            }

            else {
                echo "color: #448aff;";
                $done=true;
            }
        }

        else {
            ?>color: orange;
            <?php
        }

        ?>
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
                    <md-card style="width:100%;"
                        class="user-split content card testimonial-card border border-light z-depth-1">
                        <!-- Background color -->
                        <div class="card-up primary-color lighten-1">
                            <div class="contacts">
                                <?php
                                    if (strlen($row_user["Facebook"])!=0) {
                                        ?>
                                <md-button href="https://www.facebook.com/<?php echo $row_user["Facebook"]; ?>/"
                                    class="md-icon-button md-dense">
                                    <md-icon class="text-white" id="th_ico">facebook</md-icon>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row_user["LinkedIn"])!=0) {
                                        ?>
                                <md-button href="https://www.linkedin.com/in/<?php echo $row_user["LinkedIn"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-linkedin fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row_user["Twitter"])!=0) {
                                        ?>
                                <md-button href="https://twitter.com/<?php echo $row_user["Twitter"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-twitter fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                    if (strlen($row_user["GitHub"])!=0) {
                                        ?>
                                <md-button href="https://github.com/<?php echo $row_user["GitHub"]; ?>"
                                    class="md-icon-button md-dense">
                                    <i class="fab fa-github fa-lg text-white"></i>
                                </md-button>
                                <?php
                                    }
                                ?>
                                <div style="text-align: right;">
                                    <div class="md-caption text-white"><u><?php echo $row_user["mail"]; ?></u></div>
                                    <div class="md-caption text-white"><u><?php echo $row_user["Phone_Number"]; ?></u>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Avatar -->
                        <div class="avatar mx-auto white">
                            <img src="<?php echo $row_user["Profile_Picture"]; ?>"
                                onerror="this.src='media/profile/default/default.png';" class="rounded-circle"
                                alt="avatar">
                        </div>
                        <!-- Content -->
                        <div class="card-body">
                            <!-- Name -->
                            <h4 class="card-title"><?php echo $row_user["First_Name"]." ".$row_user["Last_Name"]; ?>
                            </h4>
                            <div id="rt" class="md-body-2 rate">
                                <?php
                                    if ($row_user["Rating"]=="NA") {
                                        echo $no_user_scores;
                                    } else {
                                        echo round($row_user["Rating"], 1)."/5 ".$user_score;
                                    }
                                ?>
                            </div>
                            <div class="rating"></div>
                            <hr>
                            <!-- Quotation -->
                            <p><i class="fas fa-quote-left"></i> <?php echo $row_user["Brief_Desription"]; ?></p>
                            <hr>
                            <?php
                            if (isset($_SESSION["user"])) {
                                ?>
                            <md-button
                                style="display: block; margin: 18px auto; height: 50px; max-width: 500px; margin-top: 30px;"
                                href="message.php?user=<?php echo $_REQUEST["id"]; ?>" class="md-raised md-primary">
                                <?php echo $send_message; ?>
                            </md-button>
                            <?php
                            }
                            ?>
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
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                            <?php echo htmlspecialchars_decode($row_user["Resume"]); ?>
                        </div>
                        <div class="tab-pane fade" id="portfolio" role="tabpanel" aria-labelledby="portfolio-tab">
                            <?php echo htmlspecialchars_decode($row_user["Portfolio"]); ?>
                        </div>
                        <div class="tab-pane fade" id="ra" role="tabpanel" aria-labelledby="ra-tab">



                            <?php
                                        $post_sql = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM posts LEFT JOIN users ON posts.Author = users.id WHERE users.id=".$_REQUEST["id"];
                                        $result = $conn->query($post_sql);
                                        while ($row = $result->fetch_assoc()) {
                                            // echo "id: " . $row["id"]. " - Title: " . $row["Title"]. "<br>";?>
                            <md-card class="tile border border-light view overlay">
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
                                                <?php echo $row["Title"] ?>
                                            </div>
                                            <div class="md-caption" style="margin-top: 5px">
                                                <?php echo $row["Reward"] ?><?php echo $currency; ?>
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
                                    </div>
                                </div>
                            </md-card>
                            <?php
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