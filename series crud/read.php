<?php
 include 'connect.php';
 ?>
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Display Data</title>
  </head>
  
  <body>
    <style>
       body{
        background-color:black;
        padding:10px;
        margin-right:10px;
       }
       tr{
        background-color:white;
        border:2px solid black;
        border-radius:10px;
        color:black;
       }
       th{
        background-color:#e9dd23;
       }
      
       a[name="update"]{
        background-color:beige;
        border:2px solid gray;
        border-radius:40px;
        color:black;
       }
       a[name="delete"]{
        background-color:beige;
        border:2px solid gray;
        border-radius:10px;
        color:black;
      }
       td{
        text-align:center;
       }
       table, th, td {
        border: 1px solid black;
      }
      table{
          border-collapse: separate; /* Important for rounded borders */
      border-spacing: 0;
      border: 2px solid lightblue;
      border-radius: 40px;
      overflow: hidden;
      }
      a[name="search"],[name="add"],[name="chart"]{
          background-color:beige;
          border:2px solid gray;
          border-radius:10px;
          color:black;  
      }
    </style>
    
    <div class="contaier my-2">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Subjects</th>
      <th scope="col">Gender</th>
      <th scope="col">Place</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="Select * from `seriescrud`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $ID = $row['ID']; 
    $Fname = $row['Fname'];
    $Lname = $row['Lname'];
    $Email = $row['Email'];
    $Mobile = $row['Mobile'];
    $datas=$row['multipleData'];
    $Gender=$row['gender'];
    $place=$row['place'];
  //  $allData=implode(",",$datas);
    echo '<tr>
        <td scope="row">'.$ID.'</td>
        <td>'.$Fname.'</td>
        <td>'.$Lname.'</td>
        <td>'.$Email.'</td>
        <td>'.$Mobile.'</td>
        <td>'.$datas.'</td>
        <td>'.$Gender.'</td>
        <td>'.$place.'</td>
        <td>
        <a name="update" href="update.php?updateid='.$ID.'" class="btn btn-primary">Update</a>
        <a name="delete" href="delete.php?deleteid='.$ID.'" class="btn btn-danger">Delete</a>
      </td>
        
      </tr>';
}
?>

  </tbody>
</table>
      <center>
        <a name="search"href= "search.php"class="btn btn-primary my-3">Search</a> 
         <a name="add" href="index.php" class = "btn btn-danger my-3" >Add New</a>
          <a name="chart" href="chart.php" class = "btn btn-warning my-3" >Chart</a>
      </center>
    </div>
  </body>
</html>
