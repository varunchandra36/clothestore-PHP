<html>
<head>
<title>The Store</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="header">
<?php
session_start();
if(isset($_SESSION['cusername'])){
echo '<table border=0><tr><td id="Icon" ><a href="index.php"><h1>The Store </h1></a>&nbsp&nbsp&nbsp&nbsp</td>';
echo '<td id="welcome"><center>&nbsp&nbsp&nbsp&nbspWelcome '.$_SESSION['cusername'].'</center></td></tr></table>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="cartbtn"><a href="cartdisplay.php">Cart</a></button></p>';
echo '</div>';
}
else{
	header('Location: index.php');
}

require 'connect.php';
$itemid=$_GET['itemid'];
$query='select * from item where itemid='.$itemid;
$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_row($result);
		
		
		echo '<div id="itemimage"><img src="'.$row[7].'" alt="item image" style="width:500px;height:450px;"/></div>';
		echo '<div id="itemprice"><ul><li><b>Price: $'.$row[2].'</li><li>Condition:'.$row[1].'</li><li>Color:'.$row[6].'</li><li>Size:'.$row[5].'</li><li>Category:'.$row[3].'</b></li></ul></div>';
        echo '<div id="AddtoCartbtn"><button><a href="addtocart.php?itemid='.$row[0].'">AddToCart</a></button></div>';
		}
	else{
		echo "Invalid Credentials";
	}
?> 
</div>

	   
</body>