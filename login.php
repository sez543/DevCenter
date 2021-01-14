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
    <title>Login</title>
    <link rel="stylesheet" href="styles/login/styles.css">
    <script src="scripts/main.js" defer></script>
    <script src="scripts/login.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <md-card class="form_card">
                    <!-- Default form login -->
                    <?php
                        if (!isset($_POST["mail"])) {
                            ?>
                    <form id="login" class="text-center border border-light p-5" action="" method="POST">

                        <p class="h4 mb-4"><?php echo $sign_in; ?></p>

                        <!-- Email -->
                        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail"
                            name="mail" required>

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4"
                            placeholder="<?php echo $password; ?>" name="password" required>

                        <div>
                            <div>
                                <!-- Forgot password -->
                                <a href="forgotten_password.php"><?php echo $forgotten; ?></a>
                            </div>
                        </div>

                        <!-- Sign in button -->
                        <button type="submit" id="login_button" class="btn btn-primary btn-block my-4"
                            onclick="login()"><?php echo $sign_in; ?></button>

                        <p id="login_error" class="text-danger"><?php echo $incorrect; ?></p>

                        <!-- Register -->
                        <p><?php echo $not_a_member; ?>
                            <a href="register.php"><?php echo $register; ?></a>
                        </p>

                    </form>
                    <?php
                        } else {
                            $email = $_POST["mail"];
                            $password = $_POST["password"];

                            //Input sanitization
                            $email = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($email))));
                            $password = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($password))));

                            $error_message = "<h1>.$error_login.</h1>";
                        
                            //Server-side validation
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                // EMAIL Error
                                $error = true;
                                echo $error_message;
                            } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
                                // Password Error
                                $error = true;
                                echo $error_message;
                            } else {
                                //No Error
                                $sql = "SELECT * FROM `users` WHERE mail='$email'";
                                $result = $conn->query($sql);
                                if ($result->num_rows==0) {
                                    $error = true;
                                    echo $error_message;
                                } else {
                                    $row = $result->fetch_assoc();
                                    if (md5($password)==$row["password"]) {
                                        $sql_u = "UPDATE `users` SET `Last_Login_Date`=".time()." WHERE id=".$row["id"];
                                        $_SESSION["user"] = $row["id"];
                                        echo "<script> location.replace('profile.php'); </script>";
                                    } else {
                                        $error = true;
                                        echo $error_message;
                                    }
                                }
                            }
                        }
                    ?>
                    <!-- Default form login -->
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>