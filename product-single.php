<?php
  session_start();

  if (!isset($_GET['pid'])) {
    header("location:index.php");
  }
  
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product</title>
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
	      <a class="navbar-brand" href="index.php">Vegefoods</a>
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
              
              <li class="nav-item"><a href="login.php" class="nav-link" target="_blank" data-toggle="modal" data-target="#reservationModal">Login</a></li>
              <?php 
              }
              if(!empty($_SESSION['uid'])){
                include('config.php');
                $sql = mysqli_query($conn, "SELECT * FROM table_user WHERE User_id = '$_SESSION[uid]' ");
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
                include 'config.php';
                $sql = mysqli_query($conn, "SELECT * FROM table_orders WHERE User_id = '$_SESSION[uid]' AND Order_status = '0' ");
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

    <section class="ftco-section">
    	<div class="container">
        <form class="from-control" action="cart.php" method="POST">
          <div class="row">
            <?php 
              include('config.php');
              $selectItem = mysqli_query($conn,"SELECT * FROM table_vegetable WHERE Vegetable_id = $_GET[pid]");
              $vegetableItem = mysqli_fetch_array($selectItem);
            ?>

            <div class="col-lg-6 col-sm-12 mb-5 ftco-animate">
              <div class="from-control"><h4 class="text-info">Product Image</4></div> 
              <a href="<?php echo $vegetableItem['Image'];?>" class="image-popup"><img src="<?php echo $vegetableItem['Image'];?>" class="img-fluid" alt=""></a>
            </div>
             
    			  <div class="col-lg-6 col-sm-12 product-details pl-md-5 ftco-animate ">
              <div class="row justify-content-center">
                <div class="col-sm-12 mb-1">
                  <h5 class=" text-info"><b>Product Name</b></h5>
                  <h3><?php echo $vegetableItem['Name'];?></h3>
                </div>
                <div class="col-sm-12 mb-1">
                  <h5 class="text-info"><b>Price Per Kg.</b></h5>  
                  <h4><span>Rs.<?php echo $vegetableItem['Price'];?></span></h5>
                </div>
                <div class="col-sm-12 mb-2">
                  <h5 class="text-info"><b>Product Size</b></h5>
                  <div class="col-sm-4 col-lg-6 form-group">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="Size" class="form-control">
                        <option <?php if($vegetableItem['Size']=="Small") { echo "selected";} ?> value="Small">Small</option>
                        <option <?php if($vegetableItem['Size']=="Medium") { echo "selected";} ?> value="Medium">Medium</option>
                        <option <?php if($vegetableItem['Size']=="Large") { echo "selected";} ?> value="Large">Large</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 mb-2 form-group">
                  <h5 class="text-info"><b>Product Quantity</b></h5>
                  <div class="col-sm-3 col-lg-4 ">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="qut" id="quantity" class="form-control" style="text-transform: capitalize;" onchange="total()">
                        <option value="1" selected="">1 kg.</option>
                        <option value="2">2 kg.</option>       
                        <option value="3">3 kg.</option>       
                        <option value="4">4 kg.</option>       
                        <option value="5">5 kg.</option>       
                        <option value="6">6 kg.</option>       
                        <option value="7">7 kg.</option>       
                        <option value="8">8 kg.</option>       
                        <option value="9">9 kg.</option>       
                        <option value="10">10 kg. </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-6">
                    <p>Availabel : <?php echo $vegetableItem['Quantity']; ?>Kg. </p>
                  </div>
                </div>
                  
                <div class="col-sm-12 mb-2">
                  <div class="row">
                    <h5 class="text-info"><b><span>Total Price:</span></b></h5>
                    <h5 class="mx-3">Rs. <span id="total_price"><?php echo $vegetableItem['Price'];?></span></h5>
                  </div>
                </div>
                  
                <input type="hidden" name="pid" value="<?php echo $vegetableItem['Vegetable_id'];?>">
                <?php
                  if (!empty($_SESSION['uid'])) {?>
                    <p><input type="submit" name="cart" class="btn btn-success py-3 px-5" value="Add to Cart"></p>
                    <?php
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 py-5 wrap-about pb-md-5 ftco-animate">
              <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                  <span class="subheading"><h4 class="text-info"><u><b>Product Description</b></u></h4></span>
                </div>
              </div>
              <div class="justify-content-center mx-auto">
                <p class="form-group"><b><?php echo $vegetableItem['Description'];?></b></p></div>
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
      function total(){
        var quantity = document.getElementById("quantity").value;
        var price = <?php echo $vegetableItem['Price'];?>;
        var total = quantity * price ;
        document.getElementById("total_price").innerHTML = total;
      }
              
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