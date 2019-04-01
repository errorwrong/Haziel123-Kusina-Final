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
		<form action="orders.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="order_reports.php">Back</a></li>
		<li class="breadcrumb-item active" aria-current="page"> </li>
		
	</ol>
	</nav>
 </form>
 
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
		<div class="container" style="width: 450px">
			<form action = "addorder.inc.php" method="POST">
				<br/><center><h1><b>Customer Orders</b></h1></center><br/><br>
				<label><b>Order ID</b></label>
				<input type="text" style="width: 500px;" class="form-control" name="order_id" value="" placeholder="order id" required>
				<label for="inputName" ><b>Customer</b></label>
				  <div class="row">
					<div class="col-6">					
						<select class="form-control" style="width: 500px;" name ="customer_id" required>
							<option value="" readonly>Select Customer Name</option>
						<?php
							include_once 'logdb.php';
							$id = $_SESSION['id'];
							$sql = "SELECT * 
									FROM customer AS p 
									JOIN login AS r 
									WHERE p.id = $id  
									AND r.id = $id;";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							
							if ($resultCheck > 0) {
								while ($row = mysqli_fetch_assoc($result)) {
						?>
							
							<option value="<?php echo $row["customer_id"];?>"><?php echo $row["first_name"];?></option>
						<?php		}
			
						}
						?>
						</select>
					
				
				  <br/>				
				  
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				  <button class="btn btn-light"><a href="order_reports.php">Cancel</a></button>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
	
	
	