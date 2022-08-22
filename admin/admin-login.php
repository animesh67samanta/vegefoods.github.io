<?php
	session_start();
	include("config.php");
	
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['pass']);
		
		$sql = mysqli_query($conn, "SELECT Email,Admin_id FROM table_admin WHERE Email = '$email' AND Password = '$password' ");
		if (mysqli_num_rows($sql)>0) {
		  header("Location:admin.php");
		  $adminData = mysqli_fetch_assoc($sql);
		  $_SESSION['adminid'] = $adminData['Admin_id'];
		  // $_SESSION['admin'] = $adminData['Name'];
		  $_SESSION['status'] =  "WELCOME TO VEGEFOODS ADMIN PANEL !" ;
		  
		}
		else {
			$_SESSION['error'] = " Your Login Name or Password is invalid ";
			header("Location:admin.php");
		  
		}
	

?>
