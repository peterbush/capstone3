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

  	if (!($link = mysqli_connect("$host:$port","$user","$password"))) {
		print("couldn't connect: " . '&nbsp;');
		exit;
	}
	echo 'successful connection';
  
  	$sql = "USE $database";
  	if (mysqli_query($link, $sql)) {
		echo "<br />opened database $database";
	} else {
		echo "<br />FAILED to open database $database";
		exit;
	}

	$sql = "SHOW TABLES";
	if ($result = mysqli_query($link, $sql)) {
		echo "<br />successfully executed show tables command";
		// echo "<br />The resource type of result is " . get_resource_type($result);
		echo "<br><br>\n";
	} else {
		echo "<br />FAILED to execute show tables command";
		exit;
	}
	?>
	
	<div class="container">
		<h2>Current Job Applicants</h2>
		<p>Type something in the input field to search the table:</p>  
		<input class="form-control" id="sinput" type="text" placeholder="Search..">
		<br>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Submission Date</th>
					<th>ID</th>
        			<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Department Selected</th>
					<th>Desired Hourly Rate</th>
					<th>Resume</th>
				</tr>
			</thead>
			<tbody id="appTable">
				<?php
				$sql = "SELECT DAYNAME(subdate) as day, MONTHNAME(subdate) as month, DAY(subdate) as date, YEAR(subdate) as 				year, id, firstname, lastname, email, street, city, state, zip, department, perhour, resume FROM applicants";
				$result = $link->query($sql);
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
			  
				        echo "
						<tr>
							<td>" . $row['day']. " " . $row['month']. " " . $row['date']. ", 
								" . $row['year']. "</td>
								<td>" . $row['id']. "</td>
								<td>" . $row['firstname']. " " . $row['lastname']. "</td>
								<td>" . $row['email']. "</td>
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