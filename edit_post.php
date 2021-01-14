<?php
    require("./utilities/config.php");
?>
<?php
    if (!isset($_REQUEST["id"])) {
        $list = true;
    } else {
        $post_id = $_REQUEST["id"];
        $sql_post = "SELECT * FROM `posts` WHERE id=$post_id";
        $result_post = $conn->query($sql_post);
        if ($result_post->num_rows==0) {
            header("Location: 404.php");
        } else {
            $row_post = $result_post->fetch_assoc();
            if ($_SESSION["user"]!=$row_post["Author"]) {
                header("refresh:5;url=profile.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title>Edit post</title>
    <link rel="stylesheet" href="styles/create_listing/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="https://cdn.tiny.cloud/1/7iztqib7i46uhcftx4r8j5kkqerxrc7hhtdgg6nj0epw5xb1/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <?php
            if ($_COOKIE["theme"]=="dark") {
                ?>
    <script>
    tinymce.init({
        skin: 'oxide-dark',
        content_css: 'dark',
        selector: '#post',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <?php
            } else {
                ?>
    <script>
    tinymce.init({
        skin: 'oxide',
        selector: '#post',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <?php
            }
        ?>

    <?php
    if (!isset($list)) {
        echo '<script defer>
    var checkExist = setInterval(function() {
        if ($(".md-input").length) {
            var title = $(".md-input")[0];
            var reward = $(".md-input")[1];
            title.value = "'.$row_post["Title"].'";
            reward.value = "'.$row_post["Reward"].'";
            clearInterval(checkExist);
        }
    }, 100);
    </script>';
    }
    ?>
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
                        <?php
                            if (isset($list)) {
                                ?>
                        <h2 style="margin-bottom: 40px"><?php echo $your_posts; ?></h2>
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
                                        <img src="media/pexels-cottonbro-3585093.jpg<?php //echo $row["image"]?>"
                                            alt="User" />
                                    </md-card-media>
                                    <md-card-header>
                                        <a href="user.php?id=<?php echo $row["author_id"] ?>">
                                            <div class="md-title"><?php echo $row["author"] ?></div>
                                        </a>
                                        <div class="md-caption"><?php echo $row["mail"] ?></div>
                                        <div class="md-subheading">
                                            <?php echo $row["Title"] ?><?php if ($row["Is_Finished"]==1) {
                                        echo " "; ?>
                                            <div style="display: inline-block;" class="text-primary">
                                                (<?php echo $completed; ?>)
                                            </div>
                                            <?php
                                    } ?>
                                        </div>
                                        <div class="md-caption" style="margin-top: 5px">
                                            <?php echo $row["Reward"] ?><?php echo $currency; ?>
                                        </div>
                                    </md-card-header>
                                </div>
                                <div style="display:flex; flex-direction: column; justify-content: space-between;">
                                    <div class="date md-caption">
                                        <?php echo $posted_on ?>: <?php echo date("d/m/Y - h:i:sa", $row["Date"]); ?>
                                    </div>
                                    <md-button style="margin-bottom: 15px" class="md-primary md-raised"
                                        href="./post.php?id=<?php echo $row["id"] ?>">
                                        <?php echo $go_to_page ?>
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
                            } else {
                                if ($_SESSION["user"]!=$row_post["Author"]) {
                                    ?>
                        <h1 style="margin-top: 50px; margin-bottom: 25px;"><?php echo $no_permission; ?>
                        </h1>
                        <h3 style="margin-bottom: 50px;"><?php echo $redirect; ?></h3>
                        <?php
                                } else {
                                    if (!isset($_POST["title"])) {
                                        ?>
                        <form action="" method="post">
                            <md-field class="md-focused">
                                <label><?php echo $title; ?></label>
                                <md-input minlength="3" name="title" v-model="initial" required></md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label><?php echo $reward ?></label>
                                <md-input pattern="^[0-9]*$" name="reward" v-model="type" required></md-input>
                            </md-field>
                            <div style="margin-top: 25px; margin-bottom: 10px; text-align: left;"
                                class="text-info md-caption">
                                * <?php echo $spam; ?></div>
                            <textarea minlength="100" name="post" id="post" cols="100" rows="50">
                                    <?php
                                        echo $row_post["Body"]; ?>
                            </textarea>
                            <p id="body_error" class="text-danger"><?php echo $err; ?></p>
                            <md-button type="submit" id="submit" class="md-primary md-raised">
                                <?php echo $edit; ?>
                            </md-button>
                        </form>
                        <?php
                                    } else {
                                        $title = $_POST["title"];
                                        $reward = $_POST["reward"];
                                        $body = $_POST["post"];

                                        $title = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($title))));
                                        $reward = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($reward))));
                                        $body = mysqli_real_escape_string($conn, htmlspecialchars(trim($body)));

                                        $error_message = "<h1>An Error occured while processing your request which prevented it finalization. Please try again.</h1>";

                                        if (strlen($title)<=3) {
                                            echo $error_message;
                                        } elseif (!preg_match("/^[0-9]*$/", $reward)||strlen($reward)==0) {
                                            echo $error_message;
                                        } elseif (strlen($body)<100) {
                                            echo $error_message;
                                        } else {
                                            $sql = "UPDATE `posts` SET `Title`='$title',`Reward`='$reward',`Date`='".time()."',`Body`='$body' WHERE id=$post_id";
                                            if ($conn->query($sql) === true) {
                                                echo "<script defer> location.replace('post.php?id=$post_id'); </script>";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        }
                                    }
                                }
                            }
                        ?>
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