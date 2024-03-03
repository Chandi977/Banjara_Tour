<header class="header">
    <a href="../index.php" class="logo"><i class="fas fa-hiking"></i> Banjara Tours </a>
    <div class="nav">
        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="../index.php">home</a>
            <a href="destination-grid.php">destination</a>
            <a href="booking-1.php">cart</a>
            <a href="blog.php">blog</a>
            <a href="services.php">services</a>
            <!-- <a href="#gallery">gallery</a> -->
        </nav>
    </div>

    <div class="icons">
        <a href="#" id="menu-btn" class="fas fa-bars"></a>
        <a href="#" id="search-btn" class="fas fa-search"></a>
        <a href="#">
            <?php 
                $name = " ";
                echo $name 
            ?>
        </a>
        <?php
			if (isset($_SESSION['email'])) {
				echo '<a href="logout.php" class="fas fa-sign-out-alt"> Logout</a>';
			} else {
				echo '<a href="#" class="fas fa-user" id="login-btn"></a>';
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
        <form action="custlogin.php" method="POST" id="login" class="input-group">
            <!-- <h2>' . $info . '</h2> -->
            <input type="text" class="input-field" name="email" placeholder="Enter your email">
            <input type="text" class="input-field" name="pass" placeholder="Enter your password">
            <input type="submit" name="sub" value="login now" class="submit-btn btn">
            <p>forget password? <a href="user/changePassword.php">click here</a></p>
        </form>
        <form action="newReg.php" method="POST" id="register" class="input-group">
            <input type="text" class="input-field" id="name" size="25" name="name" class="fields"
                placeholder="Enter Full Name" required="required" autocomplete="off" />
            <input type="email" class="input-field" size="25" name="email" class="fields" placeholder="Enter Email ID"
                required="required" autocomplete="off" />
            <input type="number" class="input-field" name="contact" class="fields" placeholder="Enter Mobile No."
                required="required" autocomplete="off" />
            <input type="password" class="input-field" size="25" name="pass" class="fields" placeholder="Enter Password"
                required="required" autocomplete="off" />
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