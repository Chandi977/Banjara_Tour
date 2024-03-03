<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "banjara tour and travel");
if (!isset($_SESSION['aid'])) {
	header("location:admin.php");
}
$a = $_GET['a'];
mysqli_query($conn, "UPDATE bookings SET status='1' WHERE id='$a'");
header("location:orders.php");
?>