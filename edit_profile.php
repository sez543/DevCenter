<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title>Edit profile</title>
    <base target="_parent">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <link rel="stylesheet" href="styles/edit_profile/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/edit_profile.js" defer></script>
    <script src="https://cdn.tiny.cloud/1/7iztqib7i46uhcftx4r8j5kkqerxrc7hhtdgg6nj0epw5xb1/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <?php
            if ($_COOKIE["theme"]=="dark") {
                ?>
    <script>
    tinymce.init({
        skin: 'oxide-dark',
        content_css: 'dark',
        selector: '#resume',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <script>
    tinymce.init({
        skin: 'oxide-dark',
        content_css: 'dark',
        selector: '#portfolio',
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
        selector: '#resume',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <script>
    tinymce.init({
        skin: 'oxide',
        selector: '#portfolio',
        height: '1000px',
        statusbar: false,
    });
    </script>
    <?php
            }
            $sql = "SELECT * FROM `users` WHERE id=".$_SESSION["user"];
            $result = $conn->query($sql);
            $row_profile = $result->fetch_assoc();
            echo '<script defer>
        var checkExist = setInterval(function() {
        if ($(".md-input").length) {
            var phone = $(".md-input")[1];
            var desc = $(".md-input")[2];
            var github = $(".md-input")[3];
            var facebook = $(".md-input")[4];
            var linkedin = $(".md-input")[5];
            var twitter = $(".md-input")[6];
            phone.value = "'.$row_profile["Phone_Number"].'";
            desc.value = "'.$row_profile["Brief_Desription"].'";
            github.value = "'.$row_profile["GitHub"].'";
            facebook.value = "'.$row_profile["Facebook"].'";
            linkedin.value = "'.$row_profile["LinkedIn"].'";
            twitter.value = "'.$row_profile["Twitter"].'";
            clearInterval(checkExist);
        }
    }, 100);
    </script>';
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
                    <md-card id="page" class="border border-light content card testimonial-card">
                        <?php
                            if (!isset($_POST["phone"])) {
                                ?>
                        <form id="form_main" action="" method="post" enctype="multipart/form-data">
                            <div class="image">
                                <div class="avatar mx-auto white" style="height: 107px; min-width: 106px;">
                                    <img style="object-fit: cover; height:97px;"
                                        src="<?php echo $row_profile["Profile_Picture"]; ?>" class="rounded-circle"
                                        alt="avatar">
                                </div>
                                <md-field class="md-focused">
                                    <label><?php echo $upload; ?></label>
                                    <md-file id="select" onchange="changeImage(this)" name="image" accept="image/*"
                                        placeholder="<?php echo $row_profile["Profile_Picture"]?>" />
                                </md-field>
                            </div>
                            <md-field class="md-focused">
                                <label><?php echo $phone; ?></label>
                                <md-input type="tel" aria-describedby="defaultRegisterFormPhoneHelpBlock" name="phone"
                                    pattern="^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$"
                                    required>
                                </md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label><?php echo $description; ?></label>
                                <md-input type="text" name="description">
                                </md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label>Github</label>
                                <md-input type="text" name="github">
                                </md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label>Facebook</label>
                                <md-input type="text" name="facebook">
                                </md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label>LinkeIn</label>
                                <md-input type="text" name="linkedin">
                                </md-input>
                            </md-field>
                            <md-field class="md-focused">
                                <label>Twitter</label>
                                @<md-input type="text" name="twitter">
                                </md-input>
                            </md-field>
                            <h4 style="margin-top: 50px; margin-bottom: 15px; text-align: left;" class="text-primary">
                                * <?php echo $resume; ?></h4>
                            <textarea minlength="100" name="resume" id="resume" cols="100" rows="50">
                                    <?php
                                        echo $row_profile["Resume"]; ?>
                            </textarea>
                            <?php
                            if (isset($_REQUEST["error_resume"])) {
                                ?>
                            <p class="text-danger"><?php echo $err; ?></p>
                            <?php
                            } ?>
                            <h4 style="margin-top: 50px; margin-bottom: 15px; text-align: left;" class="text-primary">
                                * <?php echo $portfolio; ?></h4>
                            <textarea minlength="100" name="portfolio" id="portfolio" cols="100" rows="50">
                                    <?php
                                        echo $row_profile["Portfolio"]; ?>
                            </textarea>
                            <?php
                            if (isset($_REQUEST["error_portfolio"])) {
                                ?>
                            <p class="text-danger"><?php echo $err; ?></p>
                            <?php
                            } ?>
                            <md-button type="submit" id="submit" class="md-primary md-raised">
                                <?php echo $edit; ?>
                            </md-button>
                        </form>
                        <?php
                            } else {
                                $error_message = "<h1>An Error occured while processing your request which prevented it finalization. Please try again.</h1>";

                                if ($_FILES["image"]["size"]>0) {
                                    //Check validity
                                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                                    if ($check === false) {
                                        $image_error = true;
                                    }
                                    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                                    && $imageFileType != "gif") {
                                        $image_error = true;
                                    }

                                    if (!isset($image_error)) {
                                        //Create the user media directory if one does not already exist
                                        if (!is_dir("./media/profile/".$row_profile["id"])) {
                                            mkdir("./media/profile/".$row_profile["id"]);
                                        }
                                        // Create the image path
                                        $path = "media/profile/".$row_profile["id"]."/profile.".strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
                                        //Upload File
                                        move_uploaded_file($_FILES["image"]["tmp_name"], $path);
                                        switch ($imageFileType) {
                                            case "jpg":
                                                $im = imagecreatefromjpeg($path);
                                                break;
                                            case "jpeg":
                                                $im = imagecreatefromjpeg($path);
                                                break;
                                            case "png":
                                                $im = imagecreatefrompng($path);
                                                break;
                                            case "gif":
                                                $im = imagecreatefromgif($path);
                                                break;
                                        }
                                        $size = min(imagesx($im), imagesy($im));
                                        $side = abs(imagesx($im)-imagesy($im))/2;
                                        $x = 0;
                                        $y = 0;
                                        if (imagesx($im)<imagesy($im)) {
                                            $y = $side;
                                        } else {
                                            $x = $side;
                                        }
                                        $im = imagecrop($im, ['x' => $x, 'y' => $y, 'width' => $size, 'height' => $size]);
                                        imagepng($im, $path);
                                        imagedestroy($im);
                                    }
                                } else {
                                    $path = $row_profile["Profile_Picture"];
                                }

                                //Get the entire form data
                                $phone = $_POST["phone"];
                                $desc = $_POST["description"];
                                $github = $_POST["github"];
                                $facebook = $_POST["facebook"];
                                $linkedin = $_POST["linkedin"];
                                $twitter = $_POST["twitter"];
                                $resume = $_POST["resume"];
                                $portfolio = $_POST["portfolio"];
                                //Filter/Sanitize
                                $phone = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($phone))));
                                $desc = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($desc))));
                                $github = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($github))));
                                $facebook = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($facebook))));
                                $linkedin = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($linkedin))));
                                $twitter = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($twitter))));
                                $resume = mysqli_real_escape_string($conn, htmlspecialchars(trim($resume)));
                                $portfolio = mysqli_real_escape_string($conn, htmlspecialchars(trim($portfolio)));

                                if (isset($image_error)) {
                                    echo $error_message;
                                } elseif (!preg_match("/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/", $phone)) {
                                    echo $error_message;
                                } else {
                                    $sql = "UPDATE `users` SET `Phone_Number`='$phone',`Brief_Desription`='$desc',`Resume`='$resume',`Portfolio`='$portfolio', `GitHub`='$github', `Facebook`='$facebook', `LinkedIn`='$linkedin', `Twitter`='$twitter', `Profile_Picture`='$path' WHERE id=".$row_profile["id"];
                                    if ($conn->query($sql) === true) {
                                        echo "<script defer> location.replace('profile.php'); </script>";
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