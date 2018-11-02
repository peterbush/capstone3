<html>
<head>
<title>Test connectivity results</title>
</head>
<body>

<div align="left">
<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	// error_reporting(1);
	$host = "localhost";
  	$user = "xxx";
  	$password = "xxx";
  	$port = "xxx";
  	$database = "xxx";
 	$firstname = $_POST['firstname'];
 	$lastname = $_POST['lastname'];
 	$email = $_POST['email'];
 	$street = $_POST['street'];
 	$city = $_POST['city'];
 	$state = $_POST['state'];
 	$zip = $_POST['zip'];
 	$department = $_POST['department'];

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
	
	// sql to create table applicants
	$sql = "CREATE TABLE applicants (
    id INT(6) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
	street VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    state VARCHAR(2) NOT NULL,
    zip INT(5) NOT NULL,
    department VARCHAR(50) NOT NULL,
    subdate DATETIME NOT NULL,
	PRIMARY KEY (id)
    )";
	
	
	if (mysqli_query($link, $sql)) {
		echo "<br />created table";
	} else {
		echo "<br />FAILED to create table";
	}
	
	// sql to create table user
	$sql = "CREATE TABLE user (
	userID VARCHAR(15) NOT NULL,
	userPasswd CHAR(40) NOT NULL,
	empName VARCHAR(15) NOT NULL,
	lastlogin DATETIME NOT NULL,
	PRIMARY KEY(userID)
	)";
	
	if (mysqli_query($link, $sql)) {
		echo "<br />created table";
	} else {
		echo "<br />FAILED to create table";
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
	
	while($row = mysqli_fetch_row($result)) {
		print('<b>' . $row[0] . '</b>');
		print('<b><hr></b>');
		print('<blockquote>');
		$sql = "DESCRIBE $row[0]";
		if ($result2 = mysqli_query($link, $sql)) {
			print('<table border="1">');
	        print('<tr><th>Name</th><th>ID</th><th>Name</th><th></th><th>Default</th><th>Extra</th></tr>');
			print('<tr>');
			while($row2 = mysqli_fetch_row($result2)) {
				for ($j = 0; $j < count($row2); $j++) {
					if ($row2[$j] == '') $token = '--';
					else                 $token = $row2[$j];
					print('<td>' . $token . '</td>');
					if (($j+1) % 6 == 0) print('</tr><tr>');
				}
			}
		print('</tr>');
		print('</table>');
		} else {
	        print('<br /> Couldn\'t DESCRIBE ' . $row[$i]);
		}
		print('</blockquote>');
		print('<br />');
	}
	

	
	try {
		$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO applicants VALUES ('NULL', '$firstname', '$lastname', '$email', '$street', '$city', '$state', 		'$zip', '$department', CURRENT_TIMESTAMP())";
		// use exec() because no results are returned
		$conn->exec($sql);
		echo "New record created successfully";
		}
	catch(PDOException $e)
		{
		echo $sql . "<br>" . $e->getMessage();
		}
		
	$conn = null;
	
	$sql = "SELECT DAYNAME(subdate) as day, MONTHNAME(subdate) as month, DAY(subdate) as date, YEAR(subdate) as year, id, firstname, lastname, email, street, city, state, zip, department FROM applicants";
	$result = $link->query($sql);
	print('<table border="1">');
	print('<tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Department Selected</th></tr>');
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<br> Submission Date: ". $row['day']. " ". $row['month']. " ". $row['date']. ", ". $row['year']. "
			<br> - ID: ". $row['id']. "
			<br> - Name: ". $row['firstname']. " ". $row['lastname']. "
			<br> - Email: ". $row['email']. "
			<br> - Address: ". $row['street']. " ". $row['city']. ", ". $row['state']. " ". $row['zip']. "
			<br> - Department Selected: ". $row['department']. " <br>";
	    }
	} else {
	    echo "0 results";
	}

	
  mysqli_close($link);
?>



</body>
</html>