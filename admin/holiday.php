<?php
session_start();
if (!isset($_SESSION['aid'])) {
	header("location:admin.php");
} else {
	$conn = mysqli_connect("localhost", "root", "", "banjara tour and travel");
	$aid = $_SESSION['aid'];
	$info = " ";
	if (isset($_POST['sub'])) {
		$a = mysqli_query($conn, "SELECT * FROM admin WHERE aid='$aid'");
		$b = mysqli_fetch_array($a);
		$name = $b['name'];
		$n = $_POST['name'];
		$am = $_POST['amount'];
		$subdesti = $_POST["subdesti"];
		$hotelcharge = $_POST["hotelcharge"];
		$guidecharge = $_POST["guidecharge"];
		$mobilenum = $_POST["mobilenum"];
		$holidayemail = $_POST["holidayemail"];
		$star = $_POST["star"];
		$about = $_POST["about"];
		if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0 && $n != NULL && $am != NULL) {
			$valid = ["jpg" => "image/jpg", "png" => "image/png", "jpeg" => "image/jpeg"];
			$fname = $_FILES["img"]["name"];
			$type = $_FILES["img"]["type"];
			$size = $_FILES["img"]["size"];
			$ext = pathinfo($fname, PATHINFO_EXTENSION);
			if (!array_key_exists($ext, $valid)) {
				die("Not a valid extension");
			}
			$or_size = 2 * 1024 * 1024;
			if ($size > $or_size) {
				echo "<script>alert('File size between 1kb to 2mb.'); window.location.href = 'dashboard.php';<script>";
			}
			else {
				if (in_array($type, $valid)) {
					if (file_exists("data/" . $fname)) {
						echo "<script>alert('File already exists'); window.location.href = 'dashboard.php';<script>";
					} else {
						move_uploaded_file($_FILES["img"]["tmp_name"], "data/" . $fname);
						
						$sql = mysqli_query($conn, "INSERT INTO holiday(name,amount,path,subdesti,hotelcharge,guidecharge,mobilenum,holidayemail,star,about) VALUES('$n','$am','data/$fname') ,'$subdesti','$hotelcharge','$guidecharge','$mobilenum','$holidayemail','$star','$about'");
					
						if (mysqli_query($conn, $sql)) {
							echo "<script>alert('File saved successfully'); window.location.href = 'dashboard.php';<script>";
						} else {
							echo "<script>alert(".mysqli_error($conn)."); window.location.href = 'dashboard.php';<script>";
						}
					}
				} else {
					echo "<script>alert('Unsupported Media Formate.'); window.location.href = 'dashboard.php';<script>";
				}
			}
			
		} else {
			echo "Error:" . $_FILES["img"]["error"];
			// header("location:dashboard.php");
		 }
		// $a = mysqli_query($conn, "SELECT * FROM admin WHERE aid='$aid'");
		// $b = mysqli_fetch_array($a);
		// $name = $b['name'];
		// $n = $_POST['name'];
		// $am = $_POST['amount'];
		// if ($n != NULL && $am != NULL) {
		// 	$sql = mysqli_query($conn, "INSERT INTO holiday(name,amount) VALUES('$n','$am')");
		// 	if ($sql) {
		// 		$info = "Successfully Added";
		// 		header("location:dashboard.php");
		// 	} else {
		// 		$info = "Package Name Already Exists";
		// 		header("location:dashboard.php");
		// 	}
		// } else {
		// 	$info = "Values cannot be Null";
		// 	header("location:dashboard.php");
		// }
	}
}
?>




<html>

</html>