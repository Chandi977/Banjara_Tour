<?php require 'helpers/setting.php';?>
<?php 
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'helpers/head.php';?>

</head>

<body>


    <section>
        <div class="container">
            <div class="success-wrap text-center">
                <div class="success-text">
                    <i class="ti-check cl-success font-80"></i>
                    <h3>Payment Successful!</h3>

                    <ul>
                        <li>Order Number:<span class="fl-right font-midium">#125 458 7589</span></li>
                        <li>Total:<span class="fl-right font-25 font-midium">Total</span></li>
                    </ul>
                    <a href="invoice.php?id=" class="btn theme-btn">Go To Home Page</a>
                </div>
            </div>
        </div>
    </section>




    <!-- =================== START JAVASCRIPT ================== -->
    <?php include 'helpers/scripts.php';?>
    <!-- =================== END JAVASCRIPT ================== -->
    <script>
    var x = document.getElementsByTagName("BODY")[0];
    x.onload = setTimeout(() => {
        window.location.href = 'invoice.php?id=<?php echo $id;?>';
    }, 3000);
    // window.location.href = 'success-page.php';
    </script>
</body>

</html>