<html>
<head>
<title>Test connectivity results</title>
</head>
<body>
		
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
 	$firstname = $_POST['firstname'];
 	$lastname = $_POST['lastname'];
 	$email = $_POST['email'];
	$number = $_POST['number'];
 	$street = $_POST['street'];
 	$city = $_POST['city'];
 	$state = $_POST['state'];
 	$zip = $_POST['zip'];
 	$departments = $_POST['departments'];
	$perhour = $_POST['perhour'];
	$resume = $_POST['resume'];
	
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
	
	// sql to create table applicants
	$sql = "CREATE TABLE applicants (
    id INT(6) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
	number VARCHAR(10) NOT NULL,
	street VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state VARCHAR(2) NOT NULL,
    zip INT(5) NOT NULL,
    department VARCHAR(50) NOT NULL,
    subdate DATETIME NOT NULL,
	perhour VARCHAR(5) NOT NULL,
	resume VARCHAR(20) NOT NULL,
	PRIMARY KEY (id)
    )";
	
	if (mysqli_query($link, $sql)) {
		echo "<br />created table";
	} else {
		echo "<br /> ";
	}
	
	//sql to create table jobs
	$sql = "CREATE TABLE jobs (
	id INT(6) NOT NULL AUTO_INCREMENT,
	jobName VARCHAR(30) NOT NULL,
	description VARCHAR(250) NOT NULL,
	contactName VARCHAR(30) NOT NULL,
	contactEmail VARCHAR(50) NOT NULL,
	PRIMARY KEY (id)
	)";
	
	if (mysqli_query($link, $sql)) {
		echo "<br />created table";
	} else {
		echo "<br /> ";
	}
	
	try {
		$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO applicants VALUES ('NULL', '$firstname', '$lastname', '$email', '$number', '$street', '$city', '$state', 		'$zip', '$departments', CURRENT_TIMESTAMP(), '$perhour', '$resume')";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "<h1>Success!</h1>";
		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
		
	$conn = null;
	
  mysqli_close($link);
?>

<h2>Thank you <?php echo $_POST['firstname']; ?> for your submission!</h2>
<p>Your application is currently under review<p> 
<p>Please check your emails for confirmation and status updates!</p> 
<p>Want to submit another application? Click here: <a href="groupProjectTwo.php">Form</a>

</body>
</html>