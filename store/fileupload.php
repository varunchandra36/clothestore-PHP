<!DOCTYPE html>
<html>
<head>
<title>The Store</title>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div id="header">
<?php
//require 'welcome.php';
session_start();
if(isset($_SESSION['username'])){

echo '<table border=0><tr><td id="Icon" ><a href="index.php"><h1>The Store </h1></a></td>';
echo '<td id="welcome">&nbsp&nbsp&nbspWelcome '.$_SESSION['username'].'</td></tr></table>';
echo '<p><br><button id="logoutbtn"><a href="logout.php" >Logout</a></button></p>';
echo '<p><br><button id="additembtn" ><a href="fileupload.php">Add new Item </a></button></p>';
echo '</div>';
}
else{
	header('Location: index.php');
}
?> 
</div>
<div id="frm2" >
<form action="upload.php" method="post" enctype="multipart/form-data">
   
   <p>
   <label>Item Name <label>
   <input type="text" name="itemname" />
   </p>
   <p>
   <label>Item Price<label>
   <input type="text" name="itemprice" />
   </p>
   <p>
   <label>Color</label>
   <select id="clr" name="color">
   <option value="Grey">Grey</option>
   <option value="Orange">Orange</option>
   <option value="Pink">Pink</option>
   <option value="White">White</option>
   <option value="Blue">Blue</option>
   <option value="Brown">Brown</option>
   <option value="Red">Red</option>
   <option value="Green">Green</option>
   </select>
  </p>
  <p>
   <label>Size</label>
   <select name="size">
   <option value="XS">XS</option>
   <option value="S">S</option>
   <option value="M">M</option>
   <option value="L">L</option>
   <option value="XL">XL</option>
   </select>
  </p>
  <p>
   <label>Item Condition</label>
   <select name="condition">
   <option value="Used">Used</option>
   <option value="New">New</option>
   </select>
  </p>
   <p>
   <label>Item category</label>
   <select name="category">
   <option value="Clothing">Clothes</option>
   <option value="Accessories">Accessories</option>
   <option value="Footwear">Footwear</option>
   </select>
  </p>
   <p>
   <label>Select image to upload:</label>
   <input type="file" name="fileToUpload" id="fileToUpload"/>
   </p>
   <p>
   <center><input type="submit" value="Add Item" name="btn" id="btn"/></center>
   </p>
</form>
</div>
</body>
</html>