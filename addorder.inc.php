<?php
	session_start();
	include_once 'logdb.php';
	$id = $_SESSION['id'];
	
	$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
	$customer_id = mysqli_real_escape_string($conn, $_POST['customer_id']);
	$sql = "INSERT INTO `customer_order` (`order_id`, `customer_id`) VALUES ('$order_id', '$customer_id');";
	mysqli_query($conn, $sql);
	
							
							header("Location: orders.php?order=$order_id&no=$customer_id");
							
							
?>