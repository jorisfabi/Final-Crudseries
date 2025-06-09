<?php
include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search data</title>
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="Search data"
            name="Search">
            <button class="btn btn-dark btn-sm" 
            name="Submit">Search</button>
            <a href="read.php" class="btn btn-dark btn-sm">Read page</a>
        
        </form>
        <div class="container my-5">
        <table class="table">
            <?php
if(isset($_POST['Submit'])){
    $search=$_POST['Search'];

    $sql="Select * from `seriescrud` where ID like '%$search%'
    or Fname like '%$search%' or Lname like '%$search%'";
    $result=mysqli_query($con,$sql);
    if($result){
    if(mysqli_num_rows($result)>0){
        echo '<thead>
        <tr>
        <th>sl no</th>
        <th>First Name</th>
        <th>Last Name</th>
        </tr>
        </thead>';
         while($row=mysqli_fetch_assoc($result)){;
        echo '<tbody>
        <tr>
        <td><a href="searchData.php?data='.$row['ID'].'"class="btn btn-dark">'.$row['ID'].'</a></td>
        <td>'.$row['Fname'].'</td>
        <td>'.$row['Lname'].'</td>
        </tr>
        </tbody>';
        }
    }else{
        echo '<h2 class=text-danger>Data not found</h2>';
    }
    }
}
?>
        </table>
    </div>
</body>
</html>