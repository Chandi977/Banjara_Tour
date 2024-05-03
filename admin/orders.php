<?php
session_start();

include "../config.php"; // Include the config file to establish database connection

if (!isset($_SESSION['aid'])) {
    header("location:admin.php");
} else {
    $aid = $_SESSION['aid'];
    $a = mysqli_query($conn, "SELECT * FROM admin WHERE aid='$aid'");
    $b = mysqli_fetch_array($a);
    $name = $b['name'];
}
?>

<html>
<!-- Your HTML content goes here -->

</html>