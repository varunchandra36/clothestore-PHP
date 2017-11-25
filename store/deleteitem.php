<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location: index.php');
}
require 'connect.php';
	   $sql = 'delete from item where ITEMID='.$_GET['itemid'];;
       if ($con->query($sql) === TRUE) {
      
	   header("Location: deletesuccess.php");
       }
	   else {
          echo "Error: " . $sql . "<br>" . $con->error;
		  header("Location : error.php");
		  
       }

$con->close();
