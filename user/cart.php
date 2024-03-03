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

    <!-- ======================= Start Page Title ===================== -->
    <div class="page-title image-title" style="background-image:url(assets/img/banner.jpg);">
        <div class="container">
            <div class="page-title-wrap">
                <h2>Add To cart</h2>
                <p><a href="#" class="theme-cl">Home</a> | <span>Add To cart</span></p>
            </div>
        </div>
    </div>
    <!-- ======================= End Page Title ===================== -->

    <!-- ======================= Start Checkout ===================== -->
    <section class="cart gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="tg-cartproductdetail table-responsive">
                        <table class="table" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-name">Name</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-remove">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="cart_item">

                                    <td>
                                        <div class="tg-tourname">
                                            <figure>
                                                <a href="#"><img src="assets/img/tt-1.png" class="img-responsive"
                                                        alt=""></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3>
                                                        <a href="#">DJI Phantom 3</a>
                                                    </h3>
                                                </div>
                                                <span>1 x <span class="Price-amount amount"><span
                                                            class="Price-currencySymbol">$</span>499</span> </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="form-group">
                                            <div class="quantity">
                                                <input type="number" class="form-control" value="1">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="Price-amount amount"><span
                                                class="Price-currencySymbol">$</span>499</span>
                                    </td>

                                    <td class="product-remove">
                                        <a href="#" class="remove"><i class="icon-trash-can"></i></a>
                                    </td>
                                </tr>

                                <tr class="cart_item">

                                    <td>
                                        <div class="tg-tourname">
                                            <figure>
                                                <a href="#"><img src="assets/img/tt-2.png" class="img-responsive"
                                                        alt=""></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3>
                                                        <a href="#">DJI Phantom 3</a>
                                                    </h3>
                                                </div>
                                                <span>1 x <span class="Price-amount amount"><span
                                                            class="Price-currencySymbol">$</span>499</span> </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="form-group">
                                            <div class="quantity">
                                                <input type="number" class="form-control" value="1">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="Price-amount amount"><span
                                                class="Price-currencySymbol">$</span>499</span>
                                    </td>

                                    <td class="product-remove">
                                        <a href="#" class="remove"><i class="icon-trash-can"></i></a>
                                    </td>
                                </tr>

                                <tr class="woocommerce-cart-form__cart-item cart_item">
                                    <td>
                                        <div class="tg-tourname">
                                            <figure>
                                                <a href="#"><img src="assets/img/tt-3.png" class="img-responsive"
                                                        alt=""></a>
                                            </figure>
                                            <div class="tg-populartourcontent">
                                                <div class="tg-populartourtitle">
                                                    <h3>
                                                        <a href="#">Davidoff Cool Water</a>
                                                    </h3>
                                                </div>
                                                <span>1 x <span class="Price-amount amount"><span
                                                            class="Price-currencySymbol">$</span>1,300</span> </span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-quantity">
                                        <div class="form-group">
                                            <div class="quantity">
                                                <input type="number" class="form-control" value="1">
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <span class="Price-amount amount"><span
                                                class="Price-currencySymbol">$</span>1,300</span>
                                    </td>
                                    <td class="product-remove">
                                        <a href="#" class="remove" <i class="icon-trash-can"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- Coupon Code -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search&hellip;">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default">Apply Coupon</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-arrow theme-btn" type="button" href="#">Update Cart</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Coupon Code -->
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4 col-sm-4">
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4>Total<span class="fl-right">$1170</span></h4>
                        </div>

                        <div class="tr-single-body">
                            <div class="booking-price-detail side-list no-border">
                                <ul>
                                    <li>From<strong class="pull-right">25 Jan 2019</strong></li>
                                    <li>To<strong class="pull-right">28 Jan 2019</strong></li>
                                    <li>Adults<strong class="pull-right">5</strong></li>
                                    <li>Children<strong class="pull-right">3</strong></li>
                                    <li>Guide<strong class="pull-right">Richa Alitics</strong></li>
                                    <li>Hotel<strong class="pull-right">Resort valley</strong></li>
                                </ul>
                                <a href="payment-methode.php" class="btn btn-success full-width">Proceed now</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= End Checkout ===================== -->

    <!-- ============== Before Footer ====================== -->
    <section class="before-footer bt-1 bb-1">
        <div class="container-fluid padd-0 full-width">

            <div class=" col-md-2 col-sm-2 br-1 mbb-1">
                <div class="data-flex">
                    <h4>Contact Us!</h4>
                </div>
            </div>

            <div class="col-md-3 col-sm-3 br-1 mbb-1">
                <div class="data-flex text-center">
                    53 Boulevard Victor Hugo 44200 Nantes, France
                </div>
            </div>

            <div class="col-md-3 col-sm-3 br-1 mbb-1">
                <div class="data-flex text-center">
                    <span class="d-block mrg-bot-0">06 52 52 20 30</span>
                    <a href="#" class="theme-cl"><strong>hello@gmail.com</strong></a>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 padd-0">
                <div class="data-flex padd-0">
                    <ul class="social-share">
                        <li><a href="#"><i class="fa fa-facebook theme-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus theme-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter theme-cl"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin theme-cl"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <!-- =================== Before Footer ====================== -->

    <!-- ================= footer start ========================= -->
    <?php include 'helpers/footer.php';?>
    <!-- ================= footer end ========================= -->



    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->
</body>

</html>