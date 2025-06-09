<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body><div class="container my-5">
    <table class="table">
  <thead class="btn-dark  text-light">
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "Select * from `seriescrud` limit 0,5";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    $numberPages=4;
    $totalPages=ceil($num/$numberPages) ;

    for($btn=1;$btn<=$totalPages;$btn++){
      echo '<button class ="btn btn-dark mx-1 mb-3">
      <a href="pagination.php?page='.$btn.'"class="text-light">'.$btn.'</a></button>';
    }
    if(isset($_GET['page'])){
      $page=$_GET['page'];
      // echo $page; 
    }else{
      $page=1;
    }
  //  1-----> 0,5
  //  2------>5,5
  //  3------>10,5
  //  (pnum-1)*$numberPages
    // echo $totalPages;
    $startinglimit=($page-1)*$numberPages;
    $sql="Select * from `seriescrud` limit " .$startinglimit.','.$numberPages;

    $result=mysqli_query($con,$sql);
    // echo $num;
    while($row=mysqli_fetch_assoc($result)){
      echo'
    <tr>
      <th scope="row">'.$row['ID'].'</th>
      <td>'.$row['Fname'].'</td>
      <td>'.$row['Lname'].'</td>
      <td>'.$row['Mobile'].'</td>
    </tr>';
    }
     ?>
  </tbody>
</table>
    

    </div>
    </div>
</body>
</html>