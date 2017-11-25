<?php
session_start();
if(!isset($_SESSION['cusername'])){


	header('Location: index.php');
}

require 'connect.php';
$cartid=$_GET['cartid'];

$customerid=$_SESSION['cid'];


$query1='select * from cart_items where CARTID='.$cartid;
$query='delete from cart_items where CARTID='.$cartid;
$result=mysqli_query($con,$query1);
$itemsarray=array();
while($row=mysqli_fetch_row($result)){
	$itemsarray[]=$row[1];
}
   
	if($con->query($query) === TRUE){
		
	   
       
	}
	echo $itemsarray;
	foreach($itemsarray as $itemnum){
		echo 'removed '.$itemnum;
		$delquery='delete from item where ITEMID='.$itemnum;
		echo $delquery;
		if($con->query($delquery)==TRUE){
			echo 'successfully deleted';
		}
	}
	
	echo 'alert("You have successfully bought items from cart!!")';
	header("Location: itemsdisplay.php?itembought=TRUE");
?>