<?php
session_start();
include '../../config.php';

if ($_SESSION['email'] == null) {
    header("location:../index.php");
    exit();
}

$email = $_SESSION['email'];
$name = $_SESSION["name"];
$id = $_POST['sub'];
$cartQuery = mysqli_query($conn, "SELECT * FROM cart WHERE id = '$id'");
$cartData = mysqli_fetch_array($cartQuery);

if (!$cartData) {
    echo '<script>alert("Cart data not found.");</script>';
    exit();
}

$checkin = $cartData['checkin'];
$checkout = $cartData['checkout'];
$adult = $cartData['adult'];
$children = $cartData['children'];
$person = $adult + $children;
$room = $cartData['room'];
$extra = $cartData['extra'];
$extradata = explode(",", $extra);
$firstDate = new DateTime($checkin);
$secondDate = new DateTime($checkout);
$days = $firstDate->diff($secondDate)->days;
$pack = $cartData['destination'];
$hotel = $cartData['hotel'];
$total = $cartData['total'];

// Format the dates to a string format suitable for MySQL
$firstDateFormatted = $firstDate->format('Y-m-d');
$secondDateFormatted = $secondDate->format('Y-m-d');

// Billing details with null checks for form inputs
$billname = isset($_POST['billname']) ? $_POST['billname'] : null;
$billemail = isset($_POST['billemail']) ? $_POST['billemail'] : null;
$billphone = isset($_POST['billphone']) ? $_POST['billphone'] : null;
$billaddress = isset($_POST['billaddress'], $_POST['billcity'], $_POST['billstate'], $_POST['billcountry'], $_POST['billzip']) 
    ? implode(",", [$_POST['billaddress'], $_POST['billcity'], $_POST['billstate'], $_POST['billcountry'], $_POST['billzip']])
    : null;

$billcity = isset($_POST['billcity']) ? $_POST['billcity'] : null;
$billstate = isset($_POST['billstate']) ? $_POST['billstate'] : null;
$billcountry = isset($_POST['billcountry']) ? $_POST['billcountry'] : null;
$billzip = isset($_POST['billzip']) ? $_POST['billzip'] : null;

$billupi = isset($_POST['billupi']) ? $_POST['billupi'] : null;
$billcardname = isset($_POST['billcardname']) ? $_POST['billcardname'] : null;
$billcardno = isset($_POST['billcardno']) ? $_POST['billcardno'] : null;
$billcardexpmonth = isset($_POST['billcardexpmonth']) ? $_POST['billcardexpmonth'] : null;
$billcardexpyear = isset($_POST['billcardexpyear']) ? $_POST['billcardexpyear'] : null;
$billcardcvv = isset($_POST['billcardcvv']) ? $_POST['billcardcvv'] : null;

// Check if required fields are not null
if ($billname && $billemail && $billphone && $billaddress && $billcity && $billstate && $billcountry && $billzip) {
    $sql = $billupi 
        ? "INSERT INTO invoice (userbookingid, billname, billemail, billphone, billaddress, billcity, billstate, billcountry, billzip, billupi, billamount, status, journeystart, journeyend) 
            VALUES ($id, '$billname', '$billemail', '$billphone', '$billaddress', '$billcity', '$billstate', '$billcountry', '$billzip', '$billupi', $total, 1, '$firstDateFormatted', '$secondDateFormatted')"
        : "INSERT INTO invoice (userbookingid, billname, billemail, billphone, billaddress, billcity, billstate, billcountry, billzip, billcardname, billcardno, billcardexpmonth, billcardexpyear, billcardcvv, billamount, status, journeystart, journeyend) 
            VALUES ($id, '$billname', '$billemail', '$billphone', '$billaddress', '$billcity', '$billstate', '$billcountry', '$billzip', '$billcardname', '$billcardno', '$billcardexpmonth', '$billcardexpyear', '$billcardcvv', $total, 1, '$firstDateFormatted', '$secondDateFormatted')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>alert("Wait for the transaction to complete.");</script>';
        
        // Update cart status
        mysqli_query($conn, "UPDATE cart SET status = 1 WHERE id = $id");

        // Get the last inserted invoice ID
        $cartidQuery = mysqli_query($conn, "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'banjara tour and travel' AND TABLE_NAME = 'invoice'");
        $cartdata = mysqli_fetch_array($cartidQuery);
        $cartdata = $cartdata[0] - 1;

        // Redirect to invoice page
        $fooQuery = mysqli_query($conn, "SELECT * FROM invoice WHERE id = '$cartdata'");
        $foodata = mysqli_fetch_array($fooQuery);
        $footemp = $foodata['userbookingid'];
        
        echo "<script> window.location.href = '../invoice.php?id=$footemp';</script>";
    } else {
        echo '<script>alert("Something went wrong. Please try again later.");</script>';
    }
} else {
    echo '<script>alert("Please fill all required fields.");</script>';
}
?>