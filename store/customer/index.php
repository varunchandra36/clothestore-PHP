<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>The Store</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>
<center>The Store<sub style="font-size:20px;">You Donate,We Sell</sub></center></h1> <br/><br/><h1><center>Customer Portal</center></h1>
<?php
session_start();
if(isset($_SESSION['cusername'])){
	header('Location:itemsdisplay.php');
}
if(isset($_POST['staffSubmit'])){
	require 'connect.php';
	$username=$_POST['name1'];
	$password=$_POST['pass'];
	$result=mysqli_query($con,'select * from customer where username="'.$username.'" and password="'.$password.'"');
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_row($result);
		$_SESSION['cusername']=$username;
		$_SESSION['cid']=$row[0];
		header('Location: itemsdisplay.php');
	}
	else{
		echo "Invalid Credentials";
	}
}
if(isset($_POST['signupsubmit'])){
	header('Location: signup.php');
	
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
<table broder=0><tr><td>
<input type="submit" id="btn" name="staffSubmit" value="Login"></td>&nbsp&nbsp&nbsp&nbsp
<td><input type="submit" id="btn" name="signupsubmit" value="Sign Up"></td>
</tr></table>
</form>
</div>

</body>
</html>

