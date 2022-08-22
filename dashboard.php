<?php
session_start();
if (empty($_SESSION['uid'])) {
  header('location:index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- Alert massage -->
    <?php
			if(isset($_SESSION['status']) && $_SESSION != ''){?>
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" id="login_status">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
          <div class="mx-2"><?php echo $_SESSION['status']; ?> </div>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
				unset($_SESSION['status']);
			}
    ?>
    
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
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.php">Store</a>
                <a class="dropdown-item" href="wishlist.php">Wishlist</a>
              </div>
            </li>
            <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
            <?php 
	      	    if(!empty($_SESSION['uid'])){
                include('config.php');
                $sql = mysqli_query($conn,"SELECT * FROM table_user where User_id = '$_SESSION[uid]'");
                $userData = mysqli_fetch_array($sql);?>
                <li class="nav-item active"><a href="dashboard.php" class="nav-link"><b><?php echo $userData['First_Name'];?></b></a></li>
                <?php
              } 
            ?>
	          <?php
	            include('config.php');
	            $sql = mysqli_query($conn, "SELECT * FROM table_orders WHERE User_id = '$_SESSION[uid]' and Order_status = '0'");
	          ?>

	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo mysqli_num_rows($sql);?>]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);"></div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section-bold mb-4 mt-md-5">
	          	<div class="ml-md-0">
		            <h2 class="mb-4">Welcome to Vegefoods</h2>
	            </div>
	          </div>

	          <?php
	            include('config.php');
              $sql = mysqli_query($conn,"SELECT * FROM table_user WHERE User_id = '$_SESSION[uid]'");
              $userData = mysqli_fetch_array($sql);
            ?>
	          <div class="pb-md-5">
	          	<p>Name: <?php echo $userData['First_Name'];?>  <?php echo $userData['Last_Name'];?></p>
							<p>Email: <?php echo $userData['Email'];?></p>
							<p>Address: <?php echo $userData['Address'];?></p>
							<p>Pincode: <?php echo $userData['Pincode'];?></p>
							<p>Contact: <?php echo $userData['Contact'];?></p>
							<p><a href="user-edit.php?id=<?php echo $userData['User_id']; ?>" class="btn btn-primary">Edit Profile</a>
							<a href="logout.php" class="btn btn-danger">Logout</a></p>
						</div>
					</div>
				</div>
			</div>
		</section>
    
     
    <section class="ftco-section ftco-cart">
      <span class="subheading text-center"><h3><b><u>Your Order List</u></b></h3></span>
      <div class="container">
        <div class="row">
          <div class="col-md-12 ftco-animate fadeInUp ftco-animated">
            <div class="cart-list">
              <table class="table">
                <thead class="thead-primary">
                  <tr class="text-center">
                    <th>Item</th>
                    <th>Image</th>
                    <th>Order Date</th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity(kg.)</th>
                    <th>Total</th>
                    <th>Cancel Order</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                    include('config.php');
                    $userOrder = mysqli_query($conn, "SELECT * FROM table_orders WHERE User_id = '$_SESSION[uid]' and Order_status = '1' ");
                    $row = mysqli_num_rows($userOrder);
                    $i=1;
        
                    while($orderItems = mysqli_fetch_array($userOrder)) {
                      $selectItem = mysqli_query($conn, "SELECT * FROM table_vegetable WHERE Vegetable_id = '$orderItems[Vegetable_id]' ");
                      $vegetableItem = mysqli_fetch_array($selectItem);
                      if ($i<=$row) {
                      ?>
                      <tr class="text-center">
                        <td><?php echo $i; ?></td>
                        <td class="image-prod"><div class="img" style="background-image:url(<?php echo $vegetableItem['Image'];?>)"></div></td>
                        <td class="order-date"> <?php echo $orderItems['Order_date'];?></td>
                        <td class="product-name"><h3><?php echo $vegetableItem['Name'];?></h3></td>
                        <td class="price">Rs. <?php echo $vegetableItem['Price'];?></td>
                        <td class="quantity"><?php echo $orderItems['Quantity'];?></td>
                        <td class="total">Rs. <?php echo $vegetableItem['Price']*$orderItems['Quantity'];?></td>
                        <td class="product-remove" data-toggle="tooltip" title="Cancel Order Item"><a class="bg-danger" href="cancel.php?oid=<?php echo $orderItems['Order_id'];?>"><span class="ion-ios-close"></span></a></td>
                      </tr>      
                      <?php 
                      }
                      $i++;
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
        $("#login_status").fadeTo(500, 0).slideUp(500, function(){
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>