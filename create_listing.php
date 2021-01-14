<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title>Create Lisitng</title>
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
        plugins: 'image',
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
        plugins: 'image',
        selector: '#post',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <?php
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
                            if (!isset($_POST["title"])) {
                                ?>
                        <form action="" method="post">
                            <md-field>
                                <label><?php echo $title_s; ?></label>
                                <md-input minlength="3" name="title" v-model="type" required></md-input>
                            </md-field>
                            <md-field>
                                <label><?php echo $reward; ?></label>
                                <md-input pattern="^[0-9]*$" name="reward" v-model="type" required></md-input>
                            </md-field>
                            <div style="margin-top: 25px; margin-bottom: 10px; text-align: left;"
                                class="text-info md-caption">
                                * <?php echo $spam; ?></div>
                            <textarea minlength="100" name="post" id="post" cols="100" rows="50"></textarea>
                            <p id="body_error" class="text-danger"><?php echo $err; ?></p>
                            <md-button type="submit" id="submit" class="md-primary md-raised">
                                <?php echo $create; ?>
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
                                } else {
                                    $sql = "INSERT INTO `posts`(`Author`, `Title`, `Reward`, `Date`, `Is_Finished`, `Body`) VALUES ('".$_SESSION["user"]."','$title','$reward','".time()."','0', '$body')";
                                    if ($conn->query($sql) === true) {
                                        $last_id = $conn->insert_id;
                                        echo "<script defer> location.replace('post.php?id=$last_id'); </script>";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
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