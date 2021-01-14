<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title>DevCenter.org</title>
    <link rel="stylesheet" href="styles/index/styles.css">
    <script src="scripts/main.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <md-card style="text-align: center" id="first">
                    <md-card-header class="title" style="line-height: initial;">
                        <?php echo $title_index; ?>
                    </md-card-header>
                    <md-card-content> </md-card-content>
                    <md-card-actions style="justify-content: center">
                        <md-button href="all_posts.php" class="md-primary md-raised"><?php echo $button; ?></md-button>
                    </md-card-actions>
                </md-card>
                <md-card class="border border-light" id="second">
                    <md-card-area style="flex: 1.5">
                        <md-card-header style="text-align: center;" class="md-display-1"><?php echo $from_today ?>
                        </md-card-header>
                        <md-card-content>
                            <?php
                                        $today_start = strtotime(date("Y/m/d"));
                                        $sql = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM posts LEFT JOIN users ON posts.Author = users.id WHERE posts.Date>$today_start";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows==0) {
                                            ?>
                            <div style="text-align:center; margin-bottom: 20px; margin-top: 40px;"
                                class="md-subheading"><?php echo $no_new_listings_have_been_posted_today; ?> <a
                                    href="all_posts.php"><?php echo $here; ?></a></div>
                            <?php
                                        } else {
                                            $total = $result->num_rows;
                                            $num_pages = ceil($total/10); ?>

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php
                                    for ($page = 1;$page<=$num_pages;$page++) {
                                        ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if ($page==1) {
                                            echo "active";
                                        } ?>" id="home-tab" data-toggle="tab" href="#page-<?php echo $page; ?>"
                                        role="tab" aria-controls="home" aria-selected="<?php if ($page==1) {
                                            echo "true";
                                        } else {
                                            echo "false";
                                        } ?>"><?php echo $page; ?></a>
                                </li>
                                <?php
                                    } ?>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <?php
                                    for ($page = 1;$page<=$num_pages;$page++) {
                                        ?>
                                <div class="tab-pane fade <?php if ($page==1) {
                                            echo "show active";
                                        } ?>" id="page-<?php echo $page; ?>" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <?php
                                        $lower_limit = ($page-1)*10;
                                        $count = 10;
                                        $sql_page = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM posts LEFT JOIN users ON posts.Author = users.id WHERE posts.Date>$today_start ORDER BY posts.Date DESC LIMIT $lower_limit,$count";
                                        $result_page = $conn->query($sql_page);
                                        while ($row = $result_page->fetch_assoc()) {
                                            ?>
                                    <md-card class="tile border border-light view overlay">
                                        <div class="cont"
                                            style="display:flex; width: 100%; justify-content: space-between;">
                                            <div class="main_content">
                                                <md-card-media>
                                                    <img src="<?php echo $row["image"]; ?>"
                                                        onerror="this.src='media/profile/default/default.png';"
                                                        alt="avatar">
                                                </md-card-media>
                                                <md-card-header>
                                                    <a class="u" href="user.php?id=<?php echo $row["author_id"] ?>">
                                                        <div class="a md-title"><?php echo $row["author"] ?></div>
                                                    </a>
                                                    <div class="m md-caption"><?php echo $row["mail"] ?></div>
                                                    <div class="t md-subheading">
                                                        <?php echo $row["Title"] ?>
                                                    </div>
                                                    <div class="r md-caption" style="margin-top: 5px">
                                                        <?php echo $row["Reward"] ?><?php echo $currency; ?>
                                                    </div>
                                                </md-card-header>
                                            </div>
                                            <div
                                                style="display:flex; flex-direction: column; justify-content: space-between;">
                                                <div class="d date md-caption">
                                                    <?php echo $posted_on; ?>
                                                    <?php echo date("d/m/Y - h:i:sa", $row["Date"]); ?>
                                                </div>
                                                <md-button style="margin-bottom: 15px" class="l md-primary md-raised"
                                                    href="./post.php?id=<?php echo $row["id"] ?>">
                                                    <?php echo $learn_more; ?>
                                                </md-button>
                                            </div>
                                        </div>
                                    </md-card>
                                    <?php
                                        } ?>
                                </div>
                                <?php
                                    } ?>
                            </div>

                        </md-card-content>
                        <?php
                                        }
                        ?>
                    </md-card-area>
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>