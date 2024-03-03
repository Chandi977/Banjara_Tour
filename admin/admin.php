<?php
// include("setting.php");
session_start();
if (isset($_SESSION['aid'])) {
	header("location:dashboard.php");
}
if (isset($_POST["sub"])) {
	$e = $_POST['aid'];
	$p = $_POST['pass'];
	if ($_POST['aid'] != NULL && $_POST['pass'] != NULL) {
		$al = mysqli_connect("localhost", "root", "", "banjara tour and travel");
		$sql = "SELECT * FROM admin WHERE aid ='$e' AND password='$p'";
		$result = mysqli_query($al, $sql);
		$row = mysqli_fetch_row($result);
		if ($row > 0) {
			// echo "ok";
			$_SESSION["aid"] = $row[0];
			$_SESSION["name"] = $row[1];
			header("location:dashboard.php");
		} else {
			$info = "Wrong UserName Or Password";
		}
	}
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/admin.css">
    <title>Document</title>
</head>

<body>
    <div class="maindiv">
        <div class="mobile">
            <div class="head">
                <div class="notch"></div>
                <div class="profilebox"></div>
            </div>
            <div class="img-div">
                <img src="../images/user.png" alt="...">
                <div class="welcome-text">
                    <h2>Welcome</h2>
                    <h6>Admins</h6>
                </div>
            </div>
            <div class="user-des">
                <div class="title">
                    <h2>Login</h2>
                </div>
                <div class="line"></div>
            </div>
            <div class="display-box">
                <form action="#" method="POST">
                    <input type="text" name="aid" required placeholder="Enter Id">
                    <input type="text" name="pass" required placeholder="Enter Password">
                    <!-- <input type="submit" value="Submit"> -->
                    <button type="submit" name="sub" class="btn btn-success">Submit</button>
                </form>
            </div>

            <div class="social-icons">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-linkedin"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
</body>

</html>