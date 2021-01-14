<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <title><?php echo $about; ?></title>
    <link rel="stylesheet" href="styles/about/styles.css">
    <script src="scripts/main.js" defer></script>
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <div class="container z-depth-1 border border-light">
                    <!--Section: Content-->
                    <section>
                        <div class="row pr-lg-5">
                            <div class="col-md-7 mb-4" style="padding-top:15px;">
                                <div class="view">
                                    <img src="media/about (1).jpg" class="img-fluid" alt="smaple image">
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <div>
                                    <h3 class="font-weight-bold mb-4"><?php echo $who_are_we; ?></h3>
                                    <p>
                                        <?php echo $first; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Section: Content-->
                </div>
                <div class="container z-depth-1 border border-light">
                    <!--Section: Content-->
                    <section>
                        <div class="row pr-lg-5">
                            <div class="col-md-5 d-flex align-items-center">
                                <div>
                                    <h3 class="font-weight-bold mb-4"><?php echo $our_history; ?></h3>
                                    <p>
                                        <?php echo $second; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-7 mb-4" style="padding-top:15px;">
                                <div class="view">
                                    <img src="media/about (2).jpg" class="img-fluid" alt="smaple image">
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Section: Content-->
                </div>
                <div class="container z-depth-1 border border-light">
                    <!--Section: Content-->
                    <section>
                        <div class="row pr-lg-5">
                            <div class="col-md-7 mb-4" style="padding-top:15px;">
                                <div class="view">
                                    <img src="media/about (3).jpg" class="img-fluid" alt="smaple image">
                                </div>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <div>
                                    <h3 class="font-weight-bold mb-4"><?php echo $our_mission; ?></h3>
                                    <p>
                                        <?php echo $third; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Section: Content-->
                </div>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>