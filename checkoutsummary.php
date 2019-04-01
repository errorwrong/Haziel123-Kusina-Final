<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kusina Online</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap-4.0.0-beta.3-dist/jss/bootstrap.js">
		<script src="bootstrap-4.0.0-beta.3-dist/jquery/jquery.min.js"></script>
		<script src="bootstrap-4.0.0-beta.3-dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body><br/>
		
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="order_reports.php">Back</a></li>
		<li class="breadcrumb-item active" aria-current="page"> </li>
		
	</ol>
	</nav>
			<form class="form-inline my-2 my-lg-0">
				<div id="profile">
					<b><i><?php if(isset($_SESSION['id'])){
									echo ($_SESSION['username']);
								}
								else{
								header("Location: login.php");
							}?></i></b>
				</div>
				
			</form>
		</nav>
		<div class="row">
			<div class="col-8">
				<h1><b>Orders</b></h1><br>
				
				<form>
				<?php
							$order_id = $_GET['order'];
							$customer_id = $_GET['no'];
							
							
							?>
							
							Order ID : <b><?php echo $order_id; ?></b><br>
							<?php
											include_once 'logdb.php';
											$id = $_SESSION['id'];
											
											$no = $_GET['no'];
											$sql = "SELECT * 
													FROM customer AS p 
													JOIN login AS r 
													WHERE p.id = $id  
													AND r.id = $id AND customer_id=$no;";
											$result = mysqli_query($conn, $sql);
											$resultCheck = mysqli_num_rows($result);
											
											if ($resultCheck > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
														
										?>
							
							Customer Name : <b><?php echo $row["first_name"]; ?></b>
										
										
										
										
										<?php		}
							
										}
										?>
										<button class="btn btn-light" style="float: right"><a href="order_reports.php"> Finish </a></button>
										<button class="btn btn-light" style="float:right;margin-right: 10px"><a href="orders.php?order=<?php echo $order_id; ?>&no=<?php echo $customer_id; ?>">Edit Orders</a></button><br><br>
										
			<div class="table-responsive">		
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Menu ID</th>
				  <th scope="col">Description</th>
				  <th scope="col">Quantity</th>
				  <th scope="col">Price</th>
				  <th scope="col">Subtotal</th>
				  
				</tr>
			  </thead>
			  <tbody>
							<?php
							include_once 'logdb.php';
							$id = $_SESSION['id'];
							$order_id = $_GET["order"];
							$sql = "SELECT * FROM order_item, menu, customer_order 
									WHERE order_item.menu_id = menu.menu_id 
									AND customer_order.order_id = order_item.order_id 
									AND customer_order.order_id = '$order_id';";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$total=0;
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
								$savequantity = $row["quantity"];
								$saveprice = $row["price"];	
								$quantityprice = $savequantity*$saveprice;
								$order_id = $row["order_id"];
								$total += $quantityprice;


								
							?>



				<tr>
					  <td><?php echo $row["menu_id"];?></td>
					 
					  <td>&#8369; <?php echo $row["price"];?></td>
					   <td><?php echo $row["description"];?></td>
				  <td><center><?php echo $row["quantity"];?></center></td>
				  <td>&#8369; <?php echo $quantityprice;?>.00</td>
				  
				</tr>
				<?php		}
							
							}
							?>
			  </tbody>
			</table>
			</div>
			</div>
			<div class="col-4"></br></br></br></br></br></br>
				<div class="container">
					<div align="right">
					<b><h1>Total Sales</h1><h1>&#8369; <?php echo $total;?>.00</h1></b>
					</div>
				</div>
			</div>
		
	</form>
	</div>
</body>
</html>