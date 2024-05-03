<?php
session_start();
include "config.php"; // Include the config file to establish database connection

$name = " ";
$info = "";
if (!isset($_SESSION['id'])) {
  $name = '';
  // Redirect to login page if session is not set
  // header("location:../index.php");
} else {
  $id = $_SESSION['id'];
  $al = mysqli_connect($db_host, $db_username, $db_password, $db_name);
  $a = mysqli_query($al, "SELECT * FROM customers WHERE id='$id'");
  $b = mysqli_fetch_array($a);
  $name = $b['name'];
  $email = $b['email'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>
    <title>Destination</title>

</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    <?php include 'helpers/header.php';?>
    <!-- ======================= End Navigation ===================== -->

    <!-- ======================= Start Banner ===================== -->
    <section class="page-title-banner" style="background-image:url(assets/img/banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-detail">
                    <!--- Josefin Slab --->
                    <div class="tr-list-info">
                        <p>Banjara Tour & Travel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= End Banner ===================== -->

    <!-- ======================= Start Detail Header ===================== -->
    <section class="profile-header-nav padd-0 bb-1">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="tab" role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Overview" aria-controls="home" role="tab"
                                    data-toggle="tab"><i class="ti-user"></i>Overview</a></li>
                            <li role="presentation"><a href="#Features" aria-controls="profile" role="tab"
                                    data-toggle="tab"><i class="ti-settings"></i>Features</a></li>
                            <li role="presentation"><a href="#Review" aria-controls="messages" role="tab"
                                    data-toggle="tab"><i class="ti-thumb-up"></i>Review</a></li>
                            <li role="presentation"><a href="#Photos" aria-controls="messages" role="tab"
                                    data-toggle="tab"><i class="ti-gallery"></i>Photos</a></li>
                        </ul>
                        <!-- Tab panes -->
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!-- ======================= End Detail Header ===================== -->
    <?php 
        $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
        $id=$_GET['id'];
        $x = mysqli_query($al,"SELECT * FROM holiday where id=$id");
        $data= mysqli_fetch_array($x);
    ?>
    <!-- ======================= Start Detail ===================== -->
    <section class="tr-single-detail gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12">
                    <div class="tab-content tabs">

                        <div role="tabpanel" class="tab-pane fade in active" id="Overview">

                            <!-- Overview -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Overview</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-thumb-box">
                                                    <img src="../admin/<?php echo $data['path'] ?>"
                                                        class="img-responsive" alt="" />
                                                    <a href="#" class="list-like left"><i class="ti-heart"></i></a>
                                                    <h5>4.8/<sub class="theme-cl">5</sub></h5>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="list-overview-detail">
                                                    <h5><?php echo $data['name'] ?>, India</h5>
                                                    <ul class="extra-service">
                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class=" ti-location-pin"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        <?php echo $data['subdesti'] ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-email"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        <?php echo $data['holidayemail'] ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-headphone-alt"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        <?php echo $data['mobilenum'] ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-share"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        110 Share
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="icon-box-icon-block">
                                                                <a href="#">
                                                                    <div class="icon-box-round">
                                                                        <i class="ti-comment-alt"></i>
                                                                    </div>
                                                                    <div class="icon-box-text">
                                                                        22 comments
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Overview -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="fa fa-star-o"></i>Ratting</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div id="review_summary">
                                                    <strong>8.5</strong>
                                                    <em class="cl-success">Superb</em>
                                                    <small>Based on 4 reviews</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success"
                                                                role="progressbar" style="width: 98%" aria-valuenow="98"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-warning"
                                                                role="progressbar" style="width: 90%" aria-valuenow="90"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-primary"
                                                                role="progressbar" style="width: 60%" aria-valuenow="60"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-danger"
                                                                role="progressbar" style="width: 20%" aria-valuenow="20"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <div class="row">
                                                    <div class="col-lg-10 col-9">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-files"></i>Description</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <?php echo $data['about'] ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Amenities -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-crown"></i>Amenities</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="amenities third">
                                            <li>Satellite TV</li>
                                            <li>Coffeemaker</li>
                                            <li>Hair Dryer</li>
                                            <li>Swimming Pool</li>
                                            <li>Room Service</li>
                                            <li>Luxury Bedding</li>
                                            <li>Good Showers</li>
                                            <li>Free Parking</li>
                                            <li>Free Wifi</li>
                                            <li>Bath towel</li>
                                            <li>Free Coffee</li>
                                            <li>Pets Allow</li>
                                            <li>Hot Water</li>
                                            <li>Attached garage </li>
                                            <li>Elevator</li>
                                            <li>Spa/Sauna</li>
                                            <li>Indoor pool </li>
                                            <li>Security cameras </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ============ Features =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Features">

                            <!-- About Features -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-files"></i>About Features</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore,
                                            cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                                            maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor
                                            repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum
                                            necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
                                            non recusandae.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Extra features -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-thumb-up"></i>Extra Features</h4>
                                    </div>
                                    <div class="tr-single-body">

                                        <ul class="simple-features-list">
                                            <li>Beautiful Designs that are a Sight to the Eyes.</li>
                                            <li>Luxurious Rooms with Elegance to the Core.</li>
                                            <li>Amazing Beds for Unmatched Comfort.</li>
                                            <li>Suite Facilities for Premium Staying Experience.</li>
                                            <li>Conference and Event Facilities for Successful Meetings.</li>
                                            <li>In-house Restaurants with Delicacies of theWorld.</li>
                                            <li>Source of Entertainment for Full-time Amusement.</li>
                                            <li>Spa Facilities to Rejuvenate and Relax.</li>
                                        </ul>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ============ Review =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Review">

                            <!-- Review -->
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-write"></i>All Review</h4>
                                    </div>
                                    <div class="tr-single-body">

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/admin.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>4.7/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Chandi Charan Mahato</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>87</a>
                                                    <a href="#"><i class="ti-comment"></i>52</a>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/pic1.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>4.4/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Aditya Singh</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>65</a>
                                                    <a href="#"><i class="ti-comment"></i>78</a>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/pic2.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>5.0/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Asish Sharma</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>110</a>
                                                    <a href="#"><i class="ti-comment"></i>47</a>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/pic3.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>4.9/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Dilip Mehta</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>120</a>
                                                    <a href="#"><i class="ti-comment"></i>36</a>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/pic3.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>4.8/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Dilip Mehta</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>80</a>
                                                    <a href="#"><i class="ti-comment"></i>70</a>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Single Review -->
                                        <div class="review-box">
                                            <div class="review-thumb">
                                                <img src="../images/pic4.png" class="img-responsive img-circle"
                                                    alt="" />
                                            </div>

                                            <div class="review-box-content">
                                                <div class="reviewer-rate">
                                                    <p><i class="fa fa-star cl-warning"></i>4.7/<span>5</span></p>
                                                </div>
                                                <div class="review-user-info">
                                                    <h4>Rohit Kumar</h4>
                                                    <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam
                                                        Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil
                                                        Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                                </div>
                                                <div class="review-lc text-right">
                                                    <a href="#"><i class="ti-heart"></i>120</a>
                                                    <a href="#"><i class="ti-comment"></i>140</a>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- ============ Photos =================== -->
                        <div role="tabpanel" class="tab-pane fade in" id="Photos">
                            <div class="row">
                                <div class="tr-single-box">
                                    <div class="tr-single-header">
                                        <h4><i class="ti-gallery"></i>All Gallery</h4>
                                    </div>
                                    <div class="tr-single-body">
                                        <ul class="gallery-list">
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-1.jpg">
                                                    <img src="assets/img/destination/des-1.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-2.jpg">
                                                    <img src="assets/img/destination/des-2.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-3.jpg">
                                                    <img src="assets/img/destination/des-3.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-4.jpg">
                                                    <img src="assets/img/destination/des-4.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-5.jpg">
                                                    <img src="assets/img/destination/des-5.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-6.jpg">
                                                    <img src="assets/img/destination/des-6.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-7.jpg">
                                                    <img src="assets/img/destination/des-7.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-8.jpg">
                                                    <img src="assets/img/destination/des-8.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                            <li>
                                                <a data-fancybox="gallery" href="assets/img/destination/des-9.jpg">
                                                    <img src="assets/img/destination/des-9.jpg" class="img-responsive"
                                                        alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Sidebar Start -->
                <div class="col-md-4 col-sm-12">

                    <!-- Tourist Overview -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><?php echo $data['name'] ?> <sup class="cl-success">India</sup></h4>
                        </div>

                        <div class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-user"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                <?php echo $data['amount'] ?>
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-timer"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                May - July
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-eye"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                785 View
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-share"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                110 Share
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-comment-alt"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                22 comments
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="ti-heart"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                20 Likes
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <!-- overview & booking Form -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <div class="entry-meta">
                                <div class="meta-item meta-comment fl-right">
                                    <div class="view-box">
                                        <div class="fl-right">
                                            <h4 class="font-20"><span
                                                    class="theme-cl font-20">₹</span><?php echo $data['amount'] ?><sub>/Per
                                                    Persion</sub></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="meta-item meta-author">
                                    <div class="hotel-review entry-location">
                                        <span class="review-status bg-success"><i class="ti-check"></i></span>
                                        <h6><span class="cl-success font-bold">Good</span>1362 Review</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tr-single-body">
                            <form class="book-form" method="GET" action="helpers/payment.php">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Check In</label>
                                            <input type="text" name="checkin" id="checkin" class="form-control"
                                                value="Check in">
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>Check Out</label>
                                            <input type="text" name="checkout" id="checkout" class="form-control"
                                                value="Check out">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Adult</label>
                                            <input type="number" name="adult" value="1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Children</label>
                                            <input type="number" name="children" value="0" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Room</label>
                                            <div class="sl-side">
                                                <select class="wide form-control" name="room">
                                                    <option data-display="Room">Room</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="4">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Night</label>
                                            <div class="sl-side">
                                                <select class="wide form-control" name="night">
                                                    <option data-display="Night">Night</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="4">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button type="button" class="btn btn-default full-width text-left"
                                            data-toggle="collapse" data-target="#extra-service">Choose Extra Amenities<i
                                                class="ti-settings fl-right mrg-top-5"></i></button>
                                        <div id="extra-service" class="collapse">
                                            <div class="extra-features">
                                                <ul class="extra-service half">

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Satellite TV"
                                                                id="1">
                                                            <label for="1"></label>
                                                        </span>
                                                        Satellite TV
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Coffeemaker"
                                                                id="2">
                                                            <label for="2"></label>
                                                        </span>
                                                        Coffeemaker
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Luxury Bedding"
                                                                id="3">
                                                            <label for="3"></label>
                                                        </span>
                                                        Luxury Bedding
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Swimming Pool"
                                                                id="4">
                                                            <label for="4"></label>
                                                        </span>
                                                        Swimming Pool
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Free Parking"
                                                                id="5">
                                                            <label for="5"></label>
                                                        </span>
                                                        Free Parking
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Free Wifi"
                                                                id="6">
                                                            <label for="6"></label>
                                                        </span>
                                                        Free Wifi
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Pets Allow"
                                                                id="7">
                                                            <label for="7"></label>
                                                        </span>
                                                        Pets Allow
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Elevator"
                                                                id="8">
                                                            <label for="8"></label>
                                                        </span>
                                                        Elevator
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]" value="Spa/Sauna"
                                                                id="9">
                                                            <label for="9"></label>
                                                        </span>
                                                        Spa/Sauna
                                                    </li>

                                                    <li>
                                                        <span class="custom-checkbox">
                                                            <input type="checkbox" name="extra[]"
                                                                value="Security cameras" id="11">
                                                            <label for="11"></label>
                                                        </span>
                                                        Security cameras
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 mrg-top-15">
                                        <button type="submit" name="sub" value="<?php echo $_GET['id']; ?>"
                                            class="btn btn-arrow theme-btn full-width">Book
                                            Now</button>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- Share this -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Share this</h4>
                        </div>

                        <div class="tr-single-body">
                            <ul class="extra-service half">
                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-facebook"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Facebook
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-google-plus"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Google plus
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-twitter"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Twitter
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-linkedin"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                LinkedIn
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-instagram"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Instagram
                                            </div>
                                        </a>
                                    </div>
                                </li>

                                <li>
                                    <div class="icon-box-icon-block">
                                        <a href="#">
                                            <div class="icon-box-round">
                                                <i class="fab fa-pinterest"></i>
                                            </div>
                                            <div class="icon-box-text">
                                                Pinterest
                                            </div>
                                        </a>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /col-md-4 -->
            </div>
        </div>
    </section>
    <!-- ======================= End Detail ===================== -->



    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>

    <!-- ================= footer end ========================= -->
    <script>
    $("#checkin").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
    $("#checkout").datepicker({
        dateFormat: "yy-mm-dd"
    }).datepicker("setDate", new Date());
    </script>

    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>