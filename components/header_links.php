<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--! Bootstrap Material CSS-->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

<!--! Bootstrap Material JS-->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js">
</script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<!-- VueJS-->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<!--! Material UI-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic|Material+Icons" />
<link rel="stylesheet" href="styles/vue-material.css" />
<?php
        if (isset($_COOKIE["theme"])) {
            if ($_COOKIE["theme"]=="light") {
                ?>
<link id="theme" rel="stylesheet" href="styles/default-theme.css" />
<?php
            } else {
                ?>
<link id="theme" rel="stylesheet" href="styles/default-dark-theme.css" />
<?php
            }
        } else {
            ?>
<link id="theme" rel="stylesheet" href="styles/default-theme.css" />
<?php
        }
?>
<script src="scripts/vue-material.js" defer></script>
<script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/cookie-bar/cookiebar-latest.min.js?theme=flying&always=1&showPolicyLink=1&privacyPage=privacy.php"
    defer>
</script>
<link rel="stylesheet" href="styles/universal_styles.css">
<link rel="stylesheet" href="styles/navigation/styles.css">
<link rel="stylesheet" href="styles/footer/styles.css">
<script src="scripts/loading.js" defer></script>
<link rel="shortcut icon" href="media/logo/freelance-work.svg" />