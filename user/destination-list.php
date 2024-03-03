<?php
session_start();
$name = " ";
$info = "";
if (!isset($_SESSION['id'])) {
  $name = '';
} else {
  $id = $_SESSION['id'];
  $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
  $a = mysqli_query($al, "SELECT * FROM customers WHERE id='$id'");
  $b = mysqli_fetch_array($a);
  $name = $b['name'];
  $email=$b['email'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>
    <title>Destination list</title>

</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    <?php include 'helpers/header.php';?>
    <!-- ======================= End Navigation ===================== -->

    <!-- ======================= Start Page Title ===================== -->
    <div class="page-title image-title" style="background-image:url(assets/img/destination.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>The Banjara Tours & Travels</h2>
                <p><a href="#" class="theme-cl">Home</a> | <span>Destination List</span></p>
            </div>
        </div>
    </div>
    <!-- ======================= End Page Title ===================== -->

    <!-- =========== Start All Destination In List View =================== -->
    <section class="gray-bg">
        <div class="container">

            <!-- Row -->
            <div class="row mrg-0">
                <div class="tr-single-box short-box">
                    <div class="col-sm-3 hidden-xs align-self-center">
                        <h4>Shorty By</h4>
                    </div>

                    <div class="col-sm-9 text-right">

                        <div class="btn-group mr-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Short By
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <a href="#">Accending</a>
                                <a href="#">Decending</a>
                                <a href="#">By Date</a>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a href="destination-grid.php" class="btn btn-default tooltips">
                                <i class="ti-flix ti-layout-grid2"></i>
                            </a>
                        </div>

                        <div class="btn-group">
                            <a href="destination-list.php" class="btn btn-default tooltips">
                                <i class="ti-flix ti-view-list-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Row -->

            <div class="row">
                <?php
                    $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
                    $x = mysqli_query($al, "SELECT * FROM holiday");
                    while ($y = mysqli_fetch_array($x)) {
                ?>
                <!-- Single Destination List -->
                <div class="col-lg-6 col-md-6">
                    <article class="destination-box list-style">
                        <div class="row">

                            <div class="col-md-5 col-sm-5">
                                <div class="destination-box-image">
                                    <a href="destination-detail.php?id=<?php echo $y['id']; ?>">
                                        <img src="../admin/<?php echo $y['path']; ?>"
                                            class="img-responsive destination-box-img" alt="" />
                                    </a>
                                    <a href="#" class="list-like left"><i class="ti-heart"></i></a>
                                    <!-- <div class="destination-time">
                                        <i class="ti ti-car"></i><span>3 days</span>
                                    </div> -->
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7">
                                <div class="inner-box">
                                    <div class="discount-flick">-22%</div>
                                    <div class="box-inner-ellipsis">
                                        <div style="margin: 0px; padding: 0px; border: 0px;">
                                            <h3 class="entry-title">
                                                <a href="destination-detail.php"><?php echo $y['subdesti'] ?></a>
                                            </h3>
                                            <div class="entry-content">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi,
                                                    temporibus.</p>
                                                <span class="price">From <strong
                                                        class="theme-cl">₹<?php echo $y['amount']; ?></strong> /per
                                                    person</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="entry-meta">
                                        <div class="meta-item meta-author">
                                            <div class="coauthors">
                                                <div class="vcard author">
                                                    <div class="fn">
                                                        <h4><a
                                                                href="destination-detail.php"><?php echo $y['name']; ?></a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="meta-item meta-comment fl-right">
                                            <i class="ti-comment-alt"></i><span>25</span>
                                        </div>
                                        <div class="meta-item meta-rating fl-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- =========== End All Destination In List View =================== -->


    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>
    <!-- ================= footer end ========================= -->


    <!-- End Sign Up Window -->


    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->

</body>

</html>