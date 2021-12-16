<?php
$success=0;
$user=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    // $sql="insert into `registration`(username,password) values('$username','$password')";
    // $result=mysqli_query($con,$sql);

    // if($result){
    //     echo "Data inserted successfully";
    // }else{
    //     die(mysqli_error($con));
    // }

    $sql="Select * from `registration` where username='$username'";
    
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            //echo "User Already exists!!";
            $user=1;

        }else{
          if($password===$cpassword){

            $sql="insert into `registration`(username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
            $success=1;
            header('location:display.php');
          }
        }else{
            $invalid=1;
            //die(mysqli_error($con));
        }
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>ABC Air Sign up</title>
  </head>
  <body background="https://d212k0qo5yzg53.cloudfront.net/wp-content/uploads/20200724123436/maxresdefault.jpg" no-repeat center center fixed;>

  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oops!</strong> User Already Exists! Please Login!<button type="button" class="btn-close" 
    data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Passwords do not match!!<button type="button" class="btn-close" 
    data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <?php
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Great!</strong> You have signed in successfully!!!<button type="button" class="btn-close" 
    data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

      <h1 class="text-center mt-5">ABC Air Sign Up</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" style="color:white;">Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:white;">Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:white;">Confirm Password</label>
    <input type="password" class="form-control" placeholder="Confirm password" name="cpassword">
  </div>


  <button type="submit" class="btn btn-danger w-100">Sign up</button>
</form>
    </div><br>
  <center><b>Already Registered? </b><button class="btn btn-dark"><a href="login.php" class="text-light" style="text-decoration: none;">
    Login here</a></button></center>
  </body>
</html>