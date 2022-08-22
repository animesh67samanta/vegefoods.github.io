<?php
session_start();

  if (empty($_SESSION['adminid'])) {
    header('location:admin.php');
    exit();
  }
  
  if (empty($_GET['id'])) {
    header('location:store.php');
  }

  // function image_upload($image){
  //   $imageName = $image['name'];
  //   $imagePath = $image['tmp_name'];
  //   $imageError = $image['error'];
  //   $imagename_check = explode(".", $imageName);
  //   $filename_ext = strtolower(end($imagename_check));
  //   $validfile_check_type = array('jpg','jpeg','svg'); 

  //   if (in_array($filename_ext, $validfile_check_type)) {
  //     if ($fileError == 0) {
  //       $imageFolder = 'images/upload/' . $imageName;
  //       move_uploaded_file($imagePath, $imageFolder);
  //     }else{
  //       echo "This File Not supported" .$imageName;
  //       header("location:product-update.php?id=$id");
  //     }
  //   }else{
  //     echo 'Only .jpg, .jpeg, .svg Type File Upload You Can';
  //     header("location:product-update.php?id=$id");
  //   }
  // }


  if (isset($_POST['update'])) {
    include 'config.php';

    $id =  mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['pname']);
    $upperName = strtoupper($name);

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $quantity = mysqli_real_escape_string($conn, $_POST['weight']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $uniq = mysqli_real_escape_string($conn, $_POST['ucode']);

    $desc = mysqli_real_escape_string($conn, $_POST['pinfo']);
    $fileOld = $_POST['old_photo'];

    $file = $_FILES['photo'];
    $fileName = random_int(01,9999) .$file['name'];
    $filePath = $file['tmp_name'];
    $fileError = $file['error'];
  
    if (!file_exists("images/upload/" . $fileName)) {

      $filename_check = explode(".", $fileName);
      $filename_ext = strtolower(end($filename_check));
      $validfile_check_type = array('jpg','jpeg','png'); 

      if (in_array($filename_ext, $validfile_check_type)) {
      
        if ($fileError == 0) {
          
          $loadFile = "images/upload/" . $fileName;
          move_uploaded_file($filePath, $loadFile);

          unlink($fileOld);

          $updateQuery = "UPDATE table_vegetable SET Vegetable_id=$id, Name='$upperName', Type='$type', Size='$size', Quantity='$quantity', Price='$price', Unique_code='$uniq', Image='$loadFile', Description='$desc' WHERE Vegetable_id=$id ";
          $update = mysqli_query($conn, $updateQuery);
          
          if($update){
            $_SESSION['status'] = " Product Update Successfully. ";
            header("location:store.php");
          }
        }else {
          echo 'Image not supported' . $fileName;
          header("location:product-update.php");
        }
        
      }else {
        echo 'Only .jpg, .jpeg, .png Type File Upload You Can' . $fileName;
        header("location:product-update.php");
      }
    
    }else{
      echo 'Image already Exists'. $fileName;
      header("location:product-update.php");

    }if (empty($_POST['photo'])) {
      $updateQuery = "UPDATE table_vegetable SET Vegetable_id=$id, Name='$upperName', Type='$type', Size='$size', Quantity='$quantity', Price='$price', Unique_code='$uniq', Description='$desc' WHERE Vegetable_id=$id ";
      $update = mysqli_query($conn, $updateQuery);
            
      if($update){
        $_SESSION['status'] = " Product Update Successfully. ";
        header("location:store.php");
      }

    }else{
      $_SESSION['status'] = " Product Update Failed.";
      header("location:store.php");
    }
    
  }

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Update Product</title>
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
    <?php
      if (isset($_GET['id'])) {
        include 'config.php';
        $vid = $_GET['id'];
    
        $selectQuery = "SELECT * FROM table_vegetable WHERE Vegetable_id = '$vid' ";
    
        $select = mysqli_query($conn, $selectQuery);
    
        $getdata = mysqli_fetch_assoc($select);
      }
    ?>
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
                <li class="nav-item"><a href="admin.php" target="_blank" data-toggle="modal" data-target="#reservationModal">Login</a></li>
                <?php 
              }
              if (!empty($_SESSION['adminid'])){
                include('config.php');
                $sql = mysqli_query($conn, "SELECT * FROM table_admin WHERE admin_id = '$_SESSION[adminid]'");
                $adminData = mysqli_fetch_array($sql);?>
                <li class="nav-item"><a href="admin.php" class="nav-link"><?php echo $adminData['Name'];?></a></li>
                <li class="nav-item active"><a class="nav-link"><b>UPDATE PRODUCT</b></a></p></li>
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
     
    <section class="ftco-section img" style="background-image: url(images/close-up-color-flora-1337585.jpg);">
      <div class="container">
        <div class="row justify-content-end">
          <div class="col-md-8 heading-section ftco-animate deal-of-the-day ftco-animate">     
            <h2 class="text-info">UPDATE PRODUCT</h2>
            <form action="product-update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="row">
                <div class="col-md-12 form-group">
                  <h5 class="text-warning"><b>Product Name</b></h5>                  
                  <input type="text" class="form-control" value="<?php echo $getdata['Name']; ?>" placeholder="Enter Product Name" name="pname" onkeydown="return /[A-z a-z]/i.test(event.key)" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <h5 class="text-warning"><b>Product Type</b></h5>
                  <select name="type" class="form-control">
                    <option <?php if($getdata['Type']=="Vegetable") { echo "selected";} ?> value="Vegetable">Vegetable</option>
                    <option <?php if($getdata['Type']=="Fruit") { echo "selected";} ?> value="Fruit">Fruit</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <h5 class="text-warning"><b>Product size</b></h5>
                  <select name="size" class="form-control">
                    <option <?php if($getdata['Size']=="Small") { echo "selected";} ?> value="Small">Small</option>
                    <option <?php if($getdata['Size']=="Medium") { echo "selected";} ?> value="Medium">Medium</option>
                    <option <?php if($getdata['Size']=="Large") { echo "selected";} ?> value="Large">Large</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <h5 class="text-warning"><b>Product Weight</b></h5>
                  <input type="text" class="form-control" value="<?php echo $getdata['Quantity']; ?>" placeholder="How Many Kg." name="weight" required>
                </div>
                <div class="col-md-4 form-group">
                  <h5 class="text-warning"><b>Product Price</b></h5>
                  <input type="text" class="form-control" value="<?php echo $getdata['Price']; ?>" placeholder="Price Per Kg." name="price" required>
                </div>
                <div class="col-md-4 form-group">
                  <h5 class="text-warning"><b>Product Unique Code</b></h5>
                  <input type="text" class="form-control" value="<?php echo $getdata['Unique_code']; ?>" name="ucode" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                 	<h5 class="text-warning"><b>Product Image</b></h5>
                  <?php
                    if ($getdata['Image']) { ?>
                      <img src="<?php echo $getdata['Image']; ?>" class="mb-2" id="image" width="100" height="100">
                      <?php
                    }
                  ?>
                  <input class="text-warning" type="file" name="photo" accept=".jpg,.jpeg,.svg," id=myFile value="">
                  <input type="hidden" name="old_photo" value="<?php echo $getdata['Image']; ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 form-group">
                  <h5 class="text-warning"><b>Product Description</b></h5>
                  <textarea cols="50" rows="5" name="pinfo"><?php echo $getdata['Description']; ?></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2 form-group"></div>
                <div class="col-md-4 form-group mt-3">
                  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                  <input type="submit" class="btn btn-success btn-block" value="Update Product" name="update">
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

    <footer class="ftco-footer ftco-section" style="padding: 2em 0;">
      <div class="container">
       <div class="row mb-5">
          <div class="col-md-8">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Vegefoods</h2>
            </div>
          </div>
          <div class="col-md">
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
      </div>
    </footer>






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