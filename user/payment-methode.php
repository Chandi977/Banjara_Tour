<?php require 'helpers/setting.php';?>
<?php
// if (isset($_POST['sub'])) {
    $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
    $id = $_GET['cartid'];
    // $hotelid=
    // $p = mysqli_query($al, "SELECT * FROM holiday WHERE id='$id'");
    
    $getinvoice = mysqli_query($al, "SELECT * FROM cart WHERE id='$id'");
    $invoice = mysqli_fetch_array($getinvoice);
    
    $checkin = $invoice['checkin'];
    $checkout = $invoice['checkout'];
    $adult = $invoice['adult'];
    $children = $invoice['children'];
    $person=$adult+$children;
    $room = $invoice['room'];
    $extra = $invoice['extra'];
    $extradata = explode(",",$extra);
 
    $days = $invoice['days'];
    $pack = $invoice['destination'];
    $hotel = $invoice['hotel'];
    $total = $invoice['total'];
    
    $hotelid = $invoice['hotelid'];
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
    $cartid = mysqli_query($al,"SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'banjara tour and travel' AND TABLE_NAME = 'cart'");
    $cartdata= mysqli_fetch_array($cartid);
    $cartdata=$cartdata[0]-1;
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>
    <title>Payment</title>

</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    <?php include 'helpers/header.php';?>
    <!-- ======================= End Navigation ===================== -->

    <!-- ======================= Start Page Title ===================== -->
    <div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>The Banjara Tour & Travel</h2>
                <p><a href="#" class="theme-cl">Home</a> | <span>Payment Methode</span></p>
            </div>
        </div>
    </div>
    <!-- ======================= End Page Title ===================== -->

    <!-- =========== Start All Hotel In Grid View =================== -->
    <section class="gray-bg">
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="fa fa-star-o"></i>Booking Information</h4>
                        </div>
                        <div class="tr-single-body">
                            <div class="booking-price-detail side-list no-border">
                                <h5>Tour & Destination</h5>
                                <ul>
                                    <li>Destination<strong class="pull-right"><?php echo $pack;?></strong></li>
                                    <li>Person<strong class="pull-right"><?php echo $person;?></strong></li>
                                    <li>From<strong class="pull-right"><?php echo $checkin;?></strong></li>
                                    <li>Tour Days<strong class="pull-right"><?php echo $days; ?></strong></li>
                                    <!-- <li>Guide<strong class="pull-right">Alina Charlies</strong></li> -->
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Hotel Booking</h5>
                                <ul>
                                    <li>Hotel<strong class="pull-right"><?php echo $hotel;?></strong></li>
                                    <li>Night<strong class="pull-right"><?php echo $days-1;?></strong></li>
                                    <li>Adult<strong class="pull-right"><?php echo $adult;?></strong></li>
                                    <li>Child<strong class="pull-right"><?php echo $children;?></strong></li>

                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Features include</helpers /h5>
                                    <div class="include-fhelpers/eatures">
                                        <?php foreach ($extradata as $dataextra)  {
                                            // echo $food ."<br />";
                                            echo '<span class="features-tag">'.$dataextra.'</span>';
                                            }
                                        ?>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-gift"></i>Package information</h4>
                        </div>
                        <div class="tr-single-body">
                            <div class="booking-price-detail side-list no-border">
                                <h5>Your Dates</h5>
                                <ul>
                                    <li>Checkin<strong class="pull-right"><?php echo $checkin;?></strong></li>
                                    <li>Checkout<strong class="pull-right"><?php echo $checkout;?></strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Hotel Charge</h5>
                                <ul>
                                    <li>Price<strong class="pull-right">₹<?php echo $hotelcharge;?>/night</strong></li>
                                    <li>Total<strong class="pull-right">₹<?php echo $totalhotelcharge;?></strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Guide Charge</h5>
                                <ul>
                                    <li>Price<strong class="pull-right">₹<?php echo $guidecharge;?>/Day</strong></li>
                                    <li>Total<strong class="pull-right">₹<?php echo $totalguidecharge;?></strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <h5>Your Stay</h5>
                                <ul>
                                    <li>Service Charge<strong class="pull-right">₹<?php echo $servicecharge;?></strong>
                                    </li>
                                    <li>Total<strong class="pull-right">₹<?php echo $totalamount;?></strong></li>
                                    <li>G.S.T<strong class="pull-right">5%</strong></li>
                                </ul>
                            </div>
                            <div class="booking-price-detail side-list no-border">
                                <ul>
                                    <li>Grand Total<strong
                                            class="theme-cl pull-right">₹<?php echo $maintotal;?></strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="helpers/newbook.php" method="POST">
                <!-- row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-write"></i>Billing Information</h4>
                            </div>
                            <div class="tr-single-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- <input type="text" name="id" hidden value=""> -->
                                        <label>Name</label>
                                        <input type="text" name="billname" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Email</label>
                                        <input type="email" name="billemail" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Phone</label>
                                        <input type="text" name="billphone" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Address</label>
                                        <input type="text" name="billaddress" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>City</label>
                                        <input type="text" name="billcity" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>State</label>
                                        <input type="text" name="billstate" class="form-control">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Country</label>
                                        <input type="text" name="billcountry" class="form-control">
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Zip</label>
                                        <input type="text" name="billzip" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h4><i class="ti-credit-card"></i>Payment Methode</h4>
                            </div>
                            <div class="tr-single-body">
                                <!-- Paypal Option -->
                                <div class="payment-card">
                                    <header class="payment-card-header cursor-pointer" data-toggle="collapse"
                                        data-target="#paypal" aria-expanded="true">
                                        <div class="payment-card-title flexbox">
                                            <h4>UPI</h4>
                                        </div>
                                        <div class="pull-right">
                                            <img src="assets/img/payment/upi.png" class="img-responsive" alt="">
                                        </div>
                                    </header>
                                    <div class="collapse" id="paypal" aria-expanded="false">
                                        <div class="payment-card-body">
                                            <div class="row mrg-bot-20">
                                                <div class="col-sm-6">
                                                    <input type="text" name="billupi" placeholder="12345679@oksbi"
                                                        class="form-control">
                                                </div>
                                                <div class="col-sm-6 padd-top-10 text-right">
                                                    <label>Total Order</label>
                                                    <h2 class="mrg-0"><span
                                                            class="theme-cl">₹</span><?php echo $maintotal;?>
                                                    </h2>
                                                </div>
                                                <div class="col-sm-12 bt-1 padd-top-15">
                                                    <span class="custom-checkbox d-block font-12">
                                                        <input type="checkbox" id="privacy">
                                                        <label for="privacy"></label>
                                                        By ordering you are agreeing to our <a href="#"
                                                            class="theme-cl">Privacy policy</a>.
                                                    </span>
                                                    <input type="text" name="id" value="<?php echo $id?>" hidden>
                                                    <button class="btn btn-m btn-success" type="submit" name="sub"
                                                        value="<?php echo $cartdata?>">Checkout</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Debit card option -->
                                <div class="payment-card">
                                    <header class="payment-card-header cursor-pointer" data-toggle="collapse"
                                        data-target="#debit-credit" aria-expanded="true">
                                        <div class="payment-card-title flexbox">
                                            <h4>Credit / Debit Card</h4>
                                        </div>
                                        <div class="pull-right">
                                            <img src="assets/img/credit.png" class="img-responsive" alt="">
                                        </div>
                                    </header>
                                    <div class="collapse" id="debit-credit" aria-expanded="false">
                                        <div class="payment-card-body">
                                            <div class="row mrg-bot-20">
                                                <div class="col-sm-6">
                                                    <label>Card Holder Name</label>
                                                    <input type="text" name="billcardname" class="form-control"
                                                        placeholder="Ram Singh">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Card No.</label>
                                                    <input type="text" name="billcardno" class="form-control"
                                                        placeholder="1235 4785 4758 1458">
                                                </div>
                                            </div>
                                            <div class="row mrg-bot-20">
                                                <div class="col-sm-4 col-md-4">
                                                    <label>Expire Month</label>
                                                    <input type="text" name="billcardexpmonth" class="form-control"
                                                        placeholder="07">
                                                </div>
                                                <div class="col-sm-4 col-md-4">
                                                    <label>Expire Year</label>
                                                    <input type="text" name="billcardexpyear" class="form-control"
                                                        placeholder="2020">
                                                </div>
                                                <div class="col-sm-4 col-md-4">
                                                    <label>CCV Code</label>
                                                    <input type="text" name="billcardcvv" class="form-control"
                                                        placeholder="258">
                                                </div>
                                            </div>
                                            <div class="row mrg-bot-20">
                                                <div class="col-sm-5 padd-top-10 text-right">
                                                    <label>Total Order</label>
                                                    <h2 class="mrg-0"><span
                                                            class="theme-cl">₹</span><?php echo $maintotal;?>
                                                    </h2>
                                                </div>
                                                <div class="col-sm-12 bt-1 padd-top-15">
                                                    <span class="custom-checkbox d-block font-12">
                                                        <input type="checkbox" id="privacy">
                                                        <label for="privacy"></label>
                                                        By ordering you are agreeing to our <a href="#"
                                                            class="theme-cl">Privacy policy</a>.
                                                    </span>

                                                    <button class="btn btn-m btn-success" type="submit" name="sub"
                                                        value="<?php echo $cartdata?>">Checkout</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- =========== End All Hotel In Grid View =================== -->

    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>
    <!-- ================= footer end ========================= -->

    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>