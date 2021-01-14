<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title><?php echo $jobs; ?></title>
    <link rel="stylesheet" href="styles/all_posts/styles.css">
    <script src="scripts/main.js" defer></script>
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <script type="text/javascript"
        src="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/js/mdb.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.mdb-select').materialSelect();
    });
    </script>
    <script src="scripts/search.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <div id="a" class="md-scrollbar md-theme-default">
            <md-content style="flex: 1; flex-basis: 500vh">
                <div class="padding">
                    <md-card id="list" class="border border-light">
                        <md-card-area>
                            <md-toolbar style="padding: 0">
                                <form style="padding: 0 16px;" action="" method="GET">
                                    <md-field>
                                        <label><?php echo $discover; ?></label>
                                        <md-input id="main" onkeyup="AddTimer()" onkeydown="RemoveTimer()" type="text"
                                            name="query">
                                        </md-input>
                                    </md-field>
                                    <md-button onclick="drop()" class="drop md-icon-button">
                                        <md-icon>keyboard_arrow_down</md-icon>
                                    </md-button>
                                    <div class="animated fadeIn fast dropdown"
                                        style="width: 100%; margin-bottom: 15px; padding: 20px 0;">
                                        <div class="md-layout md-gutter">
                                            <div class="md-layout-item md-small-size-100">
                                                <md-field>
                                                    <label for="user"><?php echo $user_src; ?></label>
                                                    <md-input onkeyup="AddTimer()" onkeydown="ClearTimer()" name="user"
                                                        id="user" />
                                                </md-field>
                                            </div>
                                            <div class="md-layout-item md-small-size-50">
                                                <md-field>
                                                    <label for="user"><?php echo $min_reward; ?></label>
                                                    <md-input onkeyup="AddTimer()" onkeydown="ClearTimer()" name="user"
                                                        id="min" />
                                                </md-field>
                                            </div>
                                            <div class="md-layout-item md-small-size-50">
                                                <md-field>
                                                    <label for="user"><?php echo $max_reward; ?></label>
                                                    <md-input onkeyup="AddTimer()" onkeydown="ClearTimer()" name="user"
                                                        id="max" />
                                                </md-field>
                                            </div>
                                            <div class="md-layout-item md-small-size-100">
                                                <select onchange="search()" class="mdb-select md-form" id="date">
                                                    <option value="all"><?php echo $all_time; ?></option>
                                                    <option value="today"><?php echo $day; ?></option>
                                                    <option value="td"><?php echo $td; ?></option>
                                                    <option value="week"><?php echo $week; ?></option>
                                                    <option value="month"><?php echo $month; ?></option>
                                                </select>
                                            </div>
                                            <div class="md-layout-item md-small-size-100">
                                                <select onchange="search()" class="mdb-select md-form" id="sort">
                                                    <option selected disabled value="default"><?php echo $sort; ?>
                                                    </option>
                                                    <option value="Date"><?php echo $sort; ?></option>
                                                    <option value="Title"><?php echo $title_s; ?></option>
                                                    <option value="Reward"><?php echo $reward; ?></option>
                                                    <option value="User"><?php echo $user_src; ?></option>
                                                </select>
                                            </div>
                                            <div class="md-layout-item md-small-size-100 md-size-10">
                                                <select onchange="search()" class="mdb-select md-form" id="order">
                                                    <option value="DESC"><?php echo $desc; ?></option>
                                                    <option value="ASC"><?php echo $asc; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </md-toolbar>
                        </md-card-area>
                        <md-card-content>
                            <div class="content">
                                <md-card class="side md-elevation-0">
                                    <div class="sub-loading" style="background-color: <?php echo $theme; ?>">
                                        <div class="orbit-spinner">
                                            <div class="orbit"></div>
                                            <div class="orbit"></div>
                                            <div class="orbit"></div>
                                        </div>
                                    </div>
                                    <div class="scroll md-scrollbar md-theme-default">
                                        <?php
                                        $sql = "SELECT users.Profile_Picture AS image, posts.id, users.id AS author_id, CONCAT(users.First_Name, ' ', users.Last_Name) AS author, users.mail, posts.Title, posts.Reward, posts.Date, posts.Body, posts.Is_Finished FROM posts LEFT JOIN users ON posts.Author = users.id WHERE posts.Is_Finished='0' ORDER BY posts.Date DESC";
                                        
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                            // echo "id: " . $row["id"]. " - Title: " . $row["Title"]. "<br>";?>
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
                                                    <md-button style="margin-bottom: 15px"
                                                        class="l md-primary md-raised"
                                                        href="./post.php?id=<?php echo $row["id"] ?>">
                                                        <?php echo $learn_more; ?>
                                                    </md-button>
                                                </div>
                                            </div>
                                        </md-card>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </md-card>
                            </div>
                        </md-card-content>
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