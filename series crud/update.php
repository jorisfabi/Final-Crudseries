<?php
include 'connect.php';
$ID=$_GET['updateid'];

$sql="Select * from `seriescrud` WHERE id=$ID";
$result=mysqli_query($con,$sql);

$row= mysqli_fetch_assoc($result);
$Fname= $row['Fname'];
$Lname= $row['Lname'];
$Email= $row['Email'];
$Mobile= $row['Mobile'];
$datas= $row['multipleData'];
$Gender=$row['gender'];
if(isset($_POST['update'])){
$Fname= $_POST['Fname'];
$Lname= $_POST['Lname'];
$Email= $_POST['Email'];
$Mobile= $_POST['Mobile'];
$datas= $_POST['data'];
$Gender=$_POST['gender'];           
$allData=implode(",",$datas);
$place=$_POST['place'];
$sql="update `seriescrud` set Fname='$Fname',Lname='$Lname',Email='$Email',
Mobile='$Mobile',multipleData='$allData',Gender='$Gender',place='$place' where id=$ID";
$result=mysqli_query($con,$sql);
if($result){
    //echo "updated successfully";
    header('location:read.php');
}else{
    die(mysqli_error($con));
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Update Data</title>
  </head>
  <body>
    <style>
        body{
            background-color:black;
        }
       
        .form-control{
            background-color:beige;
             border:2px solid gray;
            border-radius:7px;
        }
        select{
            border:2px solid gray;
            border-radius:5px;
            color:black;
            background-color:beige;
        }
        .container{
        border-radius: 25px;
        background-color: Yellow;
        padding: 70px;
        padding-bottom:20px;
        }
        button[type="submit"]{
          background-color:beige;
          border:2px solid gray;
          border-radius:10px;
        }
        select[name="place"]{
          padding-right:10px;
          float:left;
        }
    </style>
    <div class="container my-5">
        <form method="post">
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" autocomplete="off" name="Fname" value=<?php echo $Fname?>>
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" autocomplete="off" name="Lname" value=<?php echo $Lname?>>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" autocomplete="off" name="Email" value=<?php echo $Email?>>
  </div>
  <div class="form-group">
    <label>Mobile</label>
    <input type="text" class="form-control" autocomplete="off" name="Mobile" value=<?php echo $Mobile?>>
  </div>
  <div>
  <input type="checkbox" name="data[]" value="Javascript">Javascript
  <input type="checkbox" name="data[]" value="React">React
  <input type="checkbox" name="data[]" value="CSS">CSS
  <input type="checkbox" name="data[]" value="HTML">HTML
  </div>
  <div class="my-3">
    Gender:
    <input type = "radio" name = "gender" value = "male">Male
    <input type = "radio" name = "gender" value = "female">Female
     <input type = "radio" name = "gender" value = "Other"> Other
</div>
 <div class="container ">
        <form method = "post"> 
            <div>
        <select name="place">
            <option value="Unknown">Select Place</option>
            <option value="Halang">Halang</option>
            <option value="Pasinaya">Pasinaya</option>
            <option value="Malainen">Malainen</option>
        </select>
    </div>
    <div class="my-5"><center>
  <button type="submit" class="btn btn-lg my-5" name='update'>Update</button>
</center></div>
</form>
    
  </body>
</html>