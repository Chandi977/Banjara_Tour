<?php require 'helpers/setting.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>
    <title>Cart</title>
</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    <?php include 'helpers/header.php';?>
    <!-- ======================= End Navigation ===================== -->


    <!-- ======================= Start Booking ===================== -->
    <section class="dashboard gray-bg padd-0 mrg-top-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row mrg-0 mrg-top-20">
                        <div class="tr-single-box">
                            <div class="tr-single-header">
                                <h3 class="dashboard-title">My Booking</h3>
                            </div>
                            <div class="tr-single-body">
                                <!-- row -->
                                <div class="row mrg-bot-15">
                                    <div class="col-md-4 col-sm-7">
                                        <input type="text" class="form-control height-50" value=""
                                            placeholder="Search by listing name">
                                    </div>
                                    <div class="col-md-6 col-sm-5">
                                        <input type="submit" class="btn theme-btn height-50 width-150" value="Search">
                                    </div>
                                </div>

                                <!-- row -->
                                <div class="row">
                                    <!-- Single booking -->
                                    <?php
                                    $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
                                    // $id = $_GET['sub'];
                                    $cart = mysqli_query($al, "SELECT * FROM cart");
                                    // $cartdata = mysqli_fetch_array($cart);
                                    while ($y = mysqli_fetch_array($cart)) {
                                        ?>
                                    <div class="col-md-12 ">
                                        <div class="dasboard-prop-listing ">
                                            <div class="blog_listing_image book_image">
                                                <a href="#">
                                                    <img src="assets/img/hotel/hotel-1.jpg" class="img-responsive"
                                                        alt="...">
                                                </a>
                                            </div>
                                            <div class="prop-info">
                                                <h4 class="listing_title_book">
                                                    Hotel Green Resort vally, Shimla
                                                </h4>

                                                <div class="user_dashboard_listed">
                                                    <strong>Period:</strong> <?php echo $y['checkin'];?>
                                                    <strong>to</strong>
                                                    <?php echo $y['checkout'];?>
                                                </div>

                                                <div class="user_dashboard_listed">
                                                    <strong>Days:</strong> <?php echo $y['days'];?>
                                                </div>

                                                <div class="user_dashboard_listed">
                                                    <strong>Amount:</strong> ₹<?php echo $y['total'];?>
                                                </div>

                                                <div class="user_dashboard_listed">
                                                    <strong>Destination: </strong> <?php echo $y['destination'];?>
                                                </div>

                                                <div class="user_dashboard_listed">
                                                    <strong>Adults: </strong> <?php echo $y['adult'];?>
                                                </div>

                                                <div class="user_dashboard_listed">
                                                    <strong>Children: </strong> <?php echo $y['children'];?>
                                                </div>
                                            </div>
                                            <div class="info-container_booking">
                                                <?php  if ($y['status']) {
                                                    $id = $y['id'];
                                                    echo '<a href="invoice.php?id='.$id.'" class="booking-detail">View Detail</a>';
                                                    echo '<span class="booking-success">Confirmed</span>';
                                                    echo '<span class="booking-pending">Cancel Booking</span>';
                                                }
                                                else {
                                                    echo '<a href="payment-methode.php?cartid='.$y['id'].'" class="booking-pending">Pending Payment</a>';
                                                }?>


                                            </div>
                                        </div>

                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= End  Booking===================== -->



    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>

    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->

</body>

</html>