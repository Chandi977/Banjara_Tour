<?php
session_start();
include "../config.php"; // Include the config file to establish database connection

// Check if the admin session is set
if (!isset($_SESSION['aid'])) {
    header("location:admin.php"); // Redirect to admin login page if session is not set
}

// Assign session aid to a variable
$aid = $_SESSION['aid'];

// Initialize info variable
$info = "";

// Fetch admin data from database based on session aid
$a = mysqli_query($conn, "SELECT * FROM admin WHERE aid='$aid'");
$b = mysqli_fetch_array($a);
$pass = $b['password'];
$name = $b["name"];

// Check if form is submitted
if (isset($_POST['sub'])) {
    $old = $_POST['old'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];

    // Check if old password matches the one stored in the database
    if ($old != $pass) {
        echo "<script> alert('Incorrect Old Password');
                window.location.href = 'dashboard.php';
              </script>";
    } elseif ($p1 != $p2) { // Check if new passwords match
        echo "<script> alert('Confirm Password did not match.');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        // Update admin password in the database
        mysqli_query($conn, "UPDATE admin SET password='$p2' WHERE aid='$aid'");
        echo "<script> alert('Welcome $name ');
                window.location.href = 'dashboard.php';
              </script>";
    }
}
?>

<html>
<!-- Your HTML content goes here -->

</html>