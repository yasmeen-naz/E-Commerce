<!DOCTYPE html>
<html>

	<head>
	   <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
	</head>

	<body style="background:lightgray">

	       <h1 align="center" id="header">Super Markeet</h1>
	
	<div class="search">
		<form>
		     <input type="text"  name="search" placeholder="search any product by name or company" size="30" />
		     <input type="button" value="search" />
		</form>
	</div>
	
	<div id="header">
		<ul>
			<li><a href="index.php" />Home</a></li>
			<li><a href="" />Products</a></li>
			<li><a href="" />Sercices</a></li>
			<li><a href="" />About Us</a></li>
			<li><a href="" />Content Us</a></li>
		</ul>
	</div><!-- end of header -->
	<br>

	

	<div id="info_main">
		<?php

		$product_id = $_GET['id'];

       mysql_connect('localhost' , 'root' , '') or die("can not to server");

       mysql_select_db('market') or die("can't select database");

       $res = mysql_query("SELECT * FROM product WHERE product_id='$product_id'");


       while($row = mysql_fetch_assoc($res)) {
            
            $product_id = $row['product_id'];

      	
      	?>
	<div id="info1">
             
              <center>  <h2> Images </h2> </center>
              <hr>

			 <?php 
	             
	            $images = mysql_query("SELECT * FROM  images where product_id='$product_id' ");
	            $images = mysql_fetch_array($images);

	        ?>
		      
		        <img src="images/<?php echo $images['img_link']; ?>" height="auto" width="500px">
		        
	</div>


	<div id="info">
	<center> <h2>  Other Details  </h2></center>
	<hr>
		<h2 align="center"> <?php echo $row['product_name'];  ?> </h2>
		<p align="center"> <b>Price: </b>=<?php echo $row['product_price'] ?>/- </p>
		<p align="center"> <a href=""> Add to cart </a> </p>
 
    </div>
     

		
		 
  <?php } ?>	
	</div>
	


	<footer>
		<h3 align="center"> Copyright &copy All rights reserved </h3>
	</footer>
	</body>
</html>