<?php
session_start();
include "../config.php"; // Include the config file to access database configuration

$name = " ";
$info = "";
if (!isset($_SESSION['id'])) {
    $name = '';
} else {
    $id = $_SESSION['id'];
    
    $a = mysqli_query($conn, "SELECT * FROM customers WHERE id='$id'");
    $b = mysqli_fetch_array($a);
    $name = $b['name'];
    $email = $b['email'];
}

// Get the sorting option from URL parameter
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc'; // Default is 'asc'

// Determine the query for sorting
if ($sort_order == 'asc') {
    $sort_query = 'ORDER BY name ASC'; // Sorting by name ascending
} elseif ($sort_order == 'desc') {
    $sort_query = 'ORDER BY name DESC'; // Sorting by name descending
} elseif ($sort_order == 'date') {
    $sort_query = 'ORDER BY id DESC'; // Sorting by id (assuming id is auto-increment and reflects creation order)
}

// Connect to database
$al = mysqli_connect("localhost", "root", "", "banjara tour and travel");

// Modify the query with sorting options
$x = mysqli_query($al, "SELECT * FROM holiday $sort_query");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>
    <title>Destination Grid</title>
</head>

<body>

    <!-- ======================= Start Navigation ===================== -->
    <?php include 'helpers/header.php';?>
    <!-- ======================= End Navigation ===================== -->

    <!-- ======================= Start Page Title ===================== -->
    <div class="page-title image-title" style="background-image:url(assets/img/destination.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>The Banjara Tours and Travels</h2>
                <p><a href="../ahome.php" class="theme-cl">Home</a> | <span>Destination Grid</span></p>
            </div>
        </div>
    </div>
    <!-- ======================= End Page Title ===================== -->

    <!-- =========== Start All Destination In Grid View =================== -->
    <section class="gray-bg">
        <div class="container">

            <!-- Row -->
            <div class="row mrg-0">
                <div class="tr-single-box short-box">
                    <div class="col-sm-3 hidden-xs align-self-center">
                        <h4>Shorty By</h4>
                    </div>

                    <div class="col-sm-9 text-right">

                        <!-- Sorting Dropdown -->
                        <div class="btn-group mr-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Short By
                            </button>
                            <div class="dropdown-menu pull-right animated flipInX">
                                <a href="?sort=asc"
                                    <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'asc') ? 'class="active"' : ''; ?>>Ascending</a>
                                <a href="?sort=desc"
                                    <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'desc') ? 'class="active"' : ''; ?>>Descending</a>
                                <a href="?sort=date"
                                    <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'date') ? 'class="active"' : ''; ?>>By
                                    Date</a>
                            </div>
                        </div>

                        <!-- View Icons -->
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
                <!-- Single Destination -->
                <?php
                while ($y = mysqli_fetch_array($x)) {
                ?>
                <div class="col-md-4 col-sm-6 1" id="1" data-view-active="true">
                    <article class="destination-box style-1">

                        <div class="destination-box-image">
                            <figure>
                                <a href="destination-detail.php?id=<?php echo $y['id']; ?>">
                                    <img src="../admin/<?php echo $y['path']; ?>" class="img-responsive listing-box-img"
                                        alt="" />
                                    <div class="list-overlay"></div>
                                </a>
                                <div class="discount-flick">-12%</div>
                                <h4 class="destination-place">
                                    <a
                                        href="destination-detail.php?id=<?php echo $y['id']; ?>"><?php echo $y['name']; ?></a>
                                </h4>
                                <a href="destination-detail.php?id=<?php echo $y['id']; ?>" class="list-like left"><i
                                        class="ti-heart"></i></a>
                            </figure>
                        </div>

                        <div class="entry-meta">
                            <div class="meta-item meta-rating">
                                <?php
                                $star = $y['star'];
                                for ($star = $y['star']; $star >= 1; $star--) {
                                    echo '<i class="fa fa-star"></i>';
                                }

                                if (is_float($star)) {
                                    echo '<i class="fa fa-star-half"></i>';
                                }
                                ?>
                            </div>
                            <div class="meta-item meta-comment fl-right">
                                <span class="text-through">$2887</span><span
                                    class="real-price padd-l-10 font-bold">₹<?php echo $y['hotelcharge']; ?>/night</span>
                            </div>
                        </div>

                        <div class="inner-box">
                            <div class="box-inner-ellipsis">
                                <h4 class="entry-location">
                                    <a href="destination-detail.php"><?php echo $y['subdesti'] ?></a>
                                </h4>
                                <div class="price-box">
                                    <div class="destination-price fl-right">
                                        <a href="destination-detail.php?id=<?php echo $y['id']; ?>"><i
                                                class="theme-cl ti-arrow-right"></i></a>
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
    <!-- =========== End All Destination In Grid View =================== -->

    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>
    <!-- ================= footer End ========================= -->
    <!-- End Sign Up Window -->

    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>