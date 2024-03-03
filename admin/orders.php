<?php

session_start();

if (!isset($_SESSION['aid'])) {
	header("location:admin/admin.php");
} else {
	$al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
	$aid = $_SESSION['aid'];
	$a = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
	$b = mysqli_fetch_array($a);
	$name = $b['name'];
}

?>


<html>



</html>