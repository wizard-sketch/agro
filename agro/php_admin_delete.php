<?php
$pcode=test_input($_POST['pcode']);
$conn=mysql_connect('127.0.0.1','root','');
mysql_select_db('agro');
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}
else
{
    $sql="delete from product where pcode='".$pcode."'";
    $result=mysql_query($sql);
    if(!$result){
        echo "
        <script>
        alert('Error!!!Delete the product again');
        window.location='admin_delete.php';
        </script>
        ";
    }
    else{
        echo"
        <script>
        alert('Product Deleted Successfully');
        window.location='admin_delete.php';
        </script?
        ";
    }
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    return $data;
}

?>