<!DOCTYPE html>
<html>
<head>

	<title>AGRO ANYTHING</title>
	<link rel="stylesheet" type="text/css" href="css/agro.css">
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="images\logo.png">
			</div>
			<ul>
				 <li><a href="admin_home.html">Back</a></li>
			</ul>
	     </div>
	 </header>
<?php
$dynamicList= "";
$conn=mysql_connect("localhost","root","");
mysql_select_db("agro");
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
else{
	$sql="select pcode,pname,price,quantity,type,brand from product";
	$result=mysql_query($sql);
	$productCount=mysql_num_rows($result);
	if($productCount>0){
		if($result == false){
        die(mysql_error());
        }
	 while($row=mysql_fetch_array($result)){
	 	$pcode=$row["pcode"];
	 	$pname=$row["pname"];
	 	$price=$row["price"];
	 	$quantity=$row["quantity"];
	 	$type=$row["type"];
	 	$brand=$row["brand"];
	 	//$image=$row["image"];

	   $dynamicList .="
	 	<table width='100%' border='1' cellspacing='0' cellpadding='6'>
	 	<tr>
	 	<td width='30%' valign='top'><img style='border:#666 1px solid;' src='images/".$pcode.".jpg' alt=".$pname." width='100' height='220' border='1'></td>
	 	<td width='70%' valign='top' style='color:white;'><h5>Product Code: ".$pcode."</h5><br>
	 	<h4>Product Name: ".$pname."</h4><br>
	 	<h3>$".$price."</h3><br>
	 	<h5>Quantity: ".$quantity."</h5><br>
	 	<h5>Type: ".$type."</h5><br>
	 	<h5>Brand: ".$brand."</h5><br>
	 	<form method='POST' action='php_admin_edit.php'>
        <input type='hidden' name='pcode' value='".$pcode."'>
        <input type='submit' name='submit' value='Update'>
	    </form>
	 	</tr>
	 	</table>
	 	";

	 }
}
else{
	$dynamicList= "We have no products listed in our store yet";
}
}
mysql_close();	


	?>
	<div class="title">
<p><?php echo $dynamicList;?></p>
</div>
	</body>
</html>