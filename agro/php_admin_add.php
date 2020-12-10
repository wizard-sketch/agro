<?php
$prdcode=test_input($_POST['prdcode']);
$prdname=test_input($_POST['prdname']);
$prdprice=test_input($_POST['prdprice']);
$prdbrand=test_input($_POST['prdbrand']);
$type=test_input($_POST['type']);
$quantity=test_input($_POST['quantity']);
$img=$_POST['img'];

$conn=mysql_connect("localhost","root","");
mysql_select_db("agro");
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
else{
    $sql="insert into product(pcode,pname,price,quantity,type,brand) values ('$prdcode','$prdname',$prdprice,$quantity,'$type','$prdbrand')";
    if(!mysql_query($sql)){
        echo "<script>
        alert('Error!!!!Add the product again');
        window.location='admin_add.html';
        </script>";
    }
    else{
    	echo "<script>
        alert('Product added Successfully');
        window.location='admin_add.html';
        </script>" ;
    }
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    return $data;
}
mysql_close();
?>