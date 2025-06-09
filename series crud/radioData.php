<?php
    include 'connect.php';
    if(isset($_POST['submit'])){

    $gender=$_POST['gender'];    
    $sql = "INSERT INTO `radioData` (gender) values ('$gender')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "Data of radio buttons inserted successfully";
    }else{
        die(mysqli_error($con));
    }

    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <form method = "post">
            <div>
                <input type = "radio" name = "gender" value = "male">Male
                
            </div>
            <div>
                <input type = "radio" name = "gender" value = "female">Female
                
            </div>
            <!-- <div>
                <input type = "radio" name = "gender" value = "kids">Kids
                
            </div> -->
            <div>
                <input type = "radio" name = "gender" value = "Other" checked> Other
                
            </div>
            <button type="submit" name="submit" class="btn btn-dark my-3    ">Submit</button>
        </form>
    </div>
</body>
</html>
