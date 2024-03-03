<?php
session_start();
$aid = $_SESSION['aid'];
if (!isset($_SESSION['aid'])) {
	header("location:admin.php");
}
$info = "";
$conn = mysqli_connect("localhost", "root", "", "banjara tour and travel");
$a = mysqli_query($conn, "SELECT * FROM admin WHERE aid='$aid'");
$b = mysqli_fetch_array($a);
$pass = $b['password'];
$name= $b["name"];
if (isset($_POST['sub'])) {
	$old = $_POST['old'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	if ($old != $pass) {
		echo "<script> alert('Incorrect Old Password');
				window.location.href = 'dashboard.php';
			  </script>";
	} elseif ($p1 != $p2) {
		echo "<script> alert('confirm Password did not match.');
				window.location.href = 'dashboard.php';
			  </script>";
	} else {
		mysqli_query($conn, "UPDATE admin SET password='$p2' WHERE aid='$aid'");
		echo "<script> alert('Welcome $name ');
				window.location.href = 'dashboard.php';
			  </script>";
	}
}
?>

<html>


</html>