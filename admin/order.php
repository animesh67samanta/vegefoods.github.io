<?php
session_start();
if (empty($_SESSION['adminid'])) {
  header('location:admin.php');
  exit();
}
?>



<!DOCTYPE html>
<html lang="en">
  	<head>
		<title>Order List</title>
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
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
			<div class="container">
				<a class="navbar-brand" href="admin.php">Vegefoods</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="oi oi-menu"></span> Menu
				</button>
				<div class="collapse navbar-collapse" id="ftco-nav">
					<ul class="navbar-nav ml-auto">
						<?php
							if (empty($_SESSION['adminid'])) {?>

								<li class="nav-item"><a href="" target="_blank" data-toggle="modal" data-target="#reservationModal">Login</a></li>
								<?php 
							}

							if(!empty($_SESSION['adminid'])){
								include('config.php');
								$sql = mysqli_query($conn,"SELECT * FROM table_admin WHERE admin_id = '$_SESSION[adminid]'");
								$adminData = mysqli_fetch_array($sql);?>

								<li class="nav-item"><a href="" class="nav-link"><?php echo $adminData['Name'];?></a></li>
								<li class="nav-item"><a href="product-add.php" class="nav-link">Add Product</a></p></li>
								<li class="nav-item"><a href="store.php" class="nav-link">store</a></p></li>
								<li class="nav-item active"><a href="order.php" class="nav-link"><b>Order List</b></a></p></li>
								<li class="nav-item"><a href="admin-logout.php" class="nav-link">Logout</a></p></li>
								<?php 
							} 
						?>
					</ul>
				</div>
			</div>
		</nav>


  		<section class="ftco-cart">
			<div class="container">
				<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="#" class="active">ORDER LIST</a></li>					   					
    				</ul>
    			</div>
    		</div>
				<div class="row">
    			    <div class="col-md-12 ftco-animate">
    				    <div class="cart-list">
	    				    <table class="table">
						       	<thead class="thead-primary">
						          	<tr class="text-center">
										<th>Image</th>
										<th>Product name</th>
										<th>Customer Id</th>
										<th>Order Date</th>
										<th>Price</th>
										<th>Quantity(kg.)</th>
										<th>Total</th>
						      	  	</tr>
						       </thead>

						       <tbody>
			                    	<?php 
			                   	 		include('config.php');

			                      		$sql = mysqli_query($conn,"SELECT * from table_orders WHERE Order_status = '1'");
			                      		while($row = mysqli_fetch_array($sql)) {
			                      			$sql1 = mysqli_query($conn,"SELECT * FROM table_vegetable WHERE Vegetable_id = '$row[3]'");
			                      			$row1 = mysqli_fetch_array($sql1);
			                      			?>
			                  				<tr class="text-center">
												<td class="image-prod"><div class="img" style="background-image:url(<?php echo $row1[7];?>)"></div></td>
												<td class="price"><?php echo $row1[1];?></td>
												<td class="price"><?php echo $row[1];?></td>
												<td class="order-date"> <?php echo $row[2];?></td>
												<td class="price">Rs. <?php echo $row1[5];?></td>
												<td class="quantity"><?php echo $row[7];?></td>
												<td class="total">Rs. <?php echo $row1[5]*$row[7];?></td>
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
