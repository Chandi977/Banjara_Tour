<?php

$al = mysqli_connect("localhost", "root", "", "banjara tour and travel");

if ($_GET['del'] != NULL) {
	$d = $_GET['del'];
	mysqli_query($al, "DELETE FROM holiday WHERE id='$d'");
	header("location:holiday.php");
} elseif ($_GET['d'] != NULL) {
	$d = $_GET['d'];
	mysqli_query($al, "DELETE FROM bookings WHERE id='$d'");
	header("location:dashboard.php");
} elseif ($_GET['dd']) {
	$dd = $_GET['dd'];
	mysqli_query($al, "DELETE FROM bookings WHERE id='$dd'");
	header("location:dashboard.php");
}
?>