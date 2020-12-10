<?php
$conn=mysql_connect("localhost","root","");
mysql_select_db("agro");
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
else{
	$sql="select pcode,pname,price,quantity,type,brand,image from product";
	$result=mysql_query($sql);
	$productCount=mysql_num_rows($result);
	if($productCount==0){
		$msg="Products Not Available";
		
}
else{
	$msg="Enjoy Shopping!!!";
	 while($row=mysql_fetch_array($sql)){
	 	$pcode=$row["pcode"];
	 	$pname=$row["pname"];
	 	$price=$row["price"];
	 	if($row["quantity"]>0){
	 		$avail="Instock";
	 	}
	 	else{
	 		$avail="Not instock";
	 	}
	 	$type=$row["type"];
	 	$brand=$row["brand"];
	 	$image=$row["image"];
        $dynamicList="<table>
        <tr>
        <td>$image</td>
        <td>$pcode<br>$pname<br>$price<br>$type<br>$brand<br>$avail</td>
        <form method='POST' action='cart.php'>
        <input type='hidden' name='pcode' value='$pcode'>
        <input type='submit' name='submit' value='Add to Cart'>
        </form>
        </tr>
	 	";

	 }

}
}
mysql_close();	


	?>
<!DOCTYPE html>
<html>
<head>

	<title>AGRO ANYTHING></title>
	<link rel="stylesheet" type="text/css" href="css/agro.css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="images\logo.png">
			</div>
			<ul>
				 <li><a href="cart.html">Cart</a></li>
				 <li><a href="myorders.html">My Orders</a></li>
				 <li><a href="contact_us.html">Contact Us</a></li>
				 <li><a href="index.html">Logout</a></li>
			</ul>
	     </div>
	 </header>
<div class="title">
 <p><?php echo $msg ?></p>	
</div>
	</body>
</html>
