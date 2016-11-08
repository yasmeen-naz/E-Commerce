<!DOCTYPE html>
<html>
<head>
	<title> Add product </title>
</head>
<body>
    <form action="" method="post">
    	
    	<input type="text" name="product_name"  placeholder="Enter product name" /> <br>
    	<input type="text" name="product_type"  placeholder="Enter product type"/>  <br>
    	<input type="number" name="product_price" pattern="^[0-9]" placeholder="Enter product price"/> <br>
    	<button type="submit" name="submit"> Next </button>

    </form>

    <?php   

         if(isset($_POST['submit'])){
         
         $product_name = $_POST["product_name"];
         $product_type = $_POST["product_type"];
         $product_price = $_POST["product_price"];

         mysql_connect('localhost','root','') or die("Can't connect to server");
         mysql_select_db('market') or die("Can't connect to database");

         $query = mysql_query("INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_price`) VALUES (NULL, '$product_name', '$product_type', '$product_price');"); 
         if($query)
         {
             // $product_id = mysql_query("SELECT max('product_id') as  product_id FROM product") ;

             // $row = mysql_fetch_row($product_id);

             // echo $row['product_id'];l 

         	 $highest_id = mysql_result(mysql_query("SELECT MAX(product_id) FROM product"), 0);

         	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=add_product.php?id='.$highest_id.'">';

             
         }
         else
         {
         	echo "product not inserted";
         }
	
       
     }



    ?>
</body>
.