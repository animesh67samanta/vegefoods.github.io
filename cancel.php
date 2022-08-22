<?php
	session_start();
	include("config.php");

	if (!empty($_GET['oid'])) {
		$orderItem = mysqli_query($conn,"SELECT * FROM table_orders WHERE Order_id = '$_GET[oid]'");
		$orderItemArr = mysqli_fetch_array($orderItem);

		if($orderItemArr['Order_status'] == 0){
			$removeCart = mysqli_query($conn,"DELETE FROM table_orders WHERE Order_id = '$_GET[oid]'");
			$updateItem = mysqli_query($conn,"UPDATE table_vegetable SET Quantity = Quantity + '$orderItemArr[Quantity]' WHERE Vegetable_id = '$orderItemArr[Vegetable_id]' ");
			if ($removeCart) {
				$_SESSION['delete'] = "Cart item delete successfully.";
				header("location:cart.php");
				
			}
		}

		if($orderItemArr['Order_status'] == 1){
			$removeOrder = mysqli_query($conn,"DELETE FROM table_orders WHERE Order_id = '$_GET[oid]'");
			$updateItem = mysqli_query($conn,"UPDATE table_vegetable SET Quantity = Quantity + '$orderItemArr[Quantity]' WHERE Vegetable_id = '$orderItemArr[Vegetable_id]' ");
			if ($removeOrder) {
				$_SESSION['delete'] = "Canceled Order.";
				header("location:cart.php");
				
			}
		}
	}
	

	
	
	if (!empty($_GET['pid']) && ($_SESSION['uid'])) {
		// $userId = $_GET['uid'];
		// $productId = $_GET['pid'];
		$wishlist = mysqli_query($conn, "DELETE FROM `table_wishlist` WHERE User_id = '$_SESSION[uid]' AND Vegetable_id = '$_GET[pid]' ");
		if($wishlist){
			$_SESSION['delete'] = "Removed item from wishlist.";
			header("location:wishlist.php"); 
		}

	}
?>