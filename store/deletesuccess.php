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

echo '<div id="welcome">welcome '.$_SESSION['username'].'</div>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="additembtn" ><a href="fileupload.php">Add new Item </a></button></p>';
}
else{
	header('Location: index.php');
}
?> 
</div>
<div id="centermessage">
<p>Item is Deleted sucessfully</p>;
</div>
</body>