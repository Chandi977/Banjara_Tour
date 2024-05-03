<?php
include("../config.php"); // Include the config.php file to establish the database connection
session_start();

if (!isset($_SESSION['aid'])) {
    header("location:admin.php");
}

$aid = $_SESSION['aid'];
$info = "";

$al = mysqli_connect($host, $username, $password, $database); // Establish the database connection using the configuration from config.php

if (!$al) {
    die("Connection failed: " . mysqli_connect_error());
}

$datafrom = mysqli_query($al, "SELECT * FROM invoice");
$data = mysqli_fetch_array($datafrom);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="css/dashboard.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <title>Dashboard</title>
</head>

<body>
    <div class="mobile">
        <div class="main-text">
            <h2>
                This page is for admin use and it requires Laptop or Desktop to work properly.
            </h2>
        </div>
        <div class="links">
            <h2><a href="../index.php">Home</a></h2>
        </div>
    </div>
    <main>
        <div class="side-bar">
            <div class="logo-top">
                <a href="#">
                    <h1>The Banjara Tours & Travels</h1>
                </a>
            </div>
            <ul class="nav-links">
                <li class="nav-tab active" data-view-name="create">
                    <a href="#">
                        <h2><span> Dashboard </span></h2>
                    </a>
                </li>
                <li class="nav-tab" data-view-name="load">
                    <a href="#">
                        <h2><span> Orders </span></h2>
                    </a>
                </li>
                <li class="nav-tab" data-view-name="settings">
                    <a href="#">
                        <h2><span> Packages </span></h2>
                    </a>
                </li>
                <li class="nav-tab" data-view-name="team">
                    <a href="#team">
                        <h2><span> Team </span></h2>
                    </a>
                </li>
                <li class="nav-tab" data-view-name="password">
                    <a href="#password">
                        <h2><span> Change Password </span></h2>
                    </a>
                </li>
            </ul>
        </div>
        <?php
            $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
            $datafrom = mysqli_query($al,"select * from invoice");
            $data = mysqli_fetch_array($datafrom);
            ?>
        <div class="main-content w-100 p-5">
            <div class="create" id="dashboard" data-view-active="true">
                <div class="home-content ">
                    <div class="overview-boxes">
                        <div class="box">
                            <div class="right-side">
                                <div class="box-topic">Total Order</div>
                                <div class="number">
                                    <?php 
                                     $sum = mysqli_query($al,"SELECT SUM(billamount) FROM invoice");
                                     $sumdata = mysqli_fetch_array($sum);
                                     echo $sumdata[0];
                                     ?>
                                </div>

                            </div>
                            <i class='bx bx-cart-alt cart'></i>
                        </div>
                        <div class="box">
                            <div class="right-side">
                                <div class="box-topic">Total bookings</div>
                                <div class="number">
                                    <?php
                                        $column = mysqli_query($al,"select count(*) from invoice");
                                        $columndata = mysqli_fetch_array($column);
                                        // $columndata = explode(',',$column);
                                        echo $columndata[0];
                                      ?>
                                </div>

                            </div>
                            <i class='bx bxs-cart-add cart two'></i>
                        </div>
                        <div class="box">
                            <div class="right-side">
                                <div class="box-topic">Total Packages</div>
                                <div class="number">
                                    <?php
                                        $column = mysqli_query($al,"select count(*) from holiday");
                                        $columndata = mysqli_fetch_array($column);
                                        // $columndata = explode(',',$column);
                                        echo $columndata[0];
                                      ?>
                                </div>
                            </div>
                            <i class='bx bx-cart cart three'></i>
                        </div>
                        <div class="box">
                            <div class="right-side">
                                <div class="box-topic">Total User</div>
                                <div class="number">
                                    <?php
                                        $column = mysqli_query($al,"select count(*) from customers");
                                        $columndata = mysqli_fetch_array($column);
                                        // $columndata = explode(',',$column);
                                        echo $columndata[0];
                                      ?>
                                </div>

                            </div>
                            <i class="fas fa-user"></i>
                            <!-- <img src="../images/user.png" alt=""> -->
                        </div>
                    </div>

                    <div class="sales-boxes">
                        <div class="recent-sales box">
                            <h2>Frequent Orders</h2>
                            <!-- <div class="line"></div> -->
                            <table border="0" cellpadding="5" cellspacing="5" class="table">
                                <tr class="table-tr">
                                    <th class="main">Sr.No.</th>
                                    <th class="main">Biller Name</th>
                                    <th class="main">Payment by</th>
                                    <th class="main">Journey By</th>
                                    <th class="main">Total Amount</th>
                                    <th class="main">Members</th>
                                    <th class="main">Destination</th>
                                    <th class="main">Leaving</th>
                                    <th class="main">Id</th>
                                    <!-- <th class="main">Delete</th> -->
                                </tr>
                                <?php
                                    // $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
                                    $u = 1;
                                    $x = mysqli_query($al, "SELECT * FROM invoice");
                                    while ($y = mysqli_fetch_array($x)) {

                                        if ($u == 4)
                                            break; ?>
                                <tr class="table-tr">
                                    <td class="table-td">
                                        <?php echo $u;?>
                                    </td>
                                    <td class="table-td">
                                        <?php echo $y['billname'];?>
                                    </td>
                                    <td class="table-td">
                                        <?php 
                                     if ($y['billupi']) {
                                         echo 'UPI';
                                     } else {
                                         echo 'Card';
                                     }
                                     ?>
                                    </td>
                                    <td class="table-td">
                                        <?php
                                         $cartid = $y['userbookingid'];
                                            $cart = mysqli_query($al, "SELECT * FROM cart where id = $cartid");
                                            $cartdata = mysqli_fetch_array($cart);
                                            echo $cartdata['checkin'] .' > '. $cartdata['checkout'];
                                          ?>
                                    </td>
                                    <td class="table-td">
                                        <?php echo $y['billamount'];?>
                                    </td>
                                    <td class="table-td">
                                        <?php echo $cartdata['adult']+$cartdata['children'];?>
                                    </td>
                                    <td class="table-td">
                                        <?php echo $cartdata['destination'];?>
                                    </td>
                                    <td class="table-td">
                                        <?php echo $cartdata['hotel'];?> </td>
                                    <td class="table-td" id="delete-id">
                                        <?php echo $y['userbookingid'];?>
                                    </td>
                                    <!-- <td class="table-td"><button onclick="myFunction()"><a id="deletlist" href="#"
                                                 class="link">Delete</a></button></td> -->
                                </tr>
                                <?php
                                  $u++;} ?>
                            </table>
                        </div>
                        <div class="top-sales box">
                            <div class="title">
                                <h2>Top Selling</h2>
                            </div>
                            <?php
                                $al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
                                $x = mysqli_query($al, "SELECT * FROM holiday");
                                $t = 1;
                                while ($y = mysqli_fetch_array($x)) {
                                    if ($t == 6)
                                        break;
                                ?>
                            <ul class="top-sales-details">
                                <li>
                                    <a href="#">
                                        <img src="<?php 
                                         echo $y['path']; 
                                         ?>" alt="...">
                                        <span class="product">
                                            <?php 
                                             echo $y['name']; 
                                             ?></span>
                                    </a>
                                    <span class="price"><?php 
                                     echo '₹' . $y['hotelcharge']; 
                                     ?></span>
                                </li>
                                <?php 
                                 $t++;} 
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="load" id="load" data-view-active="false">
                <h2>Total Orders followed by users</h2>
                <table border="0" cellpadding="5" cellspacing="5" class="load-table">
                    <tr class="load-table-tr">
                        <th class="load-table-th">Sr.No.</th>
                        <th class="load-table-th">Name</th>
                        <th class="load-table-th">Email</th>
                        <th class="load-table-th">Journy by </th>
                        <th class="load-table-th">Amount</th>
                        <th class="load-table-th">Members</th>
                        <th class="load-table-th">Destination</th>
                        <th class="load-table-th">Hotel</th>
                        <th class="load-table-th">Transaction by</th>
                        <th class="load-table-th">Transaction Date</th>
                    </tr>
                    <?php
                        $u = 1;
                        // $datafrom = mysqli_query($al,"select * from invoice");
                        $x = mysqli_query($al, "SELECT * FROM invoice");
                        while ($y = mysqli_fetch_array($x)) {
                        ?>
                    <tr class="labels">
                        <td class="load-table-td">
                            <?php 
                             echo $u;
                                    $u++;
                                    ?>
                        </td>
                        <td class="load-table-td"><?php 
                          echo $y['billname'];
                         ?></td>
                        <td class="load-table-td"><?php 
                         echo $y['billemail'];
                         ?></td>
                        <td class="load-table-td"><?php
                           $cartid = $y['userbookingid'];
                           $cart = mysqli_query($al, "SELECT * FROM cart where id = $cartid");
                           $cartdata = mysqli_fetch_array($cart);
                           echo $cartdata['checkin'] .' > '. $cartdata['checkout'];
                           ?></td>
                        <td class="load-table-td"><?php echo $y['billamount'];?></td>
                        <td class="load-table-td">
                            <?php echo $cartdata['adult']+$cartdata['children'];?></td>
                        <td class="load-table-td"><?php echo $cartdata['destination'];?></td>
                        <td class="load-table-td"><?php echo $cartdata['hotel'];?></td>
                        <td class="load-table-td" id="delete-id"><?php 
                                     if ($y['billupi']) {
                                         echo 'UPI';
                                     } else {
                                         echo 'Card';
                                     }
                                     ?></td>
                        <td class="load-table-td"><?php echo $y['transactiondate'];?></td>
                        <!-- <td class="load-table-td"><button onclick="myFunction(<?php $suprem; ?>)"><a id="deletlist"
                                     href="#" class="link">Delete</a></button></td> -->
                        <script>
                        function deletehrefclass() {
                            var r = confirm("Press a button!");
                            if (r == true) {
                                document.getElementById("#deletehref").href = "deleteH.php?dd=<?php 
                                    // echo $y['id'];
                                  ?>";
                            } else {
                                document.getElementById("#deletehref").href = "#";
                            }

                        }
                        </script>
                    </tr>
                    <?php 
                    } 
                    ?>
                </table>
            </div>


            <div class="settings" id="settings" data-view-active="false">
                <!-- <h2 class="form-head"><span class="entypo-login"><i class="fab fa-sign-in"></i></span> Add Packages
                     </h2>
                     <button class="submit" name="sub"><span class="entypo-lock"><i
                                 class="fab fa-lock"></i></span></button>
                     <p><?php echo $info; ?></p>
                     <span class="inputUserIcon">
                         <i class="fas fa-plane-departure"></i>
                     </span>
                     <input type="text" name="name" class="user" placeholder="Package Name" />
                     <span class="inputPassIcon">
                         <i class="fas fa-rupee-sign"></i>
                     </span>
                     <input type="file" name="img" class="user" placeholder="Package Name" />
                     <span class="inputPassIcon">
                         <i class="fas fa-rupee-sign"></i>
                     </span>
                     <input type="number" name="amount" class="pass" placeholder="Amount" /> -->
                <form method="POST" class="wrapper" action="holiday.php" enctype="multipart/form-data">
                    <div class="wrapper">
                        <div class="title">
                            Add Holiday Package
                        </div>
                        <div class="form">
                            <div class="inputfield">
                                <label>Package Name</label>
                                <input type="text" name="name" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Amount</label>
                                <input type="text" name="amount" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Sub Destination</label>
                                <input type="text" name="subdesti" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Hotel Charge</label>
                                <input type="number" name="hotelcharge" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Guide Charge</label>
                                <input type="number" name="guidecharge" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Mobile No.</label>
                                <input type="number" name="mobilenum" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Hotel Email</label>
                                <input type="email" name="holidayemail" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Rating</label>
                                <input type="text" name="star" class="input">
                            </div>
                            <div class="inputfield">
                                <label>Image</label>
                                <input type="file" name="img" class="input">
                            </div>
                            <div class="inputfield terms">
                                <div class="inputfield">
                                    <label>About</label>
                                    <textarea class="textarea" name="about"></textarea>
                                </div>
                            </div>
                            <div class="inputfield">
                                <input type="submit" name="sub" class="btn">
                            </div>
                        </div>
                        <h2 class="table-head"> <span class="subHead">Current Holiday Packages<br /></span><br /></h2>
                        <div class="table-show" id="sWrapper">
                            <?php
                        $u = 1;
                        $x = "SELECT * FROM holiday";
                        $result = mysqli_query($al, $x);
                        echo '<table class="table">
                        <thead>
                            <tr class="table-tr">
                                <th class="main">ID</th>
                                <th class="main">Destination</th>
                                <th class="main">Price</th>
                            </tr>
                        <thead>';
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="table-tr">
                                <td class="table-td">' . $row['id'] . '</td>
                                <td class="table-td">' . $row['name'] . '</td>
                                <td class="table-td">' . $row['hotelcharge'] . '</td>
                            </tr>';
                        }
                        echo "</table>";
                        ?>
                        </div>
                    </div>

                </form>


            </div>
            <div class="team" id="team" data-view-active="false">
                <div class="container">
                    <div class="hero-container">
                        <div class="main-container">
                            <div class="poster-container">
                                <a href="#"><img src="../images/sujeet.jpeg" class="poster" /></a>
                            </div>
                            <div class="ticket-container">
                                <div class="ticket__content">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"> <i class="fab fa-github"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <h4 class="ticket__movie-title">Sujeet Kumar</h4>
                                    <p class="ticket__movie-slogan">
                                        Web/Software Developers
                                    </p>
                                    <ul>
                                        <li>University : Netaji Subhas University,Jamshedpur</li>
                                        <li>University Roll : 1903060</li>
                                        <li>Stream : BCA</li>
                                        <li>Session : 2019-22</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="main-container">
                            <div class="poster-container">
                                <a href="#"><img src="../images/001.jpg" class="poster" /></a>
                            </div>
                            <div class="social-icons">

                            </div>
                            <div class="ticket-container">
                                <div class="ticket__content">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"> <i class="fab fa-github"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <h4 class="ticket__movie-title">Chandi Charan Mahato</h4>
                                    <p class="ticket__movie-slogan">Web/Software Developers</p>
                                    <ul>
                                        <li>University : Netaji Subhas University,Jamshedpur</li>
                                        <li>University Roll : 1903016</li>
                                        <li>Stream : BCA</li>
                                        <li>Session : 2019-22</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="main-container">
                            <div class="poster-container">
                                <a href="#"><img src="../images/rohit.png" class="poster" /></a>
                            </div>
                            <div class="social-icons">

                            </div>
                            <div class="ticket-container">
                                <div class="ticket__content">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"> <i class="fab fa-github"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <h4 class="ticket__movie-title">Rohit Kumar</h4>
                                    <p class="ticket__movie-slogan">Web/Software Developers</p>
                                    <ul>
                                        <li>University : Netaji Subhas University,Jamshedpur</li>
                                        <li>University Roll : 1903051</li>
                                        <li>Stream : BCA</li>
                                        <li>Session : 2019-22</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="password" id="password" data-view-active="false">
                <div class="container">
                    <div class="title">
                        <h2>Change Password</h2>
                    </div>
                    <div class="box">
                        <form action="changePasswordAdmin.php" class="form" method="POST">
                            <?php echo $info; ?>
                            <input type="password" name="old" size="25" class="fields" placeholder="Enter Old Password"
                                required="required">
                            <input type="password" name="p1" size="25" class="fields" placeholder="Enter New Password"
                                required="required">
                            <input type="password" name="p2" size="25" class="fields" placeholder="Re-Type New Password"
                                required="required">
                            <input type="submit" name="sub" value="Change Password" class="fields">
                        </form>
                    </div>
                    <!-- <button class="btn btn-primary">Logout</button> -->
                    <a href="logoutadmin.php"><button class="btn btn-primary">Logout</button></a>
                </div>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <script>
    const navs = document.querySelectorAll(".side-bar > ul > li");

    navs.forEach((nav) => {
        nav.addEventListener("click", (e) => {
            document.querySelector(".nav-tab.active").classList.remove("active");
            nav.classList.add("active");

            // Hide active nav view
            document
                .querySelector('div[data-view-active="true"]')
                .setAttribute("data-view-active", false);

            const nav_view = nav.getAttribute("data-view-name");
            document
                .querySelector(`.${nav_view}`)
                .setAttribute("data-view-active", true);
        });
    });
    </script>
</body>

</html>