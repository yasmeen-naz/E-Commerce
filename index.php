<!DOCTYPE html>
<html>

	<head>
	   <link rel="stylesheet" type="text/css" href="stylesheets/style.css">
	</head>

	<!--<body style="background:lightgray">-->
	<body>
   
	       <h1 align="center" id="header">Super Markeet</h1>
	       <h3 align="right">
	       <a href="">Login |</a> 
	       <a href=""> Signup |</a>
	       <a href=""> Cart(0) </a></h3>
		   <img src="images/header.jpg" height="300px" width="100%" />
	
	<div class="search">
		<form>
		     <input type="text"  name="search" placeholder="search any product by name or company" size="30" />
		     <input type="button" value="search" />
		</form>
	</div>
	
	<div id="header">
		<ul>
			<li><a href="" />Home</a></li>
			<li><a href="" />Products</a></li>
			<li><a href="" />Sercices</a></li>
			<li><a href="" />About Us</a></li>
			<li><a href="" />Content Us</a></li>
		</ul>
	</div><!-- end of header -->
	<br>
	
	<?php
       mysql_connect('localhost' , 'root' , '') or die("can not to server");

       mysql_select_db('market') or die("can't select database");

       $res = mysql_query("SELECT * FROM product");


       while($row = mysql_fetch_assoc($res)) {
            
            $product_id = $row['product_id'];

      	?>

	<div class="product">
		<h2 align="center"> <?php echo $row['product_name'];  ?> </h2>
		
  
        <?php 
             

            $images = mysql_query("SELECT * FROM  images where product_id='$product_id' ");
            $images = mysql_fetch_array($images);


        ?>

		<img src="images/<?php echo $images['img_link']; ?>" height:100">
		<p> Price: <?php echo $row['product_price'] ?></p>
		<p> <a href="detail.php?id=<?php echo $product_id ?>"> <img src="images/detail.jpg"> </a> </p>

	
	</div>
	<?php } ?>
	<footer>
		<h3 align="center"> Copyright &copy All rights reserved </h3>
	</footer>
	</body>
</html>