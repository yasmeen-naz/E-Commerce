<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>




<?php
	$product_id = $_GET['id'];
	if(isset($_POST['submit'])){
		
		$targetfolder = "images/";
 
	    $targetfolder1 = $targetfolder.basename( $_FILES['image']['name']) ;

		$file_type1 =$_FILES['image']['type'];
		
	   if ($file_type1=="image/png" || $file_type1=="image/jpeg" || $file_type1=="image/jpg"  ) 
		{ 
		if(move_uploaded_file($_FILES['image']['tmp_name'], $targetfolder1))
        {
          $img1 = basename( $_FILES['image']['name']);
                                                               
		
			mysql_connect('localhost','root','') or die('unable to connect');
			mysql_select_db('market');
			
		    $check = mysql_query("INSERT INTO `images` (`img_id`, `product_id`, `img_link`) VALUES (NULL, '$product_id', '$img1')");
		
		if($check){
			echo "<script> alert('successfully uploaded') </script>";
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';


		}else
		{
			echo "<script> alert('not successfully uploaded') </script>";
		}
		
		
		}
		else
		{
			echo "<script> alert('uploading error') </script>";
		}
		      
		}
		else
		{
			echo "<script> alert('invalid file type') </script>";
		}
	}	
	?>


	<form enctype="multipart/form-data" action="" method="post">

	 <input type="file" name="image">
	 <button type="submit" name="submit">Upload</button>
	</form>


</body>
</html>
    