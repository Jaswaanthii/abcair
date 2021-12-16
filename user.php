<?php
//Connecting the database to the webpage
include 'connect1.php';
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $engg=$_POST['engg'];
  $fhr=$_POST['fhr'];
  $fno=$_POST['fno'];

  $sql="insert into `crud` (name,engg,fhr,fno) values('$name','$engg','$fhr','$fno')";
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "Data inserted successfully";
    header('location:display.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ABC Air Services</title>
  </head>
  <body background="https://wallpaperaccess.com/full/1470848.jpg" background-size="no-repeat center center fixed;">
  <h2 class="text-center mt-5" style="color:white;"><b>Fill the necessary details</b></h2>
    <div class="container my-5">

    <form method="post">
  <div class="mb-3">
    <label style="color:white;"><b>Maintenance task</b></label>
    <input type="text" class="form-control" placeholder="Enter Name of Maintenance" name="name" autocomplete="off">
</div>
<div class="mb-3">
    <label style="color:white;"><b>Engineer Assigned</b></label>
    <select id="engg" name="engg" placeholder="Select Engineer" class="form-control">
    <option value="Aircraft Maintenance Engineer">Aircraft Maintenance Engineer (AME)</option>
    <option value="Aircraft Maintenance Technician">Aircraft Maintenance Technician (AMT)</option>
    <option value="Aircraft Maintenance Mechanic">Aircraft Maintenance Mechanic (AMM)</option>
  </select>
    <!--<input type="text" class="form-control" placeholder="Enter Name of Engineer" name="engg" autocomplete="off">-->
</div>
<div class="mb-3">
    <label style="color:black;"><b>Flight Hours</b></label>
    <input type="text" class="form-control" placeholder="Enter number of Flight Hours" name="fhr" autocomplete="off">
</div>
<div class="mb-3">
    <label style="color:black;"><b>Flight Number</b></label>
    <input type="text" class="form-control" placeholder="Enter Flight Number" name="fno" autocomplete="off">
</div>


<center><button type="submit" class="btn btn-dark" name="submit">Submit</button>
<button class="btn btn-dark my-3"><a href="display.php" class="text-light" style="text-decoration: none;">Airframe Dashboard</a>
  </button>
</center>
</form>
    </div>

  </body>
</html>