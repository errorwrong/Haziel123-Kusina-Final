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
    <li class="breadcrumb-item"><a href="home.php">Back</a></li>
    <li class="breadcrumb-item active" aria-current="page">Reports</li>
  </ol>
</nav><br/><center>
<div class="col-md-4">
			<h1><b><u>All Total</u></b></h1>
			<?php
							include_once 'logdb.php';
							$sql = "SELECT SUM(price*quantity) as `total` FROM order_item ";
							$querytotal = mysqli_query($conn,$sql);
					?>
					
					<?php while($row = mysqli_fetch_array($querytotal)):?><br><br>
					<h1><span><?php echo "&#8369;".$row['total'];?></span></h1>
			<?php endwhile; ?>
		</div>
		</div>