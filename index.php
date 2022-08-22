<?php
  session_start();
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
    <!-- Alert massage -->
    <?php
			if(isset($_SESSION['status']) && $_SESSION != ''){?>
        <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert" id="login_error">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
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
	      <a class="navbar-brand active" href="index.php">Vegefoods</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link"><b>Home</b></a></li>
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
	            if (empty($_SESSION['uid'])) {?>
	              <li class="nav-item"><a href="" class="nav-link" target="_blank" data-toggle="modal" data-target="#reservationModal">Login</a></li>
	      	      <?php 
              }
	      	    if(!empty($_SESSION['uid'])){
	      		    include('config.php');
				        $sql = mysqli_query($conn, "SELECT * FROM table_user where User_id = '$_SESSION[uid]'");
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
                $sql = mysqli_query($conn, "SELECT * from table_orders WHERE User_id = '$_SESSION[uid]' and Order_status = '0'");
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

    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
	            </div>
	          </div>
	        </div>
	      </div>
        <div class="slider-item" style="background-image: url(images/image_5.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div class="col-sm-12 ftco-animate text-center">
                <h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
                <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider-item" style="background-image: url(images/sharon-pittaway.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div class="col-sm-12 ftco-animate text-center">
                <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                <p><a href="shop.php" class="btn btn-primary">View Details</a></p>
              </div>
            </div>
          </div>
        </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over RS-100</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries.</p>
          </div>
        </div>   		
    	</div>

    	<div class="container">
        <div class="row">

          <?php 
            include('config.php');
            $sql = mysqli_query($conn,"SELECT * FROM table_vegetable LIMIT 8");
            // $rows = mysqli_num_rows($sql);

            while($row = mysqli_fetch_array($sql)){?>
              <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                  <a href="product-single.php?pid=<?php echo $row[0];?>" class="img-prod"><img class="img-fluid" src="<?php echo $row[7];?>" alt="">
                    <!-- <span class="status">30%</span> -->
                    <div class="overlay"></div>
                  </a>
                  <div class="text py-3 pb-4 px-3 text-center">
                    <h3><a href="product-single.php?pid=<?php echo $row[0];?>"><?php echo $row[1];?></a></h3>
                    <div class="d-flex">
                      <div class="pricing">
                        <p class="price"><span class="price-sale">Rs. <?php echo $row[5];?></span></p>
                      </div>
                    </div>
                    <div class="bottom-area d-flex px-3">
                      <div class="m-auto d-flex">
                        <p class="price mx-3"><span class="price-sale">Rs. <?php echo $row[5];?></span></p>
                        <a href="wishlist.php?pid=<?php echo $row[0];?>" class="heart d-flex justify-content-center align-items-center" data-toggle="tooltip" title="Add to wishlist">
                          <span><i class="ion-ios-heart"></i></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             <?php 
            } 
          ?>
        </div>
    	</div>
    </section>
		
	
		<!-- <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
          	<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
          	<span>Get e-mail updates about our latest shops and special offers</span></div>

          <div class="col-md-6 d-flex align-items-center">
            <form action="#" class="subscribe-form">
              <div class="form-group d-flex">
                <input type="text" class="form-control" placeholder="Enter email address">
                <input type="submit" value="Subscribe" class="submit px-3">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section> -->

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

    <?php
    
      include('connector.php');
      include('config.php');

      $google_login_button = '';

       

      if(isset($_GET["code"])) {

        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


        if(!isset($token['error'])) {
        
          $google_client->setAccessToken($token['access_token']);
          $_SESSION['access_token'] = $token['access_token'];

          // getting profile information
          $google_service = new Google_Service_Oauth2($google_client);
          $google_account_data = $google_service->userinfo->get();

          // showing profile info
          // echo "<pre>";
          // print_r($google_account_data);
          // echo "Outside";

          // code to store in db...
          
          $id = mysqli_real_escape_string($conn, $google_account_data->id);
          $firstName = mysqli_real_escape_string($conn, $google_account_data->givenName);
          $lastname = mysqli_real_escape_string($conn, $google_account_data->familyName);
          $email = mysqli_real_escape_string($conn, $google_account_data->email);


          # check user already exists.
          $emailCheck = mysqli_query($conn, "SELECT Email,User_id fROM `table_user` WHERE `Email` = '$email' AND `Password` = '$id' ");
          
          if (mysqli_num_rows($emailCheck) > 0) {

            $email_fetch = mysqli_fetch_array($emailCheck);
            
            $_SESSION['uid'] = $email_fetch['User_id'];
            ?>
              <script>
                location.href="dashboard.php";
              </script>
            <?php
            $_SESSION['status'] = "Login Successfull.";
            
          }else {
            # if user not exsist.
            $insert = mysqli_query($conn, "INSERT INTO `table_user` (First_Name,Last_Name,Email,Password) VALUES('$firstName','$lastname','$email','$id') ");

            if ($insert) {
              $check = mysqli_query($conn, "SELECT Email,User_id FROM `table_user` WHERE `Email` = '$email' ");
              $emailFetch = mysqli_fetch_array($check);
              $_SESSION['uid'] = $emailFetch['User_id'];
              ?>
                <script>
                  location.href="dashboard.php";
                </script>
              <?php
              $_SESSION['status'] = "Google Login Successfully.";

            }else{
              echo "Sign up failed!(Something went wrong).";
            }
          }
        }
        
      }else {
        
        if(!isset($_SESSION['access_token'])) {
          $google_login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-warning btn-floating mx-1"><i class="icon-google"></i></a>';
        }
      }

    ?>
    


    
    <!-- modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 p-5">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <small>CLOSE </small><span aria-hidden="true">&times;</span>
                </button>
                <h1 class="mb-4">Log In</h1>  
                <form action="login.php" method="POST">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="m_email">Email</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="Password">Password</label>
                      <input type="password" class="form-control" name="pass" required>
                    </div>
                  </div>
                  <div class="row">
                  	<div class="col-md-2 form-group"></div>
                    <div class="col-md-4 form-group mt-3">
                      <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <input type="reset" class="btn btn-danger btn-block" value="Reset">
                    </div>
                  </div>
                  <div class="row ">
                  	<div class="col-md-10 mx-4">
                      <div class="col-12 form-group"  style="text-align: center;">
                        Create an account? <a href="signup.php">Sign up</a>
                      </div>
                      <div class="col-12 from-control" style="text-align: center;">
                        <p><b>or sign up with:</b></p>
                      </div>
                      <div class="col-12 from-control my-3" style="text-align: center;">
                        <a class="btn btn-info btn-floating mx-1"><i class="icon-facebook"></i></a>
                        <?php
                        
	                        if (!isset($_SESSION['uid'])) {

                            echo $google_login_button ;
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                </form>  
              </div> 
            </div>
          </div>
        </div>
      </div>  
    </div>
  

  

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script>
                    
      window.setTimeout(function() {
        $("#login_error").fadeTo(500, 0).slideUp(500, function(){
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
  </body>
</html>