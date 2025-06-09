<?php  

    include 'connect.php';
    if(isset($_POST['submit'])){
        $datas=$_POST['data'];
        $allData=implode(",",$datas);
        $sql="insert into `multipledata` (CheckBoxData) values ('$allData')";
        $result=mysqli_query($con,$sql);
        if($result){
            echo "Inserted Successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <title>Multiple Checkbox Data</title>
  </head>
  <body>
    <div class="container my-5">
        <form method="post">
           <div class="input-group-text">
            <input type="checkbox" name="data[]" value="Javascript">Javascript
            </div>
            <div class="input-group-text my-3">
            <input type="checkbox" name="data[]" value="React">React
            </div>
            <div class="input-group-text my-3">
            <input type="checkbox" name="data[]" value="CSS">CSS
            </div>
            <div class="input-group-text my-3">
            <input type="checkbox" name="data[]" value="HTML">HTML
            </div>
            <button class="btn btn-dark my-3" name="submit" type="submit">Submit</button>
        </form>
    </div>
    
  </body>
</html>