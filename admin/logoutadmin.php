<?php
session_start();
session_destroy();
echo "
	<script> alert('Logout Successfull.');
			window.location.href = '../index.php';
	</script>";
?>