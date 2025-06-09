<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $Fname=$_POST['Fname'];
    $Lname=$_POST['Lname'];
    $Email=$_POST['Email'];
    $Mobile=$_POST['Mobile'];
    $datas=$_POST['data'];
    $Gender=$_POST['gender'];
    $allData=implode(",",$datas);
    $place = $_POST['place'];
    $sql="INSERT INTO `seriescrud` (Fname,Lname,Email,Mobile,multipleData,Gender,place) 
    values ('$Fname','$Lname','$Email','$Mobile','$allData','$Gender','$place')";
    $result=mysqli_query($con,$sql);
    if($result){
        header('location:read.php');
    }else{
        die(mysqli_error($con));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>PHP CrudSeries</title>
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
        select[name="place"]{
            border:2px solid gray;
            border-radius:5px;
            color:black;
            background-color:beige;
            width:120px;
            height:35px;
        }
        .container{
        border-radius: 25px;
        background-color: yellow;
        padding: 50px;
        }
    </style>
    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
        <label class="form-label">First name</label>
        <input type="text" class="form-control"
        placeholder="Enter your first name" name="Fname"
        autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" class="form-control"
            placeholder="Enter your last name" name="Lname"
            autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control"
            placeholder="Enter your email" name="Email"
            autocomplete="off">
    </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control"
            placeholder="Enter your mobile" name="Mobile"
            autocomplete="off">
    </div>
<div class="checkBox">
<input type="checkbox" name="data[]" value="Javascript"> Javascript
<input type="checkbox" name="data[]" value="React"> React
<input type="checkbox" name="data[]" value="CSS"> CSS
<input type="checkbox" name="data[]" value="HTML"> HTML
</div>
<div class="my-3">
    Gender:
    <input type = "radio" name = "gender" value = "Male"> Male
    <input type = "radio" name = "gender" value = "Female"> Female
     
                <input type = "radio" name = "gender" value = "Other"> Other
                
           
</div>
      <div>
        <select name="place" >
            <option value="Unknown">Select Place</option>
            <option value="Halang">Halang</option>
            <option value="Pasinaya">Pasinaya</option>
            <option value="Malainen">Malainen</option>
        </select>
    </div>
<div class="my-5">
    <button class="btn btn-lg my-5" name="submit" 
    style="background-color:white;border:2px solid gray;
    border-radius:10px;">Submit</button>
</div>
    </div>
    
</form>

</div>

</body>
</html>