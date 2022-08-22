<?php
    session_start();
    if (empty($_SESSION['oid'])) {
		header('location:index.php');
		exit();
	}
    include("config.php");

    
    if (isset($_POST['pay'])) {
        $paymentOption = mysqli_real_escape_string($conn, $_POST['optradio']);
        
        if ($paymentOption == 'Cash') {
            $updateOrder = mysqli_query($conn, "UPDATE table_orders SET Order_status = '1' WHERE User_id = '$_SESSION[uid]' and Order_id = '$_SESSION[oid]' ");
            if ($updateOrder) {
                $order = mysqli_query($conn, "UPDATE table_delivery SET payment = 'Cash on delivery' WHERE User_id = '$_SESSION[uid]' and Order_id = '$_SESSION[oid]' ");
                if ($order) {
                    $_SESSION['order_success'] = "Order Successfully.";
                    header("location: ./cart.php");
                    unset($_SESSION['oid']);
                }
            }
        }elseif ($paymentOption == 'Razorpay') {
            # code...
        }elseif ($paymentOption == 'Paypal') {
            # code...
        }
    }

    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Vegefoods - Online Easy Food Order</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">   
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/ionicons.min.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
        .ftco-navbar-light .navbar-brand:hover, .ftco-navbar-light .navbar-brand:focus{
            color: #1cf538
        }
        </style>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
			<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
			</symbol>
			<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
			</symbol>
			<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
				<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			</symbol>
		</svg>
    </head>
  
    <body class="goto-here">
		<div class="py-1 bg-primary">
    	    <div class="container">
                <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                    <div class="col-lg-12 d-block">
                        <div class="row d-flex">
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                                <span class="text">+91 9126577584</span>
                            </div>
                            <div class="col-md pr-4 d-flex topper align-items-center">
                                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                                <span class="text">animesh67samanta@email.com</span>
                            </div>
                            <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                                <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                            </div>
                        </div>
                    </div>
                </div>
		  </div>
        </div>
    
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand active" href="index.php">Vegefoods</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <?php
                            
                            if(!empty($_SESSION['uid'])){
                                include('config.php');
                                $sql = mysqli_query($conn, "SELECT * FROM table_user where User_id = '$_SESSION[uid]'");
                                $userData = mysqli_fetch_array($sql);?>
                                <li class="nav-item active"><a href="dashboard.php" class="nav-link"><b><?php echo $userData['First_Name']." " .$userData['Last_Name'];?></b></a></li>
                                <?php 
                            } 
                        ?>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <div class="hero-wrap hero-bread" style="background-image:url(images/bg_1.jpg)">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">      
                        <h1 class="mb-0 bread">payment</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php

        if(isset($_SESSION['status']) && $_SESSION != ''){?>
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" id="save_address">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div class="mx-2"><?php echo $_SESSION['status']; ?> </div>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
            <?php
            unset($_SESSION['status']);
        }                            

        ?>

        <section class="">
            <div class="container pt-3">
                <form action="payment.php" enctype="multipart/form-data" method="POST">
                    <div class="row justify-content-center" >
                        <div class="col-md-6">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                            
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" value="Cash" class="mr-2">Cash On Delivery</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" value="Razorpay" class="mr-2">Razorpay</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" value="Paypal" class="mr-2">Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="ok" class="mr-2">I have read and accept the terms and conditions</label>
                                        </div>
                                    </div>
                                </div> -->
                                <input type="submit" class="btn btn-success py-3 px-4" value="Place an order" name="pay">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        
        <footer class="ftco-footer ftco-section">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="ftco-footer-widget mb-4">
                            <h3 class="ftco-heading-2"><b>Vegefoods</b></h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ftco-footer-widget mb-6">
            	            <div class="block-23 mb-3">
	                            <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">Ghatal,Paschim Medinipur,West Bengal,   INDIA</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span class="text">+9126577584</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span class="text">animsh67@samanta.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="#" target="_blank">Animesh</a>
						</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


        <script>
                  
            window.setTimeout(function() {
                $("#save_address").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
                });
            }, 4000);
            
        </script>

        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/scrollax.min.js"></script>
        <script src="js/main.js"></script>
    

    </body>
</html>