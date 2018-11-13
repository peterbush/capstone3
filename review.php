<html lang="en">
<head>
  <title>Review Applications</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<style>
		
		body
		{
		color:black;
		font-size:20px;
		font-family: Times Verdana, courier, sans-serif;
		background: linear-gradient(#ffffff, #a3c1e2, #ffffff);
		}
		
		/* Add a black background color to the top navigation */
		.navbar {
		    background-color: black;
		    overflow: hidden;
			position: fixed;
			top: 0;
			width: 100%;
			opacity: 0.70;

		}

		/* Style the links inside the navigation bar */
		.navbar a {
		    float: left;
			display: block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		    font-size: 18px;
			font-family: Arial, Helvetica, sans-serif;
		

		}

		/* Change the color of links on hover */
		.navbar a:hover {
		    background-color: #262626;
		    color: white;
			opacity: 0.5
		}

		/* Add a color to the active/current link */
		.navbar a.active {
		    background-color: #333333;
		    color: white;
		}
	
		/* Hide the link that should open and close the topnav on small screens */
		.topnav .icon {
		    display: none;
		}
	
		.main {
		  padding: 16px;
		  margin-top: 30px;
		  height: 1500px; /* Used in this example to enable scrolling */
		}
	
		ul {
			color: black;
			font-family: Times Verdana, courier, sans-serif;
			font-size: 25px;
		    overflow: hidden;
			position: fixed;
			width: 100%;
			opacity: 0.75;
		}
	</style>
	
	<div class= "navbar">
		<a href="groupProjectTwo.php"> Applicant Form </a>
		<a class="active" href="review.php"> Application Review </a>
	</div>
	
	<br>
	<br>
	<br>
	
	<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// error_reporting(1);
	$host = "xxx";
  	$user = "xxx";
  	$password = "xxx";
  	$port = "xxx";
  	$database = "xxx";

  	if (!($link = mysqli_connect("$host:$port","$user","$password"))) {?>
		<div class="container">
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>ERROR!</strong> Failed to Connect
			</div>
		</div> <?php
		exit;
	} ?>
	<div class="container">
		<div class="alert alert-success alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Connection Successful
		</div>
	</div>
		
	<?php
  	$sql = "USE $database";
  	if (mysqli_query($link, $sql)) { ?>
		<div class="container">
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Opened database
			</div>
		</div>
		<?php
	} else { ?>
		<div class="container">
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>ERROR!</strong> Failed to open databaase
			</div>
		</div> <?php
		exit;
	} ?>
	
	
	<?php
	$sql = "SHOW TABLES";
	if ($result = mysqli_query($link, $sql)) {
		echo "<br /> ";
		// echo "<br />The resource type of result is " . get_resource_type($result);
		echo "<br><br>\n";
	} else {
		echo "<br />FAILED to execute show tables command";
		exit;
	}
	?>
	
	<hr>
	
	<div class="container">
		<h2>Current Job Applicants</h2>
		<p>Type something in the input field to search the table:</p>  
		<input class="form-control" id="sinput" type="text" placeholder="Search..">
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Submission Date</th>
        			<th>Name</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Department Selected</th>
					<th>Desired Hourly Rate</th>
					<th>Resume</th>
				</tr>
			</thead>
			<tbody id="appTable">
				<?php
				$sql = "SELECT DAYNAME(subdate) as day, MONTHNAME(subdate) as month, DAY(subdate) as date, YEAR(subdate) as 				year, id, firstname, lastname, email, number, street, city, state, zip, department, perhour, resume FROM applicants";
				$result = $link->query($sql);
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
			  
				        echo "
						<tr>
							<td>" . $row['id']. "</td>
							<td>" . $row['day']. " " . $row['month']. " " . $row['date']. ", 
							" . $row['year']. "</td>
							<td>" . $row['firstname']. " " . $row['lastname']. "</td>
							<td>" . $row['email']. "</td>
							<td>" . $row['number']. "</td>
							<td>" . $row['street']. " " . $row['city']. ", " . $row['state']. " " . $row['zip']. "</td>
							<td>" . $row['department']. "</td>
							<td>$" . $row['perhour']. "</td> 
							<td>" . $row['resume']. "</td>
						</tr>";	
					}
				} else {
					echo "0 results";
				}
				?>
			</tbody>
		</table>
	</div>
		
		<script>
			$(document).ready(function(){
				$("#sinput").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$("#appTable tr").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
		</script>
			
			<?php
			mysqli_close($link);
			?>

</body>
</html>
