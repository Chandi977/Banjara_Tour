<?php
session_start();
$name = "";
$info = "";

include "config.php"; // Include the config file to establish database connection

if (!isset($_SESSION['id'])) {
    $name = '';
} else {
    $id = $_SESSION['id'];
    $a = mysqli_query($conn, "SELECT * FROM customers WHERE id='$id'");
    $b = mysqli_fetch_array($a);
    $name = $b['name'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Banjara Tour &amp; Travels</title>

    <link rel="stylesheet" href="css/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="css/aos.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.min.css"> -->
    <link rel="stylesheet" href="js/fontawesome-free-6.0.0-beta3-web/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">

</head>

<body>

    <!-- header section starts  -->
    <header class="header">

        <a href="index.php" class="logo"><i class="fas fa-hiking"></i> Banjara Tours </a>

        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="#home">home</a>
            <a href="user/destination-grid.php">destination</a>
            <a href="user/booking-1.php">cart</a>
            <a href="user/blog.php">blog</a>
            <a href="user/services.php">services</a>
            <!-- <a href="#gallery">gallery</a> -->
        </nav>


        <div class="icons">
            <a href="#" id="menu-btn" class="fas fa-bars"></a>
            <a href="#" id="search-btn" class="fas fa-search"></a>
            <a href="#"> <?php echo $name ?></a>
            <?php
                if (isset($_SESSION['email'])) {
                    // echo '<i id="login-btn">' . $name . '</i>';
                    echo '<a href="user/logout.php" class="fas fa-sign-out-alt"> Logout</a>';
                } else {
                    // echo '<i class="fas fa-user" id="login-btn"></i>';
                    echo '<a href="#" class="fa-solid fa-user" id="login-btn"></a>';
                } 
            ?>

        </div>
    </header>

    <div class="login-form-container">
        <i class="fas fa-times" id="form-close"></i>
        <div class="form">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-google"></i>
            </div>
            <form action="user/custlogin.php" method="POST" id="login" class="input-group">
                <!-- <h2>' . $info . '</h2> -->
                <input type="text" class="input-field" name="email" placeholder="Enter your email">
                <input type="text" class="input-field" name="pass" placeholder="Enter your password">
                <input type="submit" name="sub" value="login now" class="submit-btn btn">
                <p>forget password? <a href="user/changePassword.php">click here</a></p>
            </form>
            <form action="user/newReg.php" method="POST" id="register" class="input-group">
                <input type="text" class="input-field" id="name" size="25" name="name" class="fields"
                    placeholder="Enter Full Name" required="required" autocomplete="off" />
                <input type="email" class="input-field" size="25" name="email" class="fields"
                    placeholder="Enter Email ID" required="required" autocomplete="off" />
                <input type="number" class="input-field" name="contact" class="fields" placeholder="Enter Mobile No."
                    required="required" autocomplete="off" />
                <input type="password" class="input-field" size="25" name="pass" class="fields"
                    placeholder="Enter Password" required="required" autocomplete="off" />
                <input type="submit" name="sub" value="Register" class="submit-btn btn" />
            </form>
        </div>
    </div>
    <div class="search-form">

        <div id="close-search" class="fas fa-times"></div>

        <form action="">
            <input type="search" name="" placeholder="search here..." id="search-box">
            <label for="search-box" class="fas fa-search"></label>
        </form>
    </div>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="box" style="background: url(images/home-bg-1.jpg) no-repeat;">
                        <div class="content">
                            <span>never stop</span>
                            <h3>exploring</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                            <a href="user\destination-grid.php" class="btn">get started</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box second" style="background: url(images/home-bg-2.jpg) no-repeat;">
                        <div class="content">
                            <span>make tour</span>
                            <h3>amazing</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                            <a href="#" class="btn">get started</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="box" style="background: url(images/home-bg-3.jpg) no-repeat;">
                        <div class="content">
                            <span>explore the</span>
                            <h3>new world</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit unde ex molestias soluta
                                consequatur saepe aliquam, excepturi delectus consequuntur minus!</p>
                            <a href="#" class="btn">get started</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- home section ends -->

    <section class="category" id="category">

        <h1 class="heading">adventure idea!</h1>

        <div class="box-container">

            <div class="box" data-aos="fade-up" data-aos-delay="150">
                <img src="images/caving.jpg" alt="#" loading="lazy">
                <h3>Caving</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, id.</p>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <img src="images/Rafting.jpg" alt="#" loading="lazy">
                <h3>rafting</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, id.</p>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="450">
                <img src="images/Skydiving.jpg" alt="#" loading="lazy">
                <h3>Skydiving</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, id.</p>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="600">
                <img src="images/HotAir.jpg" alt="#" loading="lazy">
                <h3>Hot Air Ballooning</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum, id.</p>
            </div>
        </div>
    </section>

    <!-- packages section starts  -->

    <section class="destination" id="destination">

        <div class="heading">
            <span>Most Visited Places</span>
            <h1>make yours destination</h1>
        </div>

        <div class="box-container">

            <div class="box" data-aos="fade-up" data-aos-delay="150">
                <div class="image">
                    <img src="admin/data/mumbai.png" alt="#" loading="lazy">
                </div>
                <div class="content">
                    <h3>Mumbai</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                    <a href="user/destination-grid.php">read more <i class="fas fa-angle-right"></i></a>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="300">
                <div class="image">
                    <img src="admin/data/manali.png" alt="#" loading="lazy">
                </div>
                <div class="content">
                    <h3>Manali</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                    <a href="user/destination-grid.php">read more <i class="fas fa-angle-right"></i></a>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="450">
                <div class="image">
                    <img src="admin/data/ladakh.png" alt="#" loading="lazy">
                </div>
                <div class="content">
                    <h3>Ladakh</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                    <a href="user/destination-grid.php">read more <i class="fas fa-angle-right"></i></a>
                </div>
            </div>

            <div class="box" data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img src="admin/data/kolkata.png" alt="#" loading="lazy">
                </div>
                <div class="content">
                    <h3>Kolkata</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                    <a href="user/destination-grid.php">read more <i class="fas fa-angle-right"></i></a>
                </div>
            </div>

        </div>

    </section>


    <!-- packages section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">

        <div class="heading">
            <span>our services</span>
            <h1>countless expericences</h1>
        </div>

        <div class="box-container">

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <i class="fas fa-globe"></i>
                <h3>worldwide</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <i class="fas fa-utensils"></i>
                <h3>food & drinks</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="600">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="750">
                <i class="fas fa-wallet"></i>
                <h3>affordable price</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="900">
                <i class="fas fa-headset"></i>
                <h3>24/7 support</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Numquam, cumque.</p>
            </div>

        </div>

    </section>

    <!-- services section ends -->

    <!-- gallery section starts  -->
    <section class="gallery" id="gallery">

        <div class="heading">
            <span>our gallery</span>
            <h1>we record memories</h1>
        </div>

        <div class="box-container">

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="images/goa.jpg" alt="...">
                <span>travel spot</span>
                <h3>Goa</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="images/keral.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Keral</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="images/rajasthan.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Rajasthan</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="images/tamilnadu.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Tamil Nadu</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="images/telangana.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Telangana</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="images/mumbai.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>mumbai</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
                <img src="images/himalaya.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Himalaya</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
                <img src="images/kashmir.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Kashmir</h3>
            </div>

            <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
                <img src="images/kedarnath.jpg" alt="#" loading="lazy">
                <span>travel spot</span>
                <h3>Uttrakhand</h3>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- contact section ends -->
    <section class="review">

        <div class="content" data-aos="fade-right" data-aos-delay="300">
            <span>testimonials</span>
            <h3>good news from our clients</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda laudantium corporis fugiat quae unde
                perspiciatis similique ab modi enim consequatur aperiam cumque distinctio facilis sit, debitis possimus
                asperiores non harum.</p>
        </div>

        <div class="box-container" data-aos="fade-left" data-aos-delay="600">

            <div class="box">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, ratione.</p>
                <div class="user">
                    <img src="images/pic1.png" alt="#" loading="lazy">
                    <div class="info">
                        <h3>Aditya Singh</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, ratione.</p>
                <div class="user">
                    <img src="images/pic2.png" alt="#" loading="lazy">
                    <div class="info">
                        <h3>Asish Sharma</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, ratione.</p>
                <div class="user">
                    <img src="images/pic3.png" alt="#" loading="lazy">
                    <div class="info">
                        <h3>Dilip Kumar</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>
            <div class="box">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia, ratione.</p>
                <div class="user">
                    <img src="images/pic4.png" alt="#" loading="lazy">
                    <div class="info">
                        <h3>Rohit Kumar</h3>
                        <span>designer</span>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- review section starts  -->

    <!-- brand section  -->
    <section class="brand-container">

        <div class="swiper-container brand-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/1.png" alt="#" loading="lazy"></div>
                <div class="swiper-slide"><img src="images/2.png" alt="#" loading="lazy"></div>
                <div class="swiper-slide"><img src="images/3.png" alt="#" loading="lazy"></div>
                <div class="swiper-slide"><img src="images/4.png" alt="#" loading="lazy"></div>
                <div class="swiper-slide"><img src="images/5.png" alt="#" loading="lazy"></div>
                <div class="swiper-slide"><img src="images/6.png" alt="#" loading="lazy"></div>
            </div>
        </div>

    </section>

    <!-- footer section  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#shop">shop</a>
                <a href="#packages">packages</a>
                <a href="#reviews">reviews</a>
                <a href="#blogs">blogs</a>
                <a href="user/changePassword.php">Change Password</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#">my account</a>
                <a href="#">my order</a>
                <a href="#">my wishlist</a>
                <a href="#">ask questions</a>
                <a href="#">terms of use</a>
                <a href="#">privacy policy</a>
                <a href="admin/dashboard.php">Dashboard</a>

            </div>

            <div class="box" style="background:transparent; box-shadow:none;">
                <h3>contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +91 1234567890 </a>
                <a href="#"> <i class="fas fa-phone"></i> +91 1234567890 </a>
                <a href="#"> <i class="fas fa-envelope"></i> banjaraAdmin@gmail.com </a>
                <a href="#"> <i class="fas fa-map"></i> Adityapur, Jamshedpur, Jharkhand </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-github"></i> github </a>
            </div>

        </div>

        <div class="credit">created by <span>Chandi, Sujeet, Rohit</span> | all rights reserved!</div>

    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- <script src="js/aos.js"></script> -->
    <script type="module" src="js/script.js"></script>


    <!-- custom js file link  -->
    <script>
    const loginBtn = document.getElementById('login');
    const registerBtn = document.getElementById('register');
    const effectBtn = document.getElementById('btn');

    function register() {
        loginBtn.style.left = "-400px";
        registerBtn.style.left = "50px";
        effectBtn.style.left = "110px";
    }

    function login() {
        loginBtn.style.left = "50px";
        registerBtn.style.left = "450px";
        effectBtn.style.left = "0";
    }
    AOS.init({
        duration: 800,
        offset: 150,
    });
    </script>
    <!-- <script src="js/swiper-bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"></script>
    <!-- <script src="js/glide.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <!-- Animate On Scroll -->




</body>

</html>