<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>The Store</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>
<center>The Store<sub style="font-size:20px;">You Donate,We Sell</sub></center></h1> <br/><br/><h2><center>Admin Portal</center></h2>

<?php
session_start();
if(isset($_SESSION['username'])){
	header('Location:itemsdisplay.php');
}
if(isset($_POST['staffSubmit'])){
	require 'connect.php';
	$username=$_POST['name1'];
	$password=$_POST['pass'];
	$result=mysqli_query($con,'select * from staffmember where username="'.$username.'" and password="'.$password.'"');
	if(mysqli_num_rows($result)==1){
		$_SESSION['username']=$username;
		header('Location: itemsdisplay.php');
	}
	else{
		echo "Invalid Credentials";
	}
}

?>
<div id="frm">
<form  method="post">
<p>
<label>UserName: </label>
<input type="text" name="name1">
</p>
<p>
<label>Password: </label><input type="password" name="pass">
</p>
<p>
<input type="submit" id="btn" name="staffSubmit" value="Login">
</p>

</form>
</div>

</body>
</html>

