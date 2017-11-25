<?php
session_start();
if(!isset($_SESSION['cusername'])){


	header('Location: index.php');
}

require 'connect.php';
$itemid=$_GET['itemid'];
$customerid=$_SESSION['cid'];
$query='select * from cart where CUSTOMERID='.$customerid;
$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1){
		$row=mysqli_fetch_row($result);
		$cartid=$row[0];
        $sql = "insert into cart_items values(".$cartid.",".$itemid.")";
		$con->query($sql);
       header("Location: cartdisplay.php");
	}
?>