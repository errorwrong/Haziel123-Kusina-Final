<?php
	session_start();
?>

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
<body>
<br/>
<div class="container">
		<form action="order.php" method="POST">
			<div class="container">
				<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="home.php">Back</a></li>
				<li class="breadcrumb-item"><a href="">Update Password</a></li>
			</ol>
		</nav>
	</form>
<br>


<div class="container" style="width: 450px ; drop shadow rectangle">
		<form action = "changepasspro.php" method="POST">
				<br><br>
				  <label for="inputName">Old Password</label>
				  <div class="row">
					<div class="col-8">					
					  <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password" style="width: 195px;" required>
					</div>
					<div class="col-8">					
					</div>
				  </div><br/>		
				   <label for="inputName">New Password</label>		
				  <div class="form-group">
					<input type="password"  class="form-control" name="newpassword" placeholder="Enter New Password" style="width: 195px;" pattern=".{8,}"   required title="8 characters minimum" required>
				  </div>
				   <label for="inputName">Confirm New Password</label>
				  <div class="form-group">
					<input type="password"  class="form-control" name="confirmnewpassword" placeholder="Confirm New Password" style="width: 195px;" pattern=".{8,}"   required title="8 characters minimum" required>
				  </div>
				  <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-check    "></i> Submit</button>
				  <button class="btn btn-light"><a href="home.php"><i class="fas fa-arrow-circle-left    "></i> Cancel</a></button>
		</form>
	</div>
	</div>
</body>  
</html>