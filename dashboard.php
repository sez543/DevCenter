<?php
    //Configuration file / Конфигурационен файл
    require("./utilities/config.php");
?>
<?php
    //Access control / Контрол за достъп
    if (!isset($_SESSION["user"])) {
        //If the user hasn't signed in - Redirect / Ако потребителят не се вписал - Препрати
        header("Location: 403.php");
    } else {
        $sql_a = "SELECT * FROM `users` WHERE id=".$_SESSION["user"];
        $result_a = $conn->query($sql_a);
        $row_a = $result_a->fetch_assoc();
        if ($row_a["Is_Admin"]!="1") {
            header("Location: 403.php");
        }
    }
?>

<?php
if (isset($_POST["del"])) {
    $sql_update = "UPDATE `users` SET `Is_Moderator`='0' WHERE id=".$_POST["del"];
    $conn->query($sql_update);
}
?>

<?php
if (isset($_POST["mod"])) {
    $sql_update = "UPDATE `users` SET `Is_Moderator`='1' WHERE id=".$_POST["mod"];
    $conn->query($sql_update);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require('components/header_links.php');
    ?>
    <link rel="stylesheet" href="styles/post/styles.css">
    <link rel="stylesheet"
        href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <script src="scripts/main.js" defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $dashboard; ?></title>
    <script type="text/javascript"
        src="Admin_Dashboard/Admin-Dashboard-Template-Bootstrap-master/js/jquery-3.4.1.min.js" defer>
    </script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="Admin_Dashboard/Admin-Dashboard-Template-Bootstrap-master/js/popper.min.js"
        defer>
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="Admin_Dashboard/Admin-Dashboard-Template-Bootstrap-master/js/bootstrap.min.js"
        defer>
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="Admin_Dashboard/Admin-Dashboard-Template-Bootstrap-master/js/mdb.min.js" defer>
    </script>
    <script src="scripts/dashboard.js" defer>

    </script>
    <script src="scripts/search_users.js" defer></script>
    <style>
    .scroll {
        overflow: auto;
        height: 500px;
        max-width: 100%;
    }
    </style>
</head>

<body>
    <div id="app">
        <?php
            require('components/navbar.php');
        ?>
        <div id="a" class="md-scrollbar md-theme-default">
            <md-content style="flex: 1; flex-basis: 500vh">
                <div class="padding">
                    <md-card id="page" class="border border-light">



                        <!--Main layout-->
                        <main class="pt-2">
                            <div class="container-fluid">
                                <!-- Heading -->
                                <div class="md-card mb-4 wow fadeIn border border-white">
                                    <!--Card content-->
                                    <div style="justify-content: center;" class="card-body d-sm-flex">
                                        <h4 class="mb-2 mb-sm-0 pt-1">
                                            <div class="md-display-1"><?php echo $dashboard; ?></div>
                                        </h4>
                                    </div>
                                </div>
                                <!-- Heading -->

                                <!--Grid row-->
                                <div class="row wow fadeIn">

                                    <!--Grid column-->
                                    <div class="col-md-12 mb-4">

                                        <!--Card-->
                                        <div class="scroll md-scrollbar md-theme-default md-card border border-white">
                                            <!--Card content-->
                                            <div class="card-body">
                                                <!-- Table  -->
                                                <div style="margin-bottom: 15px;" class="md-title"><?php echo $mods; ?>
                                                </div>
                                                <table class="table">
                                                    <!-- Table head -->
                                                    <thead class="md-card border border-white">
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo $first_name; ?></th>
                                                            <th><?php echo $user_score; ?></th>
                                                            <th><?php echo $joined; ?></th>
                                                            <th><?php echo $action; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Table head -->
                                                    <!-- Table body -->
                                                    <tbody>
                                                        <?php
                                                    //Fetch All users
                                                    $sql = "SELECT * FROM `users` WHERE Is_Moderator='1' AND Is_Admin='0'";
                                                    $result = $conn->query($sql);
                                                    $i = 1;
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $i;
                                                        $i++; ?></th>
                                                            <td><a style="color: unset;"
                                                                    href="user?id=<?php echo $row["id"]; ?>"><?php echo $row["First_Name"]." ".$row["Last_Name"]; ?></a>
                                                            </td>
                                                            <td><?php echo $row["Rating"]."/5"; ?></td>
                                                            <td><?php echo date("d/m/Y - h:i:sa", $row["Registration_Date"]); ?>
                                                            </td>
                                                            <td>
                                                                <form action="" method="POST"
                                                                    style="display: inline-block;">
                                                                    <input style="display: none;" type="text" name="del"
                                                                        value="<?php echo $row["id"]; ?>">
                                                                    <md-button type="submit"
                                                                        class="md-accent md-raised">
                                                                        <?php echo $remove; ?></md-button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                    <!-- Table body -->
                                                </table>
                                                <!-- Table  -->
                                            </div>
                                        </div>
                                        <!--/.Card-->

                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row wow fadeIn">
                                    <!--Grid column-->
                                    <div class="col-md-12 mb-4">

                                        <!--Card-->
                                        <div class="scroll md-scrollbar md-theme-default md-card border border-white">
                                            <!--Card content-->
                                            <div class="card-body">
                                                <div
                                                    style="display: flex; justify-content: space-between; align-items: baseline;">
                                                    <div class="md-title"><?php echo $users; ?></div>
                                                    <!-- Default input -->
                                                    <md-field style="max-width: 200px;">
                                                        <label for="user">Search</label>
                                                        <md-input id="main" onkeyup="AddTimer()"
                                                            onkeydown="ClearTimer()" />
                                                    </md-field>
                                                </div>
                                                <!-- Table  -->
                                                <table class="table">
                                                    <!-- Table head -->
                                                    <thead class="md-card border border-white">
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo $first_name; ?></th>
                                                            <th><?php echo $user_score; ?></th>
                                                            <th><?php echo $joined; ?></th>
                                                            <th><?php echo $make_mod; ?></th>
                                                        </tr>
                                                    </thead>
                                                    <!-- Table head -->
                                                    <!-- Table body -->
                                                    <tbody id="clear">
                                                        <?php
                                                        $sql="SELECT * FROM `users` WHERE 1";
                                                        $result = $conn->query($sql);
                                                        while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                        <tr style="background-color: <?php if ($row["Is_Admin"]=="1") {
                                                                echo "#ff5252";
                                                            } elseif ($row["Is_Moderator"]=="1") {
                                                                echo "#448aff";
                                                            } else {
                                                                echo "transparent";
                                                            } ?>">
                                                            <th scope="row"><?php echo $row["id"]; ?></th>
                                                            <td><a style="color: unset;"
                                                                    href="user?id=<?php echo $row["id"]; ?>"><?php echo $row["First_Name"]." ".$row["Last_Name"]; ?></a>
                                                            </td>
                                                            <td><?php echo $row["Rating"]."/5"; ?></td>
                                                            <td><?php echo date("d/m/Y - h:i:sa", $row["Registration_Date"]); ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if ($row["Is_Admin"]=="0" && $row["Is_Moderator"]=="0") {
                                                                    ?>
                                                                <form action="" method="POST"
                                                                    style="display: inline-block;">
                                                                    <input style="display: none;" type="text" name="mod"
                                                                        value="<?php echo $row["id"]; ?>">
                                                                    <md-button type="submit"
                                                                        class="md-primary md-raised">
                                                                        <?php echo $make_mod; ?></md-button>
                                                                </form>
                                                            </td>
                                                            <?php
                                                                } ?>
                                                        </tr>
                                                        <?php
                                                        }
                                                    ?>
                                                    </tbody>
                                                    <!-- Table body -->
                                                </table>
                                                <!-- Table  -->
                                            </div>
                                        </div>
                                        <!--/.Card-->

                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row wow fadeIn">
                                    <!--Grid column-->
                                    <div style="min-width: 100% !important;" class="col-md-9 mb-4">
                                        <!--Card-->
                                        <div class="md-card border border-white">
                                            <!--Card content-->
                                            <div class="card-body">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                        <!--/.Card-->
                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row wow fadeIn">

                                    <!--Grid column-->
                                    <div class="col-lg-6 col-md-6 mb-4">

                                        <!--Card-->
                                        <div class="md-card border border-white">

                                            <!-- Card header -->
                                            <div class="card-header">Line chart</div>

                                            <!--Card content-->
                                            <div class="card-body">

                                                <canvas id="lineChart"></canvas>

                                            </div>

                                        </div>
                                        <!--/.Card-->

                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-lg-6 col-md-6 mb-4">

                                        <!--Card-->
                                        <div class="md-card border border-white">

                                            <!-- Card header -->
                                            <div class="card-header">Doughnut Chart</div>

                                            <!--Card content-->
                                            <div class="card-body">

                                                <canvas id="doughnutChart"></canvas>

                                            </div>

                                        </div>
                                        <!--/.Card-->

                                    </div>
                                    <!--Grid column-->
                                </div>
                                <!--Grid row-->
                            </div>
                        </main>
                        <!--Main layout-->
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