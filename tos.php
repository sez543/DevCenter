<?php
    require("./utilities/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <link rel="stylesheet" href="styles/contacts/styles.css">
    <script src="scripts/main.js" defer></script>
    <link rel="stylesheet" href="styles/tos/styles.css">
</head>

<body style="height: 100%">
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <md-content class="md-scrollbar">
            <div class="padding">
                <md-card class="tos_card border border-light">
                    <?php echo htmlspecialchars_decode($tos_terms); ?>
                </md-card>
            </div>
            <?php
                require('components/footer.php');
            ?>
        </md-content>
    </div>
</body>

</html>