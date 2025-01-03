<?php
session_start();

if (!isset($_SESSION['aid'])) {
    header("location:admin.php");
}

$aid = $_SESSION['aid'];
$info = "";

include("../config.php"); // Include the config.php file to establish the database connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$datafrom = mysqli_query($conn, "SELECT * FROM invoice");
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
            
            $datafrom = mysqli_query($conn,"select * from invoice");
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
                                     $sum = mysqli_query($conn,"SELECT SUM(billamount) FROM invoice");
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
                                        $column = mysqli_query($conn,"select count(*) from invoice");
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
                                        $column = mysqli_query($conn,"select count(*) from holiday");
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
                                        $column = mysqli_query($conn,"select count(*) from customers");
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
                                    
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $x = mysqli_query($conn, "SELECT * FROM invoice");
                                    if ($x && mysqli_num_rows($x) > 0) {
                                        $u = 1;
                                        while ($y = mysqli_fetch_array($x)) {
                                            if ($u == 4) break;
                                            $cartid = $y['userbookingid'] ?? null;
                                            $cartdata = [];
                                            if ($cartid) {
                                                $cart = mysqli_query($conn, "SELECT * FROM cart WHERE id = $cartid");
                                                if ($cart && mysqli_num_rows($cart) > 0) {
                                                    $cartdata = mysqli_fetch_array($cart);
                                                }
                                            }

                                            echo '<tr class="table-tr">';
                                            echo '<td class="table-td">' . $u . '</td>';
                                            echo '<td class="table-td">' . ($y['billname'] ?? 'N/A') . '</td>';
                                            echo '<td class="table-td">' . ($y['billupi'] ? 'UPI' : 'Card') . '</td>';
                                            echo '<td class="table-td">' . (isset($cartdata['checkin'], $cartdata['checkout'])
                                                ? $cartdata['checkin'] . ' > ' . $cartdata['checkout']
                                                : 'Date not available') . '</td>';
                                            echo '<td class="table-td">' . ($y['billamount'] ?? '0') . '</td>';
                                            echo '<td class="table-td">' . (isset($cartdata['adult'], $cartdata['children'])
                                                ? $cartdata['adult'] + $cartdata['children']
                                                : '0') . '</td>';
                                            echo '<td class="table-td">' . ($cartdata['destination'] ?? 'N/A') . '</td>';
                                            echo '<td class="table-td">' . ($cartdata['hotel'] ?? 'N/A') . '</td>';
                                            echo '<td class="table-td">' . $cartid . '</td>';
                                            echo '</tr>';

                                            $u++;
                                        }
                                    } else {
                                    echo "No invoices found.";
                                    }
                                ?>
                            </table>
                        </div>
                        <div class="top-sales box">
                            <div class="title">
                                <h2>Top Selling</h2>
                            </div>
                            <?php
                                
                                $x = mysqli_query($conn, "SELECT * FROM holiday");
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
                        // Fetch all invoices
                        $x = mysqli_query($conn, "SELECT * FROM invoice");
                        if ($x && mysqli_num_rows($x) > 0) { // Check if the query is valid and has results
                            while ($y = mysqli_fetch_array($x)) { ?>
                    <tr class="labels">
                        <td class="load-table-td">
                            <?php 
                                echo $u;
                                $u++;
                            ?>
                        </td>
                        <td class="load-table-td"><?php echo isset($y['billname']) ? $y['billname'] : 'N/A'; ?></td>
                        <td class="load-table-td"><?php echo isset($y['billemail']) ? $y['billemail'] : 'N/A'; ?></td>
                        <td class="load-table-td">
                            <?php echo $y['journeystart']?>
                        </td>
                        <td class="load-table-td"><?php echo isset($y['billamount']) ? $y['billamount'] : '0'; ?></td>
                        <td class="load-table-td">
                            <?php
                                    if (isset($cartdata['adult'], $cartdata['children'])) {
                                        echo $cartdata['adult'] + $cartdata['children'];
                                    } else {
                                        echo '0';
                                    }
                                    ?>
                        </td>
                        <td class="load-table-td">
                            <?php echo isset($cartdata['destination']) ? $cartdata['destination'] : 'N/A'; ?></td>
                        <td class="load-table-td"><?php echo isset($cartdata['hotel']) ? $cartdata['hotel'] : 'N/A'; ?>
                        </td>
                        <td class="load-table-td" id="delete-id">
                            <?php echo $y['billupi'] ? 'UPI' : 'Card'; ?>
                        </td>
                        <td class="load-table-td">
                            <?php echo isset($y['transactiondate']) ? $y['transactiondate'] : 'N/A'; ?></td>
                    </tr>
                    <?php }
                        } else {
                            echo '<tr><td colspan="10">No invoices found</td></tr>';
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
                        $result = mysqli_query($conn, $x);
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
                                <a href="#"><img src="../images/anurag.jpeg" class="poster" /></a>
                            </div>
                            <div class="ticket-container">
                                <div class="ticket__content">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"> <i class="fab fa-github"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <h4 class="ticket__movie-title">Anurag Varshney</h4>
                                    <p class="ticket__movie-slogan">
                                        Web/Software Developers
                                    </p>
                                    <ul>
                                        <li>University : Galgotias College of Engineering and Technology</li>
                                        <li>University Roll : 2300970140044</li>
                                        <li>Stream : MCA</li>
                                        <li>Session : 2023-25</li>
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
                                        <li>University : Galgotias College of Engineering and Technology</li>
                                        <li>University Roll : 2300970140053</li>
                                        <li>Stream : MCA</li>
                                        <li>Session : 2023-25</li>
                                    </ul>

                                </div>
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