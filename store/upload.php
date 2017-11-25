
<?php
$target_dir = "uploads/";

$filename  = 'item1';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$extension = pathinfo($target_file, PATHINFO_EXTENSION);
//$new       = md5($filename).'.'.$extension;
$targetfile=$target_dir.$target_file;
$uploadfile="customer/".$target_file;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$uploadfile)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	   $itemname=$_POST['itemname'];
	   $itemprice=$_POST['itemprice'];
	   $itemcolor=$_POST['color'];
	   $itemsize=$_POST['size'];
	   $itemcondition=$_POST['condition'];
	   $itemcategory=$_POST['category'];
	   date ("YYYY-MM-DD");
	   require 'connect.php';
	   $sql = "INSERT INTO item(ITEMCONDITION,PRICE,CATEGORY,ADDEDDATE,SIZE,COLOR,FILENAME,ITEMNAME) VALUES('".$itemcondition."',".$itemprice.",'".$itemcategory."','".date ("Y-m-d")."','".$itemsize."','".$itemcolor."','".$target_file."','".$itemname."')";
       if ($con->query($sql) === TRUE) {
       $last_id = $con->insert_id;
       //echo "New record created successfully. Last inserted ID is: " . $last_id;
	   header("Location: success.php");
       }
	   else {
          echo "Error: " . $sql . "<br>" . $con->error;
		  header("Location : error.php");
		  
       }

$con->close();
	   
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>