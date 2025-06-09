<?php
include 'connect.php';
$id=$_GET['deleteid'];
//echo $id;
$sql="DELETE FROM `seriescrud` WHERE id=$id";
$result=mysqli_query($con,$sql); 
if($result){
    //echo "Deleted successfully";
    header('location:read.php');
    
}else{
    die(mysqli_error($con));
}
    


?>