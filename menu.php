<?php
	session_start();
	
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		
		$query = "SELECT * FROM `menu` WHERE CONCAT(`menu_id`, `menu_name`, 'description', 'price', 'unit') LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `menu`";
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
		<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body><br/>
	<div class="container">
		<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="home.php">Back</a></li>
		<li class="breadcrumb-item"><a href="addmenu.php">Add Menu</a></li>
		<li class="breadcrumb-item active" aria-current="page">Menu list</li>
	</ol>
  </nav>


	<div class="container">
		<div class="col-sm-12">
		<div class="table-responsive">
		<table class="table table-hover table-light">
		<thead>
		<tr>
			<th>Menu ID</th>
			<th>Menu Name</th>
			<th>Price</th>
			<th>Description</th>
			<th>Unit</th>
			<th>Action</th>
			<td>
			
			</td>
		</tr>
		</thead>
			
				<?php while($row = mysqli_fetch_array($search_result)):?>
			<tbody>
			<tr>
				<td><?php echo $row['menu_id'];?></td>
				<td><?php echo $row['menu_name'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['description'];?></td>
				<td><?php echo $row['unit'];?></td>
			 <td>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</button>
						<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
					<a class="dropdown-item" href="process2.php?delete=<?php echo $row["menu_id"]; ?>" onclick="return confirm('are you sure you want to delete?')">Delete</a>
				<a class="dropdown-item" href="addmenu.php?edit=<?php echo $row["menu_id"]; ?>" onclick="return confirm('are you sure you want to edit?')">Edit</a>
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