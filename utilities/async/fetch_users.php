<?php
require("../deny_non_ajax_access.php");
session_start();

if (!isset($_COOKIE["language"])) {
    $lang = "BG";
} else {
    if ($_COOKIE["language"]=="BG") {
        $lang = "BG";
    } else {
        $lang = "EN";
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "dev";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$main = $_REQUEST["main"];

$main = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags(trim($main))));

$sql = "SELECT * FROM `users` WHERE CONCAT(First_Name, ' ', Last_Name) LIKE '$main%'";
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
        <form action="" method="POST" style="display: inline-block;">
            <input style="display: none;" type="text" name="mod" value="<?php echo $row["id"]; ?>">
            <button type="submit" class="md-button md-primary md-raised md-theme-default">
                <div class="md-ripple">
                    <div class="md-button-content">
                        Mod</div>
                </div>
            </button>
        </form>
    </td>
    <?php
            } ?>
</tr>
<?php
}