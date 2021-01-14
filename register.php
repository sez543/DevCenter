<?php
    require("./utilities/config.php");
?>
<?php
    if (isset($_SESSION["user"])) {
        header("Location: profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <link rel="stylesheet" href="styles/login/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/check_repetitions.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <md-card class="form_card">
                    <!-- Default form register -->
                    <?php
                        if (!isset($_POST["first"])) {
                            ?>
                    <form id="register" class="text-center border border-light p-5" action="" method="POST">

                        <p class="h4 mb-4"><?php echo $register; ?></p>

                        <div class="form-row mb-4">
                            <div class="col">
                                <!-- First name -->
                                <input type="text" id="defaultRegisterFormFirstName" class="form-control"
                                    placeholder="<?php echo $first_name; ?>" name="first" required>
                            </div>
                            <div class="col">
                                <!-- Last name -->
                                <input type="text" id="defaultRegisterFormLastName" class="form-control"
                                    placeholder="<?php echo $last_name; ?>" name="last" required>
                            </div>
                        </div>

                        <!-- E-mail -->
                        <!-- TODO: Check for repeating emails-->
                        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail"
                            name="mail" required>

                        <p id="mail_error" class="text-danger"><?php echo $email_taken; ?><a
                                href="login.php"><?php echo $login; ?></a>.
                        </p>

                        <!-- Password -->
                        <input type="password" id="defaultRegisterFormPassword" class="form-control"
                            placeholder="<?php echo $password; ?>"
                            aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password" minlength="8"
                            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                            <?php echo $password_req; ?>
                        </small>

                        <!-- Phone number -->
                        <input type="tel" id="defaultRegisterPhonePassword" class="form-control mb-4"
                            placeholder="<?php echo $phone ?>" aria-describedby="defaultRegisterFormPhoneHelpBlock"
                            name="phone"
                            pattern="^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$"
                            required>
                        <p id="phone_error" class="text-danger"><?php echo $phone_taken; ?></p>

                        <!-- Sign up button -->
                        <button type="submit" class="btn btn-primary my-4 btn-block"
                            onclick="sendform()"><?php echo $register; ?></button>

                        <hr>

                        <!-- Terms of service -->
                        <p><?php echo $by_clicking; ?>
                            <em><?php echo $register; ?></em><?php echo $you_agree; ?>
                            <a href="privacy.php" target="_blank"><?php echo $privacy; ?></a> <?php echo $and; ?> <a
                                href="tos.php" target="_blank"><?php echo $tos; ?></a>

                    </form>
                    <?php
                        } else {
                            $first_name = $_POST["first"];
                            $last_name = $_POST["last"];
                            $mail = $_POST["mail"];
                            $password = $_POST["password"];
                            $phone = $_POST["phone"];

                            //Tag/Escape string filter
                            $first_name = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($first_name))));
                            $last_name = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($last_name))));
                            $mail = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($mail))));
                            $password = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($password))));
                            $phone = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($phone))));
                            //Server-side validation
                            $error = false;
                            $error_message = "<h1>.$error_login.</h1>";

                            if (strlen($first_name)<=0||strlen($last_name)<=0) {
                                // Name Error
                                $error = true;
                                echo $error_message;
                            } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                // EMAIL Error
                                $error = true;
                                echo $error_message;
                            } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
                                // Password Error
                                $error = true;
                                echo $error_message;
                            } elseif (!preg_match("/^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/", $phone)) {
                                // Phone Error
                                $error = true;
                                echo $error_message;
                            } else {
                                // No Error
                                // Email repetition
                                if ($conn->query("SELECT * FROM `users` WHERE mail='$mail'")->num_rows>=1||$conn->query("SELECT * FROM `users` WHERE Phone_Number='$phone'")->num_rows>=1) {
                                    $error = true;
                                    echo $error_message;
                                } else {
                                    //Database Addition
                                    $sql = "INSERT INTO `users`(`mail`, `password`, `First_Name`, `Last_Name`, `Phone_Number`, `Brief_Desription`, `Resume`, `Portfolio`, `Rating`, `Profile_Picture`, `Is_Admin`, `Is_Moderator`, `Last_Login_Date`, `Registration_Date`) VALUES ('$mail','".md5($password)."','$first_name','$last_name','$phone','This is a Placehoder desription. You can update it alongside your resume inside your profile page.','You can add/create a resume through your profile page','You can add/create a portfolio through your profile page','NA','media/profile/default/default.png','0','0','".time()."','".time()."')";
                                    if ($conn->query($sql) === true) {
                                        $last_id = $conn->insert_id;
                                        $_SESSION["user"] = $last_id;
                                        echo "<script defer> location.replace('profile.php'); </script>";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                }
                            }
                        }
                    ?>
                    <!-- Default form register -->
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>