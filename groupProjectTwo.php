
<html lang="eng">
<head>
<title>Grading System Database</title>
<meta charset="utf-8">
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
			position: fixed;
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
	<div class="container">
		<h2>Job Application</h2>
		<p>Fill required areas for desired job.</p>
	</div>
	<div style="background: #a3c1e2; width: 600px; height: 475px; margin: 0 auto; position:absolute; border-style:solid; box-shadow:10px 10px 5px #888888; ">
		<form name="theForm" class="group" method="POST" action="submission.php">
			<legend>Account Info</legend>
			<ul>
				<li><label for="firstname"><span id="rqd">*</span>First Name</label>
					<input type="text" name="firstname" class="tb" id="firstname" placeholder= "First Name"
					required/></li>
					
				<li><label for="lastname"><span id="rqd">*</span>Last Name</label>
					<input type="text" name="lastname" class="tb" id="lastname" placeholder= "Last Name" required/></li>
					
				<li><label for="number"><span id="rqd">*</span>Phone Number</label>
					<input type="number" name="number" class="tb" id="number" placeholder="Phone Number" required/></li>
				
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
				
				<label for="departments"> Department</label>
				<input type="text" name="departments" list="departments" required/>
				<datalist id="departments"> 
					<option value="Accounting">
					<option value="Broadcasting">
					<option value="Computer Science">
					<option value="Communication">
					<option value="Finance">
					<option value="Information Technology (IT)">
					<option value="Marketing">
					<option value="Telecommunications">								
				</datalist>
				
					
				<li><label for="perhour"><span id="rqd">*</span>Desired Per Hour Rate</label>
					<input type="text" name="perhour" class="tb" id="perhour" placeholder= "$" required/></li>
				
				<li><label for="resume"><span id="rqd">*</span>Resume</label>
					<input type="file" name="resume" class="prompt" id="resume" placeholder= "Resume" required/></li> 
				<li><input type="submit" value="Submit"/></li>
			</ul>
		</form>
	</div>	
		
</body>
</html>
