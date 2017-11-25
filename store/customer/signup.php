<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>The Store</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['cusername'])){
	header('Location:itemsdisplay.php');
}
if(isset($_POST['signupsubmit'])){
	require 'connect.php';
	$username=$_POST['name1'];
	$password=$_POST['pass'];
	$name=$_POST['cname'];
	$email=$_POST['email'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$zip=$_POST['zip'];
	$sql="insert into person(PNAME,EMAIL,STREET,CITY,STATE,ZIP) values('".$name."','".$email."','".$street."','".$city."','".$state."',".$zip.")";
	if ($con->query($sql) === TRUE) {
	$lastid=$con->insert_id;
	$sql="insert into customer(PID,username,password) values(".$lastid.",'".$username."','".$password."')";
	if ($con->query($sql) === TRUE) {
	$lastid=$con->insert_id;
	$sql="insert into cart(CUSTOMERID,ITEMS) values(".$lastid.",0)";
	if ($con->query($sql) === TRUE) {
	echo "successfully inserted ";
	header('Location: signsuccess.php');
	}
	}
	}
	else{
		echo "failed".$con->error;
	}
	
	//header('Location: index.php');
}


?>
<div id="frm">
<form  method="post">
<p>
<label>UserName: </label>
<input type="text" name="name1">
</p>
<p>
<label>Password: </label><input type="password" name="pass"/>
</p>
<p>
<label>Name: </label><input type="text" name="cname"/>
</p>
<p>
<label>Email:</label><input type="text" name="email"/>
</p>
<p>
<label>Street:</label><input type="text" name="street"/>
</p>
<p>
<label>City:</label><input type="text" name="city"/>
</p>
<p>
<label>State:</label><input type="text" name="state"/>
</p>
<p>
<label>Zip:</label><input type="text" name="zip"/>
</p>
<table broder=0><tr>
<td><input type="submit" id="btn" name="signupsubmit" value="Sign Up"></td>
</tr></table>
</form>
</div>

</body>
</html>

