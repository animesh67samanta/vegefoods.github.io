<?php
  session_start();
  $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $phoneErr = $pinErr = $successInfo = "";

  if (!empty($_SESSION['uid'])) {
    header('location:dashboard.php');
    exit();
  }
    
  if (isset($_POST['sign'])) {
    include 'config.php';

    if (!empty($_POST["fname"])) {
     
      $firstName = test_input($_POST["fname"]);
      // check if first name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName)) {
        $firstNameErr = "Only letters and white space allowed";
       
      }
    }

    if (!empty($_POST["lname"])) {
     
      $lastName = test_input($_POST["lname"]);
      // check if last name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) {
        $lastNameErr = "Only letters and white space allowed";
        
      }
    }

    if (!empty($_POST["email"])) {
      
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";  
                  
      }
    }

    if (!empty($_POST["phone"])) {

      $phone = test_input($_POST["phone"]);
      // check if number only 10 digits
      if (!preg_match("/^[0-9]{10}$/",$phone)) {
        $phoneErr = "Only 10 digits number allowed";
       
      }
    }

    if (!empty($_POST["pincode"])) {
      
      $pinCode = test_input($_POST["pincode"]);
      if (!preg_match("/^[0-9]*$/",$pinCode)) {
        $pinErr = "Only 8 digits number allowed";
        
      }
    }

    $password = test_input($_POST['npass']);
    $conpass = test_input($_POST['cpass']);
    $address = test_input($_POST['add']);

    // Password hashing
    $hashPass = password_hash($password, PASSWORD_BCRYPT);
    $hashCon = password_hash($conpass, PASSWORD_BCRYPT);
      
    $check = mysqli_query($conn, "SELECT Email FROM table_user WHERE Email= '$email' ");

    $emailCheck = mysqli_num_rows($check);
    

    if (($firstNameErr == "") && ($lastNameErr == "") && ($emailErr == "") &&  ($phoneErr == "") && ($pinErr == "")) {
   
      if($emailCheck > 0) {

        $emailErr = "This email address already exist";
        
      }else {
        
        if($password === $conpass){
   
          $insert = mysqli_query($conn, "INSERT INTO table_user(First_Name,Last_Name,Email,Password,Conpass,Address,Contact,Pincode) 
          VALUES('$firstName','$lastName','$email','$hashPass','$hashCon','$address','$phone','$pinCode')");

          if ($insert) {
            $successInfo = "Sign up successfully";
            header("Location:index.php");
          }

        }else {
          
          $passwordErr = " Password not match.";
          
        }
      }
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">Vegefoods</a>
      </div>
    </nav>

      <section class="ftco-section img" style="background-image: url(images/code_coding.jpg);">
        <div class="container">
        <?php
					if(isset($_SESSION['status'])){?>
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Hi <?php echo $row[1];?>!</strong>
						<p><?php echo $_SESSION['status']; ?></p>
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						</div>
						<?php
						unset($_SESSION['status']);
					}
				?>
          <div class="row justify-content-center">
             <div class="col-md-6 heading-section" style="box-shadow: 0px 0px 15px 0px #00c9ff; background-color: #0676f01c; border: 10px double transparent;">          
                 <h2 class="mb-3" style="color: #ccff00 ;">Sign in</h2>
                <form action="signup.php" method="POST">
                  <div class="row">
                    <div class="col-md-6 form-group">                    
                      <input type="text" class="form-control rounded" id="fname" placeholder="First Name" name="fname" required>
                      <?php
                        if(!empty($firstNameErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $firstNameErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                    <div class="col-md-6 form-group">                     
                      <input type="text" class="form-control rounded" id="lname" placeholder="Last Name" name="lname" required>
                      <?php
                        if(!empty($lastNameErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $lastNameErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="email" class="form-control rounded" id="email" placeholder="Email" name="email" required>
                      <?php
                        if(!empty($emailErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $emailErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">                    
                      <input type="password" class="form-control rounded" placeholder="Enter password" name="npass" required>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-12 form-group">                     
                      <input type="password" class="form-control rounded" placeholder="Confirm password" name="cpass" required>
                      <?php
                        if(!empty($passwordErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $passwordErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                  </div>                
                <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" class="form-control rounded" id="phone" placeholder="phone" name="phone" required>
                      <?php
                        if(!empty($phoneErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $phoneErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                    <div class="col-md-6 form-group">  
                      <input type="text" class="form-control rounded" id="pin" placeholder="Pincode" name="pincode" required>
                      <?php
                        if(!empty($pinErr)){  ?>

                          <span class="text-danger" for="fname" role="alert"><?php echo $pinErr;?></span>
                          <?php
                        }
                      ?>
                    </div>
                  </div> 
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <textarea class="form-control rounded" placeholder="Address" name="add" cols="20" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 form-group"></div>
                    <div class="col-md-4 form-group mt-3">
                      <input type="submit" class="btn btn-info btn-block" value="Sign Up"  name="sign">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                      <a href="index.php" class="btn btn-danger btn-block">Back</a>
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