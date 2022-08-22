<?php
  session_start();

  if (empty($_SESSION['uid'])) {

    header('location:index.php');
    exit();
  }



  if(isset($_POST['save'])) {
    include("config.php");

    $id =  mysqli_real_escape_string($conn, $_POST['id']);
    $firstName =  mysqli_real_escape_string($conn, $_POST['fname']);
    $lastName =  mysqli_real_escape_string($conn, $_POST['lname']);
    $address =  mysqli_real_escape_string($conn, $_POST['add']);
    $pin =  mysqli_real_escape_string($conn, $_POST['pincode']);
    $phone =  mysqli_real_escape_string($conn, $_POST['phone']);

    $sql = mysqli_query($conn,"UPDATE table_user SET User_id= $id, First_Name='$firstName',Last_Name='$lastName',Address='$address',Pincode='$pin',Contact='$phone' WHERE User_id = '$id'");

    echo "Successfully update account";
    header("location:dashboard.php");
   
  }


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Account</title>
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
            <li class="nav-item"><a href="shop.php" class="nav-link">Shop</a></li>
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
	            include 'config.php';
	            $sql = mysqli_query($conn,"SELECT * FROM table_orders WHERE User_id = '$_SESSION[uid]' and Order_status = '0'");
	          ?>

	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo mysqli_num_rows($sql);?>]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

		<section class="ftco-section img" style="background-image: url(images/carrots.jpg);">
		  <div class="container">
		    <div class="row justify-content-center">
		      <div class="col-md-6 heading-section" style="box-shadow: 0px 0px 15px 0px #f2ff00; background-color: #d9565640; border: 10px double transparent;">          
		        <h2 class="mb-3">Update Profile</h2>
		        <form action="user-edit.php" method="POST">
		          <div class="row">
						    <?php
					        include('config.php');
								    $sql = mysqli_query($conn, "SELECT * FROM table_user WHERE `User_id` = '$_SESSION[uid]' ");
								    $userData = mysqli_fetch_assoc($sql);
								?>
		            <div class="col-md-6 form-group">
		              <label class="text-info"><b>First Name</b></label>                    
		              <input type="text" class="form-control" placeholder="Enter First Name" value="<?php echo $userData['First_Name']; ?>" name="fname">
		            </div>
		            <div class="col-md-6 form-group">   
		              <label class="text-info"><b>Last Name</b></label>                  
		              <input type="text" class="form-control" value="<?php echo $userData['Last_Name'];?>" placeholder="Enter Last Name" name="lname">
		            </div>
		          </div>
		                 
		          <div class="row">
		            <div class="col-md-6 form-group">
		              <label class="text-info"><b>Phone</b></label>
		              <input type="text" class="form-control" value="<?php echo $userData['Contact'];?>" placeholder="Enter Phone Number" name="phone">
		            </div>
		            <div class="col-md-6 form-group">  
		              <label class="text-info"><b>Pincode</b></label>
		              <input type="text" class="form-control" value="<?php echo $userData['Pincode'];?>" placeholder="Enter Pincode" name="pincode">
		            </div>
		          </div> 
		          <div class="row">
		            <div class="col-md-12 form-group">
		              <label class="text-info"><b>Address</b></label>
		              <textarea class="form-control" name="add" placeholder="Enter Your Address" cols="20" rows="3"><?php echo $userData['Address'];?></textarea>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-2 form-group"></div>
		            <div class="col-md-4 form-group mt-3">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		              <input type="submit" class="btn btn-info btn-block" value="update"  name="save">
		            </div>
		            <div class="col-md-4 form-group mt-3">
		              <a href="dashboard.php" class="btn btn-danger btn-block">Back</a>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>          
		  </div>
		</section>


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