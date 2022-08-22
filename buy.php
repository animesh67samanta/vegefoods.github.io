<?php
    session_start();

    if (empty($_SESSION['uid'])) {
        header('location:index.php');
        exit();
    }

    if (!isset($_GET['oid'])) {
        header('location:cart.php');
    }
   
    include("config.php");
    if (isset($_POST['save'])) {
        $customerName =  mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $address = mysqli_real_escape_string($conn, $_POST['vill']);
        $city = mysqli_real_escape_string($conn, $_POST['town']);
        $zip = mysqli_real_escape_string($conn, $_POST['pincode']);
        $orderId = mysqli_real_escape_string($conn, $_POST['orderid']);
        $date = date('d-m-Y');

        $selectItem = mysqli_query($conn, "SELECT * FROM table_orders WHERE Order_id = '$orderId' ");
        $itemArr = mysqli_fetch_assoc($selectItem);
        
        $order = mysqli_query($conn, "INSERT INTO table_delivery(Order_id,User_id,Vegetable_id,payment,Price,Name,Phone,State,Street,Town,Pincode,Date) VALUES('$orderId','$_SESSION[uid]', '$itemArr[Vegetable_id]','process','$itemArr[Paid_amount]','$customerName','$phone','$state','$address','$city','$zip','$date') ");
        if ($order) {
            $_SESSION['oid'] = $orderId;
            $_SESSION['status'] = "Save Address";
            header("Location: ./payment.php");
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
                        <h1 class="mb-0 bread">Checkout</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php
            include('config.php');
            $cartItem = mysqli_query($conn, "SELECT * FROM `table_orders` WHERE Order_id =  '$_GET[oid]' ");
            $item = mysqli_fetch_assoc($cartItem);
            

            $selectItem = mysqli_query($conn,"SELECT * FROM table_vegetable WHERE Vegetable_id = '$item[Vegetable_id]' ");
            $vegetableItem = mysqli_fetch_assoc($selectItem);
            // echo "<pre>";
            // print_r($vegetableItem);
            // echo "</pre>";
        ?>
        <div class="container pt-3">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a class="img-prod"><img class="img-fluid" src="<?php echo $vegetableItem['Image']; ?>" alt=""></a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><?php echo $vegetableItem['Name']; ?></h3>
                            <p class="price"><span class="price-sale">&#8377; <?php echo $vegetableItem['Price']; ?></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- From Section Start -->

        <section class="">
            <div class="container">
                <div class="row justify-content-center" >
                    <div class="col-xl-5">
                        <div class="row my-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Product Price</span>
                                        <span>&#8377; <?php echo $vegetableItem['Price']; ?></span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery Charge</span>
                                        <span class="text-success">Free</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Quantity</span>
                                        <span><?php echo $item['Quantity']; ?> Kg.</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>&#8377; <?php echo $item['Paid_amount']; ?></span>
                                    </p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-xl-5 ftco-animate fadeInUp ftco-animated">
                        <form action="buy.php" class="billing-form" method="POST">
                            <h3 class="mb-4 billing-heading">Billing Details</h3>
                            <div class="row align-items-end my-2 mx-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                            <select name="state" id="" class="form-control" required>
                                                <option value="0">Select State</option>
                                                <option value="West Bengal">West Bengal</option>
                                                <option value="Bihar">Bihar</option>
                                                <option value="Odisha">Odisha</option>
                                                <option value="Kerala">Kerala</option>
                                                <option value="Assam">Assam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="streetaddress">Street Address</label>
                                        <input type="text" class="form-control" name="vill" placeholder="Village and street name" required>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="towncity">City</label>
                                        <input type="text" class="form-control" name="town" placeholder="Town / City" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postcodezip">Postcode / ZIP *</label>
                                        <input type="text" class="form-control" name="pincode" placeholder="ex:700086" required>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="orderid" value="<?php echo  $_GET['oid']; ?>">
                            <input type="submit" class="btn btn-success py-3 px-4" value="Proced to Payment" name="save">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- From Section End -->


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
                                    <li><span class="icon icon-phone"></span><span class="text">+9126577584</span></a></li>
                                    <li><span class="icon icon-envelope"></span><span class="text">animsh67@samanta.com</span></a></li>
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