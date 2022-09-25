<?php
	session_start();
	
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		
		$query = "SELECT * FROM `customer` WHERE CONCAT(`customer_id`, `first_name`, 'last_name', 'middle_initial', 'phone_number', 'province', 'street',  'barangay', 'city') LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `customer`";
		$search_result = filterTable($query);
	}

	
	function filterTable($query)
	{
		include_once 'logdb.php';
		$filter_Result = mysqli_query($conn, $query);
		return $filter_Result;
	}
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
<body><br/>
	<form action="customer.php" method="POST">
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item"><a href="addcustomer.php">Add Customer</a></li>
		<li class="breadcrumb-item active" aria-current="page">Customer list</li>
	</ol>
</nav>
	<div class="container">
		<div class="col-sm-12">
		<div class="table-responsive">
		<table class="table table-hover table-light">
		<thead>
		<tr>
			<th>Customer ID</th>
			<th>Name</th>
			<th>M.I.</th>
			<th>Phone Number</th>
			<th>Province</th>
			<th>Street</th>
			<th>Barangay</th>
			<th>City</th>
			<th>Action</th>
		</tr>
		</thead>
			
				<?php while($row = mysqli_fetch_array($search_result)):?>
			<tbody>
			<tr>
				<td><?php echo $row['customer_id'];?></td>
				<td><?php echo $row['first_name'];?>  <?php echo $row['last_name'];?></td>
				<td><?php echo $row['middle_initial'];?></td>
				<td><?php echo $row['phone_number'];?></td>
				<td><?php echo $row['province'];?></td>
				<td><?php echo $row['street'];?></td>
				<td><?php echo $row['barangay'];?></td>
				<td><?php echo $row['city'];?></td>
			 <td>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="process.php?delete=<?php echo $row["customer_id"]; ?>" onclick="return confirm('are you sure you want to delete?')">Delete</a>
				<a class="dropdown-item" href="addcustomer.php?edit=<?php echo $row["customer_id"]; ?>" onclick="return confirm('are you sure you want to edit?')">Edit</a>
			</div>
			</div>
	  </td>
	</tr>
</tbody>

	<?php endwhile;?>
	</table>
</center>
     
     
    </div>  
</section>
	</body>
</html>