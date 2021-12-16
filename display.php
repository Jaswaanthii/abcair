<?php
include 'connect1.php';
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABC Air</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
</head>
<body background="https://img1.wallspic.com/previews/4/7/6/0/3/130674/130674-atmosphere-flight-sky-aircraft-airline-x750.jpg" background-size="no-repeat center center fixed;">
<h3 class="text-center mt-5" style="color:white;"><b>AirFrames ABC Air Services</b></h3>
<h4 class="text-center mt-5" style="color:white;"><b>The Airframes created are displayed below</b></h4>
    <div class="container">

    <table class="table table-secondary table-striped table-hover table-border">
  <thead class="table-light">
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Maintenance Type</th>
      <th scope="col">Engineer Assigned</th>
      <th scope="col">Flight Hours</th>
      <th scope="col">Flight Number</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

  <?php
//For printing data from the database in a loop
$sql="Select * from `crud`";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $name=$row['name'];
        $engg=$row['engg'];
        $fhr=$row['fhr'];
        $fno=$row['fno'];
        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$name.'</td>
        <td>'.$engg.'</td>
        <td>'.$fhr.'</td>
        <td>'.$fno.'</td>
        <td>
        <button class="btn btn-dark"><a href="update.php?updateid='.$id.'" class="text-light" style="text-decoration: none;">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light" style="text-decoration: none;">Delete</a></button>
    </td>
      </tr>';
        
    }
}

?>

  </tbody>
</table>
    </div>
    
    <div class="container">
    
    <!--<button class="btn btn-dark w-100"><a href="login.php" class="text-light" style="text-decoration: none;">Logout</a></button>-->
    <center><button class="btn btn-dark my-3"><a href="user.php" class="text-light" style="text-decoration: none;">Add Air Frame</a>
    </button> <button class="btn btn-dark"><a href="logout.php" class="text-light" style="text-decoration: none;">Logout
  </a></button></center>
    </div>
</body>
</html>