<?php
	session_start();
	include_once 'dbsecret.php';
	$mysqli = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName) or die(mysqli($mysqli));
	
	$menu_id = 0;
	$hide_id = 0;
	$update = false;
	$update3 = false;
	$menu_id = '';
	$menu_name = '';
	$price = '';
	$description = '';
	$unit = '';
	$order_id = '';
	$quantity = '';
	$hide_id = '';
	
	if (isset($_POST['add'])) {
		$id = $_SESSION['id'];
		$menu_id = $_POST['menu_id'];
		$menu_name = $_POST['menu_name'];
		$price = $_POST['price'];
		$menu_description = $_POST['description'];
		$unit = $_POST['unit'];
		
		$mysqli->query("INSERT INTO menu (id, menu_id, menu_name, price, description, unit) VALUES('$id', '$menu_id', '$menu_name', '$price', '$description', '$unit')") or die($mysqli->error);
		header("location: menu.php");
	}
	if (isset($_GET['delete_id'])) {
		
		$menu_id = $_GET['delete_id'];
		$sql = "DELETE FROM menu WHERE menu_id='".$menu_id."'";
		$mysqli->query($sql) or die($mysqli->error());
		header("location: menu.php");
	}
	if (isset($_GET['editmenu'])) {
		$menu_id = $_GET['editmenu'];
		$update = true;
		$sql = "SELECT * FROM menu WHERE menu_id='".$menu_id."'";
		$result = $mysqli->query($sql) or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$menu_id = $row['menu_id'];
			$menu_name = $row['menu_name'];
			$price = $row['price'];
			$menu_description = $row['description'];
			$unit = $row['unit'];
		}
	}
	if (isset($_POST['updatemenu'])) {
		$menu_id = $_POST['menu_id'];
		$menu_name = $_POST['menu_name'];
		$price = $_POST['price'];
		$menu_description = $_POST['description'];
		$unit = $_POST['unit'];

		$mysqli->query("UPDATE menu SET menu_id='$menu_id', menu_name='$menu_name', price='$price', description='$description', unit='$unit' WHERE menu_id='".$menu_id."'") or die($mysqli->error);
		header("location: menu.php");
	}
	if (isset($_POST['item'])) {
		$order_id = $_POST['order_id'];
		$menu_id = $_POST['menu_id'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		
		$mysqli->query("INSERT INTO order_items (order_id, menu_id, price, quantity) VALUES('$order_id', '$menu_id', '$price', '$quantity')") or die($mysqli->error);
					
		header("location: order.php?order=$order_id");
	}
	if (isset($_GET['delete_order'])) {
		
		$hide_id = $_GET['delete_order'];
		$sql = "DELETE FROM order_items WHERE hide_id='".$hide_id."'";
		$mysqli->query($sql) or die($mysqli->error());
		header("location: order.php");
	}
	if (isset($_GET['edititems'])) {
		$hide_id = $_GET['edititems'];
		$update3 = true;
		$sql = "SELECT * FROM order_items WHERE hide_id=$hide_id";
		$result = $mysqli->query($sql) or die($mysqli->error());
		if (@count($result)==1) {
			$row = $result->fetch_array();
			$hide_id = $row['hide_id'];
			$order_id = $row['order_id'];
			$menu_id = $row['menu_id'];
			$price = $row['price'];
			$quantity = $row['quantity'];
		}
	}
	if (isset($_POST['update_items'])) {
		$hide_id = $_POST['hide_id'];
		$menu_id = $_POST['menu_id'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];

		$mysqli->query("UPDATE order_items SET hide_id='$hide_id', menu_id='$menu_id', price='$price', quantity='$quantity' WHERE hide_id=$hide_id") or die($mysqli->error);
		header("location: order.php");
	}
		
?>