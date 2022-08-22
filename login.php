<?php
	session_start();
	include("config.php");

	$email =  mysqli_real_escape_string($conn, $_POST['email']) ;
    $password = mysqli_real_escape_string($conn, $_POST['pass']) ;

	$check = mysqli_query($conn, "SELECT * FROM table_user WHERE Email = '$email' ");

	$emailInfo = mysqli_num_rows($check);
	
	if($emailInfo){
		
		$email_fetch = mysqli_fetch_assoc($check);
		
		$db_password = $email_fetch['Conpass'];

		$password_decode = password_verify($password, $db_password);

		if (!$password_decode) {			
			$_SESSION['status'] = "Password not match";
			header("location: ./index.php");
		}else {
			$_SESSION['status'] = "Login successfull!";
			$_SESSION['uid'] = $email_fetch['User_id']; 
			header("Location: ./dashboard.php");
			
		}

	}else {
		?>
		<script>
			alert('Email address not exist.');
		</script>
		<?php
		$_SESSION['status'] = "Enter a valid email address or Create an account";
		header("refresh:0; url=index.php");
	
	}
	



	// Old pHP code--------

	// $sql = mysqli_query($conn,"SELECT Email,User_id FROM table_user where email = '$_POST[email]' AND password ='$_POST[pass]'");
	// if (mysqli_num_rows($sql)>0) {
	// 	header("Location:dashboard.php");
	// 	$row = mysqli_fetch_array($sql);
	// 	$_SESSION['uemail'] = $row[0];
	// 	$_SESSION['uid'] = $row[1];
		
	// }
	// else {
	// 	echo "Your Login Name or Password is invalid";
	// }


?>