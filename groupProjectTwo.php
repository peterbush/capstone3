
<html lang="eng">
<head>
<title>Grading System Database</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	
	<style>
		.tb {
			postion:absolute;
			left: 40%;
		}
		
		li {
			margin:5px;
		}
		
		ul {
			list-style:none;
		}
		
		#rqd{color:red;}
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
			width: 100%;
			opacity: 0.75;
		}
	</style>
	
	<div class= "navbar">
		<a class="active" href="groupProjectTwo.php"> Applicant Form </a>
		<a href="review.php"> Application Review </a>
	</div>
	<br>
	<br>
	<div style="background: #a3c1e2; width: 900px; box-shadow:10px 10px 5px #888888;">
		<h2>Job Application</h2>
		<p>Fill required areas for desired job.</p>
		
		<form name="theForm" class="group" method="POST" action="submission.php">
			<legend>Applicant Info</legend>
			<ul>
				<li><label for="firstname"><span id="rqd">*</span>First Name</label>
					<input type="text" name="firstname" class="tb" id="firstname" placeholder= "First Name" 
					size="15" required/></li>
				
				<li><label for="lastname"><span id="rqd">*</span>Last Name</label>
					<input type="text" name="lastname" class="tb" id="lastname" placeholder= "Last Name" 
					size="15" required/></li>
					
				<li><label for="number"><span id="rqd">*</span>Phone Number</label>
					<input type="tel" name="number" class="tb" id="number" placeholder="Phone #" 
					size ="10" required/></li>
				
				<li><label for="email"><span id="rqd">*</span>Email</label>
					<input type="email" name="email" class="tb" id="email" placeholder="Email" required/></li>
				
				<li><label for="street"><span id="rqd">*</span>Street</label>
					<input type="text" name="street" class="tb" id="street" placeholder="Street" required/></li>	
				
				<li><label for="city"><span id="rqd">*</span>City</label>
					<input type="text" name="city" class="tb" id="city" placeholder= "City" required/></li>
				
				<li><label for="state"><span id="rqd">*</span>State</label>
					<input type="text" name="state" class="tb" id="state" placeholder= "2 letter state abbr" required/></li>
					
				<li><label for="zip"><span id="rqd">*</span>Zip Code</label>
					<input type="text" name="zip" class="tb" id="zip" placeholder= "Zip Code" required/></li>
					
				<label for="departments"><span id="rqd">*</span>Department</label>
					<input type="text" name="departments" list="departments" required/>
					<datalist id="departments">
						<option value="Choose..."></option>
						<option value="Accounting">Accounting</option>
						<option value="Broadcasting">Broadcasting</option>
						<option value="Computer Science">Computer Science</option>
						<option value="Communication">Communication</option>
						<option value="Finance">Finance</option>
						<option value="Information Technology (IT)">Information Technology (IT)</option>
						<option value="Marketing">Marketing</option>
						<option value="Telecommunications">Telecommunications</option>
					</datalist>
				<li><label for="perhour"><span id="rqd">*</span>Desired Per Hour Rate</label>
					<input type="text" name="perhour" class="tb" id="perhour" placeholder= "$" required/></li>
				<li><label for="resume"><span id="rqd">*</span>Resume</label>
					<input type="file" name="resume" class="prompt" id="resume" placeholder= "Resume" required/></li>
					<br>
				<li><input type="submit" value="Submit"/></li>
			</ul>
		</form>
	</div>
	
	<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// error_reporting(1);
	$host = "localhost";
  	$user = "xxx";
  	$password = "xxx";
  	$port = "3306";
  	$database = "xxx";
	
  	if (!($link = mysqli_connect("$host:$port","$user","$password"))) {
		print(' ');
		exit;
	}
	echo ' ';
  
  	$sql = "USE $database";
  	if (mysqli_query($link, $sql)) {
		echo "<br /> ";
	} else {
		echo "<br />ERROR...FAILED to open database...ERROR";
		exit;
	}
	
	$sql = "SHOW TABLES";
	if ($result = mysqli_query($link, $sql)) {
		echo " ";
		// echo "<br />The resource type of result is " . get_resource_type($result);
		echo "<br><br>\n";
	} else {
		echo "<br />FAILED to execute show tables command";
		exit;
	}
	?>
	
	<div class="container">
		<h2>Current Jobs Available</h2>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Job Name</th>
        			<th>Job Description</th>
					<th>Contact's Name</th>
					<th>Contact's Email</th>
				</tr>
			</thead>
			<tbody id="jobTable">
				<?php
				$sql = "SELECT id, jobName, description, contactName, contactEmail FROM jobs";
				$result = $link->query($sql);
				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
			  
				        echo "
						<tr>
							<td>" . $row['id']. "</td>
							<td>" . $row['jobName']. "</td>
							<td>" . $row['description']. "</td>
							<td>" . $row['contactName']. "</td>
							<td>" . $row['contactEmail']. "</td>
						</tr>";	
					}
				} else {
					echo "0 results";
				}
				?>
			</tbody>
		</table>
	</div>
		
			
			<?php
			mysqli_close($link);
			?>
		
</body>
</html>