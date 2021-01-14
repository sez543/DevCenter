<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title><?php echo $contacts; ?></title>
    <link rel="stylesheet" href="styles/contacts/styles.css">
    <script src="scripts/main.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <md-card class="contact_card border border-light">
                    <!--Section: Contact v.2-->
                    <section class="mb-4">

                        <!--Section heading-->
                        <h2 class="h1-responsive font-weight-bold text-center my-4"><?php echo $contact_us; ?></h2>
                        <!--Section description-->
                        <p class="text-center w-responsive mx-auto mb-5"><?php echo $subtitle; ?></p>

                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-9 mb-md-0 mb-5">
                                <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="name" name="name" class="form-control">
                                                <label for="name" class=""><?php echo $your_name; ?></label>
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-md-6">
                                            <div class="md-form mb-0">
                                                <input type="text" id="email" name="email" class="form-control">
                                                <label for="email" class=""><?php echo $your_email; ?></label>
                                            </div>
                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="md-form mb-0">
                                                <input type="text" id="subject" name="subject" class="form-control">
                                                <label for="subject" class=""><?php echo $subject; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Grid row-->

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-md-12">

                                            <div class="md-form">
                                                <textarea type="text" id="message" name="message" rows="2"
                                                    class="form-control md-textarea"></textarea>
                                                <label for="message"><?php echo $your_message; ?></label>
                                            </div>

                                        </div>
                                    </div>
                                    <!--Grid row-->

                                </form>

                                <div class="text-center text-md-left">
                                    <a class="btn btn-primary"
                                        onclick="document.getElementById('contact-form').submit();"><?php echo $send; ?></a>
                                </div>
                                <div class="status"></div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-3 text-center">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                        <p><?php echo $address; ?></p>
                                    </li>

                                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                        <p>+359 000 000 000</p>
                                    </li>

                                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                        <p>devit@gmail.com</p>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                        </div>

                    </section>
                    <!--Section: Contact v.2-->
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>