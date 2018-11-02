<html>
<head>
<title>Form Test</title>
<style type="text/css">
  input[type=submit] , input[type=reset] {
    text-align: center;
    width: 100%;
  }
</style>

</head>
<body>

<div align="left" style="font-size:150%;color:blue;">
Form Test
</div>
<div align="left">
<form name="form_connect" method="post"
      action="applicant.php">

<table>
<tr><td>
	First Name
</td><td>
<input type="text" name="firstname" value="John" onClick="this.value=''" size="30" />
</td></tr>

<tr><td>
	Last Name
</td><td>
<input type="text" name="lastname" value="Doe" onClick="this.value=''" size="30" />
</td></tr>

<tr><td>
	Email
</td><td>
<input type="text" name="email" value="Email" onClick="this.value=''" size="30" />
</td></tr>

<tr><td>
	Street
</td><td>
<input type="text" name="street" value="Street" onClick="this.value=''" size="30" />
</td></tr>

<tr><td>
	City
</td><td>
<input type="text" name="city" value="City" onClick="this.value=''" size="30" />
</td></tr>

<tr><td>
	State
</td><td>
<input type="text" name="state" value="State" onClick="this.value=''" size="2" />
</td></tr>

<tr><td>
	Zip Code
</td><td>
<input type="text" name="zip" value="Zip Code" onClick="this.value=''" size="5" />
</td></tr>

<tr><td>
	Preferred Department
</td><td>
<input type="text" name="department" value="Department" onClick="this.value=''" size="25" />
</td></tr>



<tr><td colspan="2">
&nbsp;
</td></tr>

<tr><td colspan="2">
<input type="submit" name="submit" value="submit">
</td></tr>

<tr><td colspan="2">
<input type="reset" name="reset" value="reset">
</td></tr>

</table>
</form>
</p>
</div>

</body>
</html>