<?php
session_start();
$info = '';
if (isset($_POST['sub'])) {
    include "../config.php"; // Include the config file to establish database connection

    $email = $_POST['email'];
    $a = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
    $b = mysqli_fetch_array($a);
    $name = $b['name'];
    $pass = $b['password'];
    $old = $_POST['old'];
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    if ($_POST['old'] == NULL || $_POST['p1'] == NULL || $_POST['p2'] == NULL) {
        echo "<script> alert('Form cannot be null');
                window.location.href = 'changePassword.php';
              </script>";
    } else {
        if ($old != $pass) {
            echo "<script> alert('Incorrect Old Password');
                window.location.href = 'changePassword.php';
              </script>";
        } elseif ($p1 != $p2) {
            echo "<script> alert('Confirm Password is not same');
                window.location.href = 'changePassword.php';
              </script>";
        } else {
            if (mysqli_query($conn, "UPDATE customers SET password ='$p2' WHERE email='$email'")) {
                echo "<script> alert('Password is changed Successfully');
                window.location.href = '../index.php';
              </script>";
            } else {
                echo "<script> alert('Something went wrong..');
                window.location.href = 'changePassword.php';
              </script>";
            }
        }
    }
}
?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Banjara Tour &amp; Travels</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .ashu {
        border: 1px solid #333;
        border-collapse: collapse;
        color: #FFF;
        text-shadow: 1px 1px 1px #000000;
    }

    body {
        margin: 80px;
    }

    #header {
        /* background-color:rgba(255,153,0,0.6);
	*/
        background: linear-gradient(#ff00aacc, rgba(226, 8, 226, 0.8));
        height: 60px;
        box-shadow: 0px 0px 100px #000000;
    }

    .headingMain {
        font-family: "Segoe UI";
        font-size: 36px;
        color: #FFF;
        text-shadow: 1px 1px 1px #000000;
    }

    .design {
        padding: 10px;
        box-shadow: 0px 0px 40px #000000;
    }

    .labels {
        font-family: "Segoe UI";
        font-style: italic;
        font-size: 14px;
        color: #000;
    }

    .fields {
        background-color: transparent;
        border: 2px solid #C60;
        color: #000;
        padding: 5px;
    }

    a.link:link {
        font-family: "Segoe UI";
        font-size: 16px;
        color: #000;
        text-decoration: none;
    }

    a.link:active {
        font-family: "Segoe UI";
        font-size: 16px;
        color: #000;
        text-decoration: none;
    }

    a.link:visited {
        font-family: "Segoe UI";
        font-size: 16px;
        color: #000;
        text-decoration: none;
    }

    a.link:hover {
        font-family: "Segoe UI";
        font-size: 16px;
        color: #FFF;
        text-decoration: none;
    }

    .subHead {
        font-family: "Arial Narrow";
        color: #333;
        font-size: 26px;
    }

    .info {
        font-family: "Arial Narrow";
        color: #333;
        font-size: 16px;
    }

    a.cmd:link {
        font-family: "Segoe UI";
        font-size: 20px;
        color: #000;
        text-decoration: none;
        padding: 10px;
        border-radius: 10px;
    }

    a.cmd:active {
        font-family: "Segoe UI";
        font-size: 20px;
        color: #000;
        text-decoration: none;
    }

    a.cmd:visited {
        font-family: "Segoe UI";
        font-size: 20px;
        color: #000;
        text-decoration: none;
    }

    a.cmd:hover {
        font-family: "Segoe UI";
        font-size: 20px;
        color: #FFF;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div id="header">
        <div align="center"> <span class="headingMain">Banjara Tours &amp; Travels</span> </div>
    </div>
    <br />
    <br />

    <div align="center">

        <span class="subHead">Change Password<br /></span><br />
        <form method="post" action="">
            <table cellpadding="3" cellspacing="3" class="design" align="center">
                <tr>
                    <td colspan="2" class="info" align="center"><?php echo $info; ?></td>
                </tr>
                <tr>
                    <td class="labels">Email :</td>
                    <td><input type="email" name="email" size="25" class="fields" placeholder="example@gmail.com"
                            required="required" /></td>
                </tr>
                <tr>
                    <td class="labels">Old Password :</td>
                    <td><input type="password" name="old" size="25" class="fields" placeholder="1234567890"
                            required="required" /></td>
                </tr>
                <tr>
                    <td class="labels">New Password :</td>
                    <td><input type="password" name="p1" size="25" class="fields" placeholder="1234567890"
                            required="required" /></td>
                </tr>
                <tr>
                    <td class="labels">Re-Type Password :</td>
                    <td><input type="password" name="p2" size="25" class="fields" placeholder="1234567890"
                            required="required" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="sub" value="Change Password"
                            class="fields" /></td>
                </tr>
            </table>
        </form>
        <br />
        <br />
        <a href="../index.php" class="link">HOME</a>
    </div>
</body>

</html>