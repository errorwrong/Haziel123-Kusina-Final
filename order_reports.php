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
			
	</head>
<body><br/><div class="container">
	<form action="order_reports.php" method="POST">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item active" aria-current="page">Reports</li>
	</ol>
</nav>
			</div>
			<form class="form-inline my-4 my-lg-4">
				<div id="profile">
					<b><i><?php if(isset($_SESSION['id'])){
									
								}
								else{
								header("Location: login.php");
							}?></i></b>
				</div>
			</form>
		</nav>
		
		<div class="container">
		<div class="row" style="background-color:#2F4F4F">
			<div class="col-8" style="border-style: solid;color: black;text-align: center">
		
				<h1 style=" font-family: AR DELANEY, serif;" class="display-1 font-weight-bold">REPORTS</h1>
				</div>
				<div style="background-image: url('images/bgg.jpg');background-size: contain; height: 200px;background-repeat: no-repeat;">
				
				
		</div>
		</div>
		<br/>
	
		<div class="row">
			<div class="col-8">
			<form action = "search.php" method="GET" >
				<div class="row">
					<div class="col-1">
						<p>FROM: </p>
					</div>
					<div class="col-3">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="form-control" name="startdate" style="width: 200px;" required>
					</div>
					<div class="col-1">
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TO: </p>
					</div>
					<div class="col-3">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="datetime-local" class="form-control" name="enddate" style="width: 200px;" required>
					</div>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger"> Submit</button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-light"><a href="order_reports.php">Reset</a></button>
				</div>
			</form>
			<form><br>
				<center><button type="submit" name="cancel" class="btn btn-light"><a href="addorder.php">Add Menu Orders</a></button>
					<br/><br/>
		
			<div class="table-responsive">
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Order ID</th>
					  <th scope="col">Customer ID</th>
					  <th scope="col">Date</th>
					  <th scope="col">Amount</th>
					  <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
								<?php
								include_once 'logdb.php';
								$id = $_SESSION['id'];
									$from = "2019-03-19";
									$to = "2019-03-19";

									$sql = "SELECT order_id, customer_id, timestamp, SUM(price*quantity) FROM customer_order full inner join order_item USING(order_id)  GROUP by order_id desc ;";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									if ($resultCheck > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
										$order_id = $row["order_id"];
										$sum = $row["SUM(price*quantity)"];
										$timestamp = $row["timestamp"];
										$customer_id = $row["customer_id"];
								?>

					<tr>
							<td><?php echo $order_id?></td>
							<td><?php echo $customer_id;?></td>
							<td><?php echo $timestamp;?></td>

					  <td>&#8369; <?php echo $sum;?></td>
					  <td> <button class="btn btn-light btn-sm"><a href="viewcheckoutsummary.php?order=<?php echo $order_id; ?>&no=<?php echo $customer_id; ?>">View</a></button></td>
					  
					</tr>
					<?php		
							}
								}
								?>
				  </tbody>
				</table>
			</div>
			</form>
			</div>
			<div class="col-4">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
							<th>STATUS<th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php
										$con = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
										$sql = "SELECT SUM(price * quantity) AS `total` FROM order_item";
										$query_sum = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query_sum)):?>
									<div class="dropdown">
										<?php echo "&#8369; " .$row['total']. " Total Sales";?>
										<div class="dropdown-content">	
											<a href="order.php?order=''&hide=''">View Sales</a>
										</div>
									</div>
									<?php endwhile;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										$con = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
										$sql = "SELECT COUNT(*) AS `count` FROM menu";
										$query_menu = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query_menu)):?>
									<div class="dropdown">
										<?php echo $row['count']. " Menus";?>
										<div class="dropdown-content">	
											<a href="menu.php">View Menu</a>
										</div>
									</div>
										
									<?php endwhile;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										$con = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
										$sql = "SELECT COUNT(*) AS `count` FROM customer";
										$query_cus = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query_cus)):?>
									<div class="dropdown">
										<?php echo $row['count']. " Customers";?>
										<div class="dropdown-content">	
											<a href="customer.php">View Customers</a>
										</div>
									</div>
										
									<?php endwhile;?>
								</td>
							</tr>
							<tr>
								<td>
									<?php
										$con = new mysqli('localhost', 'root', '', 'kusina online') or die(mysqli($mysqli));
										$sql = "SELECT COUNT(*) AS `count` FROM order_item";
										$query_item = mysqli_query($con,$sql);
									?>
									<?php while($row = mysqli_fetch_array($query_item)):?>
									<div class="dropdown">
										<?php echo $row['count']. " Orders";?>
										<div class="dropdown-content">	
											<a href="customer.php">View Orders</a>
										</div>
									</div>
										
									<?php endwhile;?>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<br/><br/>
	<br/><br/><br/><br/><br/><br/>
</body>  
</html>	