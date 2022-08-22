<?php
    session_start();

    if (empty($_SESSION['uid'])) {
        $_SESSION['status'] = " Login or Sign in First. ";
        header('location:index.php');
        exit();
    }

    if (isset($_GET['pid'])) {
        include("config.php");
        $checkItem = mysqli_query($conn, "SELECT * FROM `table_wishlist` WHERE User_id = '$_SESSION[uid]' AND Vegetable_id = '$_GET[pid]' ");
        $checkItem_count = mysqli_num_rows($checkItem);
        
        if ($checkItem_count > 0) {

            header("location:wishlist.php");
            $_SESSION['error'] = "Product already exist in wishlist. ";
            exit();
               
               
        }else {
            $wishlist = mysqli_query($conn, "INSERT INTO `table_wishlist`(`User_id`, `Vegetable_id`) VALUES ('$_SESSION[uid]','$_GET[pid]') ");

            if ($wishlist) {
                header("location:wishlist.php");
                $_SESSION['status'] = " Wishlist Updated. ";
                exit();
            }
            
        }
        
        
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Vegefoods - Wishlist</title>
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
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>shop</b></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="shop.php">Store</a>
                        <a class="dropdown-item" href="wishlist.php">Wishlist</a>
                    </div>
                    </li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <?php
                        if (empty($_SESSION['uid'])) {?>
                        <li class="nav-item"><a href="" class="nav-link" target="_blank" data-toggle="modal" data-target="#reservationModal">Login</a></li>
                        <?php 
                    }
                        if(!empty($_SESSION['uid'])){
                            include('config.php');
                                $sql = mysqli_query($conn, "SELECT * FROM table_user WHERE User_id = '$_SESSION[uid]'");
                                $userData = mysqli_fetch_array($sql);?>
                            <li class="nav-item"><a href="dashboard.php" class="nav-link"><?php echo $userData['First_Name'];?></a></li>
                        <?php 
                    } 
                    ?>
                    <?php
                    if (empty($_SESSION['uid'])) {?>
                        <li class="nav-item cta cta-colored"><a href="" class="nav-link" target="_blank" data-toggle="modal" data-target="#reservationModal"><span class="icon-shopping_cart"></span>[0]</a></li>
                        <?php
                    }
                    if(!empty($_SESSION['uid'])){
                        include ('config.php');
                        $sql = mysqli_query($conn, "SELECT * FROM table_orders WHERE User_id = '$_SESSION[uid]' and Order_status = '0'");
                        ?>
                        <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo mysqli_num_rows($sql);?>]</a></li>
                        <?php 
                    } 
                    ?>
                    </ul>
                </div>
            </div>
	    </nav>
        <!-- END nav -->

        <div class="hero-wrap hero-bread mb-2" style="background-image:url(images/bg_1.jpg)">
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-9 ftco-animate text-center fadeInUp ftco-animated">
                        <p class="breadcrumbs "><span class="mr-2 display-4 text-info"><b>My Wishlist</b></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert massage -->
        <?php
			if(isset($_SESSION['status']) && $_SESSION != ''){?>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" id="wishlist_success">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div class="mx-2"><?php echo $_SESSION['status']; ?> </div>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
				unset($_SESSION['status']);
			}

            if(isset($_SESSION['error']) && $_SESSION != ''){?>
                <div class="alert alert-info d-flex align-items-center alert-dismissible fade show" role="alert" id="wishlist_error">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div class="mx-2"><?php echo $_SESSION['error']; ?> </div>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
				unset($_SESSION['error']);
			}
            
			if(isset($_SESSION['delete']) && $_SESSION != ''){?>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" id="delete_success">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
                    <div class="mx-2"><?php echo $_SESSION['delete']; ?> </div>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
                <?php
				unset($_SESSION['delete']);
			}
		?>

        <section class="ftco-section ftco-cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th>Item</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Size</th>
                                        <th>Type</th>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include("config.php");
                                        $myWishlist = mysqli_query($conn, "SELECT Vegetable_id FROM `table_wishlist` WHERE User_id = '$_SESSION[uid]' ");
                                        $row = mysqli_num_rows($myWishlist);
                                        $i = 1;
                                        while ($myWishlistArr = mysqli_fetch_assoc($myWishlist)) {
                                            
                                            $selectItem = mysqli_query($conn, "SELECT * FROM table_vegetable WHERE Vegetable_id = '$myWishlistArr[Vegetable_id]' ");
											$vegetableItem = mysqli_fetch_assoc($selectItem); 
                                            if($i<=$row){ ?>
                                            
                                            <tr class="text-center">
                                                <td class="text-info"><?php echo $i; ?></td>
                                                <td class="image-prod"><div class="img" style="background-image:url(<?php echo $vegetableItem['Image']; ?>)"></div></td>
                                                <td class="product-name"><h3><?php echo $vegetableItem['Name']; ?></h3></td>
                                                <td class="price"><?php echo $vegetableItem['Price']; ?></td>
                                                <td class=""><?php echo $vegetableItem['Size']; ?></td>
                                                <td class=""><?php echo $vegetableItem['Type']; ?></td>
                                                <td ><a class="btn btn-success py-3 px-5" href="product-single.php?pid=<?php echo $vegetableItem['Vegetable_id'];?>">View</a></td>
                                                <td class="product-remove" data-toggle="tooltip" title="Delete Item"><a class="bg-warning" href="cancel.php?pid=<?php echo $vegetableItem['Vegetable_id'];?>"><span class="ion-ios-close"></span></a></td>
                                            </tr>   
                                            <?php
                                                $i++ ; 
                                            }
                                        }
                                        if ($row < 1) {
                                            ?>
                            
                                            <tr>
                                                <td colspan="8" align="center"><h4>Wishlist Empty</h4></td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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

        <script>
                  
            window.setTimeout(function() {
                $("#wishlist_success").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 4000);

            window.setTimeout(function() {
                $("#wishlist_error").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 4000);

            window.setTimeout(function() {
                $("#delete_success").fadeTo(500, 0).slideUp(500, function(){
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