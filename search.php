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
									
								}
								else{
								header("Location: login.php");
							}?></i></b>
				</div>
			</form>
		</nav>
		
	<div class="container"><br/>
		<div class="container" style="center">
			<form action = "search.php" method="POST" >
				<div class="row" >
						 <p align="center">FROM: </p>
					  <input type="date" class="form-control" name="startdate" placeholder="first name" style="width: 195px;" required>
					  <p align="center">TO: </p>
					  <input type="date" class="form-control" name="enddate" placeholder="last name" style="width: 192px;" required>
									
				  <br/>			
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button class="btn btn-light"><a href="order_reports.php">Reset</a></button>
				</div>
				
			</form>
		</div>
	
		<br/>
	<form>
		<button type="submit" name="cancel" class="btn btn-light"><a href="addorder.php">Add Menu Orders</a></button>
			<br/><br/>
			<div class="table-responsive">
			
					<table class="table">
						<thead>
							<tr>
							  <th scope="col">Sales ID</th>
							  <th scope="col">Customer Name</th>
							  <th scope="col">Date and Time</th>
							  <th scope="col">Amount</th>
							  <th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
										<?php
										include_once 'logdb.php';
										$id = $_SESSION['id'];
										$startdate = $_GET['startdate'];
										$enddate = $_GET['enddate'];


											$sql = "SELECT order_id, customer_id, timestamp, SUM(price*quantity) FROM customer_order full inner join order_item USING(order_id) WHERE timestamp between '$startdate' and '$enddate' GROUP by order_id desc ;";
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
							  <td> <button class="btn btn-light"><a href="viewcheckoutsummary.php?order=<?php echo $order_id; ?>&no=<?php echo $customer_id; ?>">View</a></button></td>
							  
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
	<br/><br/><br/><br/><br/><br/>
</body>  
</html>	