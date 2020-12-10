<?php
$pcode=test_input($_POST['pcode']);
$conn=mysql_connect('127.0.0.1','root','');
mysql_select_db('agro');
$sql="select * from product where pcode='".$pcode."'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$pname=$row['pname'];
$price=$row['price'];
$quantity=$row['quantity'];
$type=$row['type'];
$brand=$row['brand'];
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    return $data;
}
?>
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
		<div class="title">
			<div class="login-page">
  <div class="form">
    <form class="login-form" method="POST" action="<?php $_PHP_SELF ?>">
      <input type="number" placeholder="Product Code" name="prdcode" id="prdcode" value="<?php echo $pcode;?>" disabled>
      <input type="text" placeholder="Product Name" name="prdname" id="prdname" value="<?php echo $pname;?>">
      <input type="number" placeholder="Price" name="prdprice" id="prdprice"value="<?php echo $price;?>">
      <input type="text" placeholder="Brand" name="prdbrand" value="<?php echo $brand;?>">
      <input list="type" placeholder="Type" name="type" value="<?php echo $type;?>">
      <datalist id="type">
        <option value="Fertilizer">Fertilizer</option>
        <option value="Pesticide">Pesticide</option>
        <option value="Seeds">Seeds</option>
      </datalist>
      <input type="number" placeholder="Quantity"  name="quantity" min="1" max="100" value="<?php echo $quantity;?>">
      <div style="color: white;">Image</div><input type="file" name="img" accept="image/*" value="img src='images/<?php echo $pcode;?>.jpg' "><!--accepts only imagefiles-->
      <button onclick="return validate()" name="update">Update</button>
    </form>
  </div>
</div>
		</div>
		<script type="text/javascript">
       function validate(){
           var prdcode=document.getElementById('prdcode').value;
           var prdname=document.getElementById('prdname').value;
           var prdprice=document.getElementById('prdprice').value;
           if(prdcode.length!=5){
            alert("Invalid Product Code");
            //window.location='admin_add.html';
            return false;
           }
           else{
           var patt1=/[a-zA-Z0-9]/;
           if(patt1.test(prdname)==false){
            alert("Invalid Product Name");
            //window.location='admin_add.html';
            return false;
           }
          else{
            if(prdprice<=0){
              alert("Invalid product price");
              //window.location='admin_add.html';
              return false;
            }
          }
         }
       }

    </script>
	</body>
</html>
<?php
if(isset($_POST['update'])){
$prdname=test_input($_POST['prdname']);
$prdprice=test_input($_POST['prdprice']);
$prdbrand=test_input($_POST['prdbrand']);
$type=test_input($_POST['type']);
$quantity=test_input($_POST['quantity']);
$sql=mysql_query("update product set pname='".$prdname."',price=".$prdprice.",brand='".$prdbrand."',type='".$type."',quantity=".$quantity." where pcode='".$pcode."'");
if(!sql){
  echo "<script>
        alert('Error!!!!Update the product again');
        window.location='admin_edit.php';
        </script>";
}
else{
  echo "<script>
        alert('Product Updated Successfully');
        window.location='admin_edit.php';
        </script>";
}

}
mysql_close();
?>