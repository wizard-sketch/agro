<?php
$uname=test_input($_POST['uname']);
$pass=test_input($_POST['pass']);
$conn=mysql_connect("localhost","root","");
mysql_select_db("agro");
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}
else{
    if($uname== "Niharika" && $pass=="MNiharika8"){
        echo "<script>
        window.location='admin_home.html';
        </script>";
    }
    else{
    $result=mysql_query("select username,password from user where username='".$uname."' and password='".$pass."';") 
	             or die("Failed to query database".mysql_error());
	$row=mysql_num_rows($result);
    
    if($row==1){
        echo "<script>
        alert('Login Successful');
        window.location='agro.php';
        </script>" ;
          }
    else{
    	echo "<script>
        alert('Login Failed');
        window.location='signin.html';
        </script>";
    }
}
}

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    return $data;
}
mysql_close();
?>