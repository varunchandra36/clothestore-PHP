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

require 'connect.php';
$query='select * from cart where CUSTOMERID='.$_SESSION['cid'];
$resultbefore=mysqli_query($con,$query);
$cartid=mysqli_fetch_row($resultbefore)[0];

echo '<table border=0><tr><td id="Icon" ><a href="index.php"><h1>The Store </h1></a>&nbsp&nbsp&nbsp&nbsp</td>';
echo '<td id="welcome"><center>&nbsp&nbsp&nbsp&nbspWelcome '.$_SESSION['cusername'].'</center></td></tr></table>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="cartbtn"><a href="cartdisplay.php">Cart</a></button></p>';
echo '<p><br><button id="checkoutbtn"><a href="checkoutcart.php?cartid='.$cartid.'">Check Out Cart</a></button></p>';

echo '</div>';


	
$queryforcartitems='select * from cart_items where CARTID='.$cartid;

$result=mysqli_query($con,$queryforcartitems);
       echo '<br/><center><b>Cart Items ('.mysqli_num_rows($result).')</b></center><br/><br/>';
		
		$temp=1;
       while($row=mysqli_fetch_row($result)){
		$query2="select * from item where ITEMID=".$row[1];
		$result2=mysqli_query($con,$query2);
		
	if(mysqli_num_rows($result2)==1){
		
		$row2=mysqli_fetch_row($result2);
		echo '<table border=0>';
		echo '<tr>';
	    echo '<div class="itemdesc">';
		echo '<td><b>'.$temp.'.&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></td>';
		
		$temp++;
		echo '<td><img src="'.$row2[7].'" alt="item image" style="width:300px;height:250px;"/></td>';
		echo '<td>&nbsp&nbsp&nbsp&nbsp<ul><li>Price: $'.$row2[2].'</li><li>Color:'.$row2[6].'</li><li>Size:'.$row2[5].'</li></ul>&nbsp&nbsp&nbsp&nbsp</td>';
        //delete from cart item
		echo '<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="deletefromcart.php?itemid='.$row2[0].'&cartid='.$cartid.'">Delete</a></td>';
		echo '</tr>';
		echo '</table></div><br/><br/><br/>';
		}
	else{
		echo "Invalid Credentials";
	}
	   }
	   echo '</div>';
	   
}
	else{
	header('Location: index.php');
}
?> 
</div>

	   
</body>