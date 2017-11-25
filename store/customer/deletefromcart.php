<?php
session_start();
if(!isset($_SESSION['cusername'])){


	header('Location: index.php');
}

require 'connect.php';
$itemid=$_GET['itemid'];
$cartid=$_GET['cartid'];
$customerid=$_SESSION['cid'];
$query='delete from cart_items where CARTID='.$cartid.' and ITEMID='.$itemid;

	if($con->query($query) === TRUE){
		
	   header("Location: cartdisplay.php");
       
	}
	else{
		header("Location: cartdisplay.php");
	}
?>