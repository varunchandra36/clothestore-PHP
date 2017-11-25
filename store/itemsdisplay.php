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
if(isset($_SESSION['username'])){

echo '<table border=0><tr><td id="Icon" ><a href="index.php"><h1>The Store </h1></a></td>';
echo '<td id="welcome"><center>&nbsp&nbsp&nbsp&nbspWelcome '.$_SESSION['username'].'</center></td></tr></table>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="additembtn" ><a href="fileupload.php">Add new Item </a></button></p>';
echo '</div>';
require 'connect.php';

$query='select * from item';
$result=mysqli_query($con,$query);
	
		while($row=mysqli_fetch_row($result)){
		$itemid=$row[0];
		$filename='customer/'.$row[7];
		$name=$row[8];
		$price=$row[2];
		$addeddate=$row[4];
		$diff=floor((strtotime(date ("Y-m-d"))-strtotime($addeddate))/(24*60*60));
		echo '<div class="item1"><a href="itempage.php?itemid='.$itemid.'" ><img src="'.$filename.'" width=200 height=200/></a><table border="0"> <tr><td>'.$name.'</td></tr><tr><td>Price:</td> <td><b>$'.$price.'</b></td> </tr><tr><td><b>'.$diff.' Days Old</b></td> </tr></table>';
		echo '</div>';
		}
	
}
else{
	header('Location: index.php');
}
?> 
</body>