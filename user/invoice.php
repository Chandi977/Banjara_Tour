<?php 
require 'helpers/setting.php';
include '../config.php';
$id = $_GET['id'];
$al = mysqli_connect("localhost", "root", "", "banjara tour and travel");

$cart = mysqli_query($al, "SELECT * FROM cart WHERE id='$id'");
$cartdata = mysqli_fetch_array($cart);
$checkin = $cartdata['checkin'];
$checkout = $cartdata['checkout'];
$adult = $cartdata['adult'];
$children = $cartdata['children'];
$person=$adult+$children;
$room = $cartdata['room'];
$extra = $cartdata['extra'];
$extradata = explode(",",$extra);
$ex=implode(",",$extradata);
$firstDate  = new DateTime($checkin);
$secondDate = new DateTime($checkout);
$intvl = $firstDate->diff($secondDate);
$days=$intvl->days;
$pack = $cartdata['destination'];
$hotel = $cartdata['hotel'];
$total = $cartdata['total'];
$hotelid = $cartdata['hotelid'];

$invoice = mysqli_query($al, "SELECT * FROM invoice WHERE userbookingid='$id'");
$invdata = mysqli_fetch_array($invoice);
$billname = $invdata['billname'];
$billemail = $invdata['billemail'];
$billphone = $invdata['billphone'];
$billadd = $invdata['billaddress'];
$billcity = $invdata['billcity'];
$billstate = $invdata['billstate'];
$billcountry = $invdata['billcountry'];
$billzip = $invdata['billzip'];

$foo = mysqli_query($al, "SELECT * FROM holiday WHERE id='$hotelid'");
$foodata = mysqli_fetch_array($foo);
$hotelcharge = $foodata['hotelcharge'];
$totalhotelcharge = $hotelcharge*($days-1);
$guidecharge = $foodata['guidecharge'];
$totalguidecharge = $guidecharge * $days;
$servicecharge = $foodata['amount'];
    
$totalamount = $totalhotelcharge + $totalguidecharge + $servicecharge;
$perc=(5 / 100) * $totalamount;
$maintotal = $perc+$totalamount;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice</title>

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Architects+Daughter&family=Comforter&family=Fuzzy+Bubbles:wght@700&family=Gwendolyn&display=swap');
    </style>
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsiveness.css" rel="stylesheet">
    <link id="jssDefault" rel="stylesheet" href="assets/css/skins/default.css">
    <link rel="stylesheet" href="../style1.css">
</head>

<body>

    <!-- ======================= Start Navigation ===================== -->

    <!-- ======================= End Navigation ===================== -->


    <!-- ======================= Start Invoice ===================== -->
    <section class="dashboard gray-bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h3 class="dashboard-title">View Invoice</h3>
                            </div>
                            <div class="tr-single-body">

                                <div class="detail-wrapper">

                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <a href="javascript:window.print()" class="btn theme-btn">Print this
                                                invoice</a>
                                        </div>
                                    </div>

                                    <div class="row mrg-0">
                                        <div class="col-md-6">
                                            <div id="logo">
                                                <h3 style="font-family: 'Fuzzy Bubbles', cursive;">The Banjara Tour And
                                                    Travels</h3>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p id="invoice-info">
                                                <strong>Order id :</strong> TBTT<?php echo $invdata['id'];?><br>
                                                <strong>Issued:</strong> <?php echo $invdata['transactiondate'];?> <br>
                                                Due 7 days from date of issue
                                            </p>
                                        </div>

                                    </div>

                                    <div class="row  mrg-0 detail-invoice">

                                        <div class="col-md-12">
                                            <h2>INVOICE</h2>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7 col-sm-7">

                                                    <h4>Banjara Admins: </h4>
                                                    <h5>The Banjara Tours And Travel</h5>
                                                    <p>
                                                        info@TBTAT.admin.com<br />

                                                        +91-12344567890<br />

                                                        Adityapur, Jamshedpur, Jharkhand
                                                        <br /> India
                                                    </p>

                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5">
                                                    <h4>Client Contact :</h4>
                                                    <h5><?php echo $invdata['billname'];?></h5>
                                                    <p>
                                                        <?php echo $invdata['billemail'];?><br />

                                                        <?php echo $billphone;?><br />

                                                        <?php echo $billadd .', '. $billcity .', '. $billstate;?>
                                                        <br /> <?php echo $billcountry.','.$billzip;?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr />

                                        <div class="col-12 col-md-12">
                                            <strong>Booking Details :</strong>
                                        </div>
                                        <hr>

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="invoice-table">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>S. No.</th>
                                                                <th>Destination</th>
                                                                <th>Hotel</th>
                                                                <th>Checkin > Checkout</th>
                                                                <th>Persons</th>
                                                                <th>Days</th>

                                                                <th>Room</th>
                                                                <th>Extra Amenities</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td><?php echo $pack;?></td>
                                                                <td><?php echo $hotel;?></td>
                                                                <td><?php echo $checkin;?> > <?php echo $checkout;?>
                                                                </td>
                                                                <td>Adulr : <?php echo $adult;?>, Child :
                                                                    <?php echo $children;?></td>
                                                                <td><?php echo $days;?></td>

                                                                <td><?php echo $room;?></td>
                                                                <td><?php echo $ex;?></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h5>Total : ₹<?php echo $totalamount;?> </h5>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h5>Taxes : ₹<?php echo $perc;?> ( 5 % on Total Bill ) </h5>
                                                </div>
                                                <hr>
                                                <div>
                                                    <h4>Total Amount : ₹<?php echo $maintotal;?> (with tax)</h4>
                                                    <h4 class="text-center"><a class="btn" href="../index.php">Home</a>
                                                    </h4>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= End  Invoice===================== -->



    <!-- ================= footer start ========================= -->
    <!-- <?php include 'helpers/footer.php';?> -->
    <!-- ================= footer end ========================= -->

    <!-- =================== START JAVASCRIPT ================== -->

    <!-- =================== END JAVASCRIPT ================== -->

</body>

</html>