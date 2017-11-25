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

echo '<table border=0><tr><td id="Icon" ><a href="index.php"><h1>The Store </h1></a>&nbsp&nbsp&nbsp&nbsp</td>';
echo '<td id="welcome"><center>&nbsp&nbsp&nbsp&nbspWelcome '.$_SESSION['username'].'</center></td></tr></table>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="additembtn" ><a href="fileupload.php">Add new Item </a></button></p>';
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
		
		echo '<a href="deleteitem.php?itemid='.$itemid.'"><img src="customer/uploads/deleteicon.png" alt="World Wide Web Consortium Home" width="50" height="50" border="0" /></a>';
		echo '<div id="itemimage"><img src="customer/'.$row[7].'" alt="item image" style="width:500px;height:450px;"/></div>';
		echo '<div id="itemprice"><ul><li><b>Price: $'.$row[2].'</li><li>Condition:'.$row[1].'</li><li>Color:'.$row[6].'</li><li>Size:'.$row[5].'</li><li>Category:'.$row[3].'</b></li></ul></div>';	
		}
	else{
		echo "Invalid Credentials";
	}
  if(isset($_POST['priceSubmit']) and $_POST['price']!=null){
	  $query='update item set PRICE='.$_POST['price'].' where ITEMID='.$itemid;
	  
    
	if($con->query($query) === TRUE){
		
	   header("Location: itempage.php?itemid=".$itemid);
       
	}
  }
?> 
</div>
<form  method="post" id="updatefrm">
<p>
<label><b>Price Update Form</b></label>
</p>
<p>
<label>Price: </label><input type="text" name="price">
</p>
<p>
<input type="submit" id="btn" name="priceSubmit" value="Update Price"/>
</p>
</form>	   
</body>