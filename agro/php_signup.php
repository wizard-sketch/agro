<?php
$name=test_input($_POST['name']);
$uname=test_input($_POST['uname']);
$pass=test_input($_POST['pass']);
$email=test_input($_POST['email']);
$phno=test_input($_POST['phno']);
$card=test_input($_POST['card']);
$address=test_input($_POST['address']);

$conn=mysql_connect("localhost","root","");
mysql_select_db("agro");
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
else{
    $sql="insert into user(name,username,password,address,email,phone_no,agri_card) values ('$name','$uname','$pass','$address','$email','$phno','$card')";
    if(!mysql_query($sql)){
        echo "<script>
        alert('Error!!!!Create account again');
        window.location='signup.html';
        </script>";
    }
    else{
    	echo "<script>
        alert('Account Created Successfully');
        window.location='signin.html';
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