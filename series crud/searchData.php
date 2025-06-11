<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Search Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
    <?php
$data=$_GET['data'];
$sql="Select * from `seriescrud` where ID=$data";
$result=mysqli_query($con,$sql);
if($result){
    $row=mysqli_fetch_assoc($result);
    echo '<div class="container">
        <div class="jumbotron">
        <h1 class="display-4 text-center text-success">'.$row['Fname'].'</h1>
        <p class="lead text-center text-danger">Your Email ID is : '.$row['Email'].'</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-dark btn-lg" href="search.php"
            role="button">Back</a>
        </p>
        </div>
        </div>';
}
?>

</div>
</body>
</html>
