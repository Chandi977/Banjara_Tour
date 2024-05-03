<?php
include("../config.php"); // Include the config.php file to establish the database connection

$al = mysqli_connect($host, $username, $password, $database); // Establish the database connection using the configuration from config.php

if (!$al) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['del']) && $_GET['del'] != NULL) {
    $d = $_GET['del'];
    mysqli_query($al, "DELETE FROM holiday WHERE id='$d'");
    header("location:holiday.php");
} elseif (isset($_GET['d']) && $_GET['d'] != NULL) {
    $d = $_GET['d'];
    mysqli_query($al, "DELETE FROM bookings WHERE id='$d'");
    header("location:dashboard.php");
} elseif (isset($_GET['dd']) && $_GET['dd'] != NULL) {
    $dd = $_GET['dd'];
    mysqli_query($al, "DELETE FROM bookings WHERE id='$dd'");
    header("location:dashboard.php");
}
?>