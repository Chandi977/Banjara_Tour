<?php
 session_start();
 $name = " ";
 $info = "";
 if (!isset($_SESSION['id'])) {
   $name = '';
   echo "<script>alert('You must have to login first to do this task.'); window.location.href = '../../index.php';</script>";
 
   // header("location:../index.php");
 
 } else {
   $id = $_SESSION['id'];
 //   $uname=$_SESSION['uname'];
   $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
   $a = mysqli_query($al, "SELECT * FROM customers WHERE id='$id'");
   $b = mysqli_fetch_array($a);
   $name = $b['name'];
   $email=$b['email'];
 }
if (isset($_GET['sub'])) {
    $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
    $id = $_GET['sub'];
    $p = mysqli_query($al, "SELECT * FROM holiday WHERE id='$id'");
    $q = mysqli_fetch_array($p);
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $adult = $_GET['adult'];
    $children = $_GET['children'];
    $person=$adult+$children;
    $room = $_GET['room'];
    $extra=$_GET['extra'];
    $extradata = implode(",",$extra);
    $firstDate  = new DateTime($checkin);
    $secondDate = new DateTime($checkout);
    $intvl = $firstDate->diff($secondDate);
    $days=$intvl->days;
    $pack = $q['name'];
    $hotel = $q['subdesti'];

    $hotelcharge = $q['hotelcharge'];
    $guidecharge = $q['guidecharge'];
    $totalguidecharge = ($days)*$guidecharge;
    $totalhotelcharge = $hotelcharge*($days-1);
    $amount = $q['amount'];
    $totalamount = $totalhotelcharge + $totalguidecharge;
    $percentage = (5/100)*$totalamount;
    $total = $totalamount+$percentage;
    // $sql=;
	if ($checkin != NULL && $checkout != NULL && $adult != NULL && $children != NULL&& $room != NULL&& $extra != NULL&& $pack != NULL&& $hotel != NULL&& $total != NULL) {
		$result = mysqli_query($al, "INSERT INTO cart(name,hotelid, email, checkin, checkout, adult, children, room, days, extra, destination, hotel, total) VALUES('$name',$id,'$email','$checkin','$checkout',$adult,$children,$room,$days,'$extradata','$pack','$hotel',$total)");
		if ($result) {
			echo '<script>alert("Added to Cart");</script>';
            $cartid = mysqli_query($al,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'banjara tour and travel' AND TABLE_NAME = 'cart'");
            $cartdata= mysqli_fetch_array($cartid);
            $cartdata=$cartdata[0]-1;
            header("location:../payment-methode.php?cartid=$cartdata");
		} else {
			echo '<script>confirm("Email Id is already taken.");</script>';
			// $info = "Email ID Already Exists";
			
		}
	} else {
		$info = "Email or Password is required and not be empty.";
		// header("location:../index.php");
	}
}

// user\payment-methode.php
?>