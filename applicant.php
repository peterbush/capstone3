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
  	$user = "wight1";
  	$password = "azalea";
  	$port = "3306";
  	$database = "wight1";

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
	
	// sql to create table
	$sql = "CREATE TABLE applicants (
    id INT(6) NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
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
	
	$sql = "SHOW TABLES";
	if ($result = mysqli_query($link, $sql)) {
		echo "<br />successfully executed show tables command";
		// echo "<br />The resource type of result is " . get_resource_type($result);
		echo "<br><br>\n";
	} else {
		echo "<br />FAILED to execute show tables command";
		include 'back.php';
		exit;
	}
	
	while($row = mysqli_fetch_row($result)) {
		print('<b>' . $row[0] . '</b>');
		print('<b><hr></b>');
		print('<blockquote>');
		$sql = "DESCRIBE $row[0]";
		if ($result2 = mysqli_query($link, $sql)) {
			print('<table border="1">');
	        print('<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>');
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


  mysqli_close($link);
?>

</body>
</html>