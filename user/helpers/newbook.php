<?php
session_start();
$email = $_SESSION['email'];
$name = $_SESSION["name"];

$amount = 0;
if ($_SESSION['email'] == null) {
header("location:../index.php");
} else {
        
    if (isset($_POST['sub'])) {
        // $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
        // $info = "";
        $id = $_POST['sub'];
        $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
        // $id = $_GET['sub'];
        $cart = mysqli_query($al, "SELECT * FROM cart WHERE id='$id'");
        $cartdata = mysqli_fetch_array($cart);
        $checkin = $cartdata['checkin'];
        $checkout = $cartdata['checkout'];
        $adult = $cartdata['adult'];
        $children = $cartdata['children'];
        $person=$adult+$children;
        $room = $cartdata['room'];
        $extra= $cartdata['extra'];
        $extradata = explode(",",$extra);
        $firstDate  = new DateTime($checkin);
        $secondDate = new DateTime($checkout);
        $intvl = $firstDate->diff($secondDate);
        $days=$intvl->days;
        $pack = $cartdata['destination'];
        $hotel = $cartdata['hotel'];
        $total = $cartdata['total'];
        
        $billname = $_POST['billname']; 
        $billemail = $_POST['billemail' ];
        $billphone = $_POST['billphone'];
        $billadd = $_POST['billaddress'];
        $billcity = $_POST['billcity'];
        $billstate = $_POST['billstate'];
        $billcountry = $_POST['billcountry'];
        $billzip = $_POST['billzip'];
        $billaddress = array($billadd,$billcity,$billstate,$billcountry,$billzip );
        $billarray=implode(",",$billaddress);
        $billupi = $_POST['billupi'];
        $billcardname = $_POST['billcardname'];
        $billcardno = $_POST['billcardno'];
        $billcardexpmonth = $_POST['billcardexpmonth'];
        $billcardexpyear = $_POST['billcardexpyear'];
        $billcardcvv = $_POST['billcardcvv'];
        $upi= "INSERT INTO invoice(userbookingid, billname, billemail, billphone, billaddress, billcity, billstate, billcountry, billzip, billupi,billamount,status) VALUES ($id,'$billname','$billemail','$billphone','$billadd','$billcity','$billstate','$billcountry','$billzip','$billupi',$total,1)";
        $card = "INSERT INTO invoice(userbookingid, billname, billemail, billphone, billaddress, billcity, billstate, billcountry, billzip, billcardname, billcardno, billcardexpmonth, billcardexpyear, billcardcvv,billamount,status) VALUES ($id,'$billname','$billemail','$billphone','$billadd','$billcity','$billstate','$billcountry','$billzip','$billcardname','$billcardno','$billcardexpmonth','$billcardexpyear','$billcardcvv',$total,1)";

        if ($billname != NULL && $billemail != NULL && $billphone != NULL && $billphone != NULL&& $billadd != NULL&& $billcity != NULL&& $billstate != NULL&& $billcountry != NULL&& $billzip != NULL && $billupi != NULL) {
		$sql = mysqli_query($al,$upi);
                if ($sql) {
                        $temp = mysqli_query($al,"INSERT INTO cart where id=$id (status) values(1)");
                        echo '<script>alert("Wait for the transaction to complete.");</script>';
                        $cartid = mysqli_query($al,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'banjara tour and travel' AND TABLE_NAME = 'invoice'");
                        $cartdata= mysqli_fetch_array($cartid);
                        $cartdata=$cartdata[0]-1;
                        $foo = mysqli_query($al, "SELECT * FROM invoice WHERE id='$cartdata'");
                        $foodata = mysqli_fetch_array($foo);
                        $footemp = $foodata['userbookingid'];
                        echo "<script> window.location.href = '../invoice.php?id=$footemp';
			</script>";
                        // header("location:../invoice.php?cartid=$id");

                } else{
                       echo '<script>alert("Something Went Wrong Please try again later.");</script>';
                }
	} else {
                $sql = mysqli_query($al,$card);
                if ($sql) {
                        echo '<script>alert("Wait for the transaction to complete.");</script>';
                        $temp = mysqli_query($al,"INSERT INTO cart where id=$id (status) values(1)");
                        $cartid = mysqli_query($al,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'banjara tour and travel' AND TABLE_NAME = 'invoice'");
                        $cartdata= mysqli_fetch_array($cartid);
                        $cartdata=$cartdata[0]-1;
                        $foo = mysqli_query($al, "SELECT * FROM invoice WHERE id='$cartdata'");
                        $foodata = mysqli_fetch_array($foo);
                        $footemp = $foodata['userbookingid'];
                        echo "<script> window.location.href = '../invoice.php?id=$footemp';
			</script>";
                } else{
                        header("location:../404.html");
                }
	}
         
        
        }
}   
?>