<?php
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="Select * from `registration` where username='$username' and password='$password'";
    
    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:display.php');

        }else{
            $invalid=1;
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
    
    <title>ABC Air Login</title>

  </head>
  <body background="https://d212k0qo5yzg53.cloudfront.net/wp-content/uploads/20200724123436/maxresdefault.jpg" no-repeat center center fixed;>
  <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Great!</strong> You have logged in successfully!!!<button type="button" class="btn-close" 
    data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid Credentials!!If not registered, please sign up<button type="button" class="btn-close" 
    data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>

      <h1 class="text-center mt-5" style="color:white;">ABC Air Login</h1>
    <div class="container mt-5">
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" style="color:white;">Name</label>
    <input type="text" class="form-control" placeholder="Enter name" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" style="color:white;">Password</label>
    <input type="password" class="form-control" placeholder="Enter password" name="password">
  </div>
  
  <button type="submit" class="btn btn-danger w-100">Login</button>
</form>
    </div><br>
    <center><b>Not Registered? </b><button class="btn btn-dark"><a href="sign.php" class="text-light" style="text-decoration: none;">
    Sign up here</a></button></center>
  </body>
</html>