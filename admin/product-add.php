<?php
  session_start();

  if (empty($_SESSION['adminid'])) {
    header('location:admin.php');
    exit();
  }

  if (isset($_POST['save'])) {
    include 'config.php';
    $productNameErr = $productTypeErr = $productSizeErr = $productWeightErr = $productPriceErr = $productUniqErr = "";
    // $name = mysqli_real_escape_string($conn, $_POST['pname']);
    if (!empty($_POST["pname"])) {
      
      $productName = test_input($_POST["pname"]);
      if (!preg_match("/^[A-Z-' ]*$/",$productName)) {
        $productNameErr = "Only Capital Letter And White Space Allowed";
      }
    }

    if (!empty($_POST["type"])) {
      $type = mysqli_real_escape_string($conn, $_POST['type']);
    }else {
      $productTypeErr = "Select an option.";
    }

    if (!empty($_POST["size"])) {
      $size = mysqli_real_escape_string($conn, $_POST['size']);
    }else {
      $productSizeErr = "Select an option,";
    }
    // if (!empty($_POST["weight"])) {
      
    //   $quantity = test_input($_POST["weight"]);
    //   if(!preg_match("/^[0-9]/",$quantity)) {
    //     $productWeightErr = "Only valid Number Allowed";
    //   }
    // }
    $quantity = test_input($_POST["weight"]);

    // if (!empty($_POST["price"])) {
      
    //   $price = test_input($_POST["price"]);
    //   if(!preg_match("/^[0-9]/",$price)) {
    //     $productPriceErr = "Only valid Number Allowed";
    //   }
    // }
    $price = test_input($_POST["price"]);
    
    // if (!empty($_POST["ucode"])) {
      
    //   $uniq = test_input($_POST["ucode"]);
    //   if(!preg_match("/^[0-9A-Z]/",$uniq)) {
    //     $productUniqErr = "Only Number And Capital Words are Allowed";
    //   }
    // }
    $uniq = test_input($_POST["ucode"]);

    
    $desc = mysqli_real_escape_string($conn, $_POST['pinfo']);
    $file = $_FILES['photo'];

    $fileName = random_int(01,999) .$file['name'];
    $filePath = $file['tmp_name'];
    $fileError = $file['error'];

    $filename_check = explode(".", $fileName);
    $filename_ext = strtolower(end($filename_check));
    // print_r($filename_lower);
    $validfile_check_type = array('jpg','jpeg','png'); 

    // if (($productNameErr == 0) && ($productTypeErr == 0) && ($productSizeErr == 0) && ($productWeightErr == 0) && ($productPriceErr == 0) && ($productUniqErr == 0)) {
      
      if (in_array($filename_ext, $validfile_check_type)) {
        
        if ($fileError == 0) {
          
          $destiFile = 'images/upload/' . $fileName; 
          move_uploaded_file($filePath, $destiFile);
          
          $insertQuery = "INSERT INTO table_vegetable(Name, Type, Size, Quantity, Price, Unique_code, Image, Description) 
                        VALUES ('$productName','$type','$size','$quantity','$price','$uniq','$destiFile','$desc')";
        
          $inserted = mysqli_query($conn, $insertQuery);
        
          if($inserted){
            $_SESSION['status'] = " Product Insert Successfully. ";
            header('location:store.php');
          }else{
            echo 'Product Insert Failed';
          }
        
        }else{
          echo "This File Not Supported" .$fileName;
        }
      
      }else {
        echo 'Only .jpg, .jpeg, .png Type File Upload You Can';
     }

    // }

  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Product</title>
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
  </head>
  <body>
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
            		$sql = mysqli_query($conn, "SELECT * FROM table_admin WHERE admin_id = '$_SESSION[adminid]'");
            		$adminData = mysqli_fetch_array($sql);?>
    	      		<li class="nav-item"><a href="" class="nav-link"><?php echo $adminData['Name'];?></a></li>
                <li class="nav-item active"><a href="product-add.php" class="nav-link"><b>Add PRODUCT</b></a></p></li>
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
     
    <section class="ftco-section img" style="background-image: url(images/bg_1.jpg);">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 mx-5 heading-section ftco-animate deal-of-the-day ftco-animate" style="box-shadow: 0px 0px 15px 0px #00c9ff; border: 20px double transparent; background-color: #314e5e73;">     
            <h2 class="text-success">ADD VEGETABLE & FRUIT PRODUCT</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-12 form-group">  
                  <h5 class="text-warning"><b>Product Name</b></h5>                
                  <input type="text" class="form-control"  placeholder="Enter Product Name" name="pname" onkeydown="return /[A-Z ]/i.test(event.key)" required>
                  <?php
                    if (!empty($productNameErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productNameErr;?></span>
                      <?php
                    }
                  ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <h5 class="text-warning"><b>Product Type</b></h5>
                  <select name="type" class="form-control" required>
                    <option value="0">Select Product type</option>
                    <option value="Vegetable">Vegetable</option>
                    <option value="Fruit">Fruit</option>
		              </select>
                  <?php
                    if (!empty($productTypeErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productTypeErr;?></span>
                      <?php
                    }
                  ?>
                </div>

                <div class="col-md-6 form-group">
                  <h5 class="text-warning"><b>Product size</b></h5>
                  <select name="size" class="form-control" required>
                    <option value="0">Select Product Size</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                  </select>
                  <?php
                    if (!empty($productSizeErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productSizeErr;?></span>
                      <?php
                    }
                  ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                 	<h5 class="text-warning"><b>Product Weight</b></h5>
                 	<input type="text" class="form-control" placeholder="How Many Kg." name="weight" required>
                  <?php
                    if (!empty($productWeightErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productWeightErr;?></span>
                      <?php
                    }
                  ?>
                </div>
                <div class="col-md-6 form-group">
                 	<h5 class="text-warning"><b>Product Price</b></h5>
                 	<input type="text" class="form-control" placeholder="Price Per Kg." name="price" required>
                   <?php
                    if (!empty($productPriceErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productPriceErr;?></span>
                      <?php
                    }
                  ?>
                </div>
                <div class="col-md-6 form-group">
                 	<h5 class="text-warning"><b> Unique Code</b></h5>
                 	<input type="text" class="form-control" placeholder="Enter unique id" name="ucode" required>
                  <?php
                    if (!empty($productUniqErr)) {  ?>
                      <span class="text-warning" for="fname" role="alert"><?php echo $productUniqErr;?></span>
                      <?php
                    }
                  ?>
                </div>
              
                <div class="col-md-6 mx-auto form-group">
                 	<h5 class="text-warning"><b>Add Product Image</b></h5>
                 	<!-- <input class="text-warning" type="file" name="photo" value="" id="myFile" required> -->
                  <input type="file" class="custom-file-input" id="customFile" name="photo" required>
                  <label class="custom-file-label" style="top: 40px; right: 25px; left: 20px; color: #3b7bbd;" for="customFile">Choose file</label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <h5 class="text-warning"><b>Product Description</b></h5>
                  <textarea cols="55" rows="5" name="pinfo"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2 form-group"></div>
                <div class="col-md-4 form-group mt-3">
                  <input type="submit" class="btn btn-success btn-block" value="Add Product" name="save">
                </div>
                <div class="col-md-4 form-group mt-3">
                  <a href="store.php" class="btn btn-danger btn-block">Back</a>
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