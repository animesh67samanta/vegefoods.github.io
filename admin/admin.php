<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Admin</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="#">Vegefoods</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="oi oi-menu"></span> Menu
		    </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <?php
              if (empty($_SESSION['adminid'])) {?>
                <li class="nav-item"><a href="admin.php" target="_blank" data-toggle="modal" data-target="#reservationModal"><b>LOGIN</b></a></li>
              <?php 
              }
              if(!empty($_SESSION['adminid'])){
                include('config.php');
                $sql = mysqli_query($conn, "SELECT * FROM table_admin WHERE admin_id = '$_SESSION[adminid]' ");
                $adminData = mysqli_fetch_assoc($sql);?>

                <li class="nav-item active"><a href="admin.php" class="nav-link"><b><?php echo $adminData['Name'];?></b></a></li>
                <li class="nav-item"><a href="product-add.php" class="nav-link">Add Product</a></p></li>
                <li class="nav-item"><a href="store.php" class="nav-link">Store</a></p></li>
                <li class="nav-item"><a href="order.php" class="nav-link">Order List</a></p></li>
                <li class="nav-item"><a href="admin-logout.php" class="nav-link">Logout</a></p></li>
              <?php 
              } 
            ?>
          </ul>
	      </div>
	    </div>
	  </nav>

	  <?php 
		  if(isset($_SESSION['error']) && $_SESSION != ''){?>
        <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert" id="error_log">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#info-fill"/></svg>
            <div class="mx-2"><?php echo $_SESSION['error']; ?> </div>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
        unset($_SESSION['error']);
      }
      
      if(isset($_SESSION['status']) && $_SESSION != ''){?>
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" id="error_log">
          <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div class="mx-2"><?php echo $_SESSION['status']; ?> </div>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php
        unset($_SESSION['status']);
      }
          
	  ?>
	  

    <section id="home-section" class="hero">
      <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
              <div class="col-md-12 ftco-animate text-center">
                <h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
                <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


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
			          <h1 class="mb-4"><b>Log In</b></h1>  
			          <form action="admin-login.php" method="POST">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="password" class="form-control" placeholder="Password" name="pass" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 form-group"></div>
                    <div class="col-md-4 form-group mt-3">
                      <input type="submit" class="btn btn-primary btn-block" value="login">
                    </div>
			              <div class="col-md-4 form-group mt-3">
			                <input type="reset" class="btn btn-danger btn-block" value="Reset">
			              </div>
			            </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>  
			   
    <script>
      window.setTimeout(function() {
				$("#error_log").fadeTo(500, 0).slideUp(500, function(){
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


