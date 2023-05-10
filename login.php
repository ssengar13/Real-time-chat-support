<?php
session_start();
include_once "php/config.php";
$_SESSION['unique_id'] = mt_rand(9999,99999);
if(isset($_GET['username'])){
  $getusers = "SELECT username,unique_id,email,user_id FROM users WHERE username='" . $_GET['username'] . "' AND password='" . $_GET['password'] . "'";
$result = mysqli_query($conn, $getusers);
if ($result && mysqli_num_rows($result) > 0) {
  $getUserData = mysqli_fetch_assoc(mysqli_query($conn, $getusers));
  // print_r($getUserData);
  // die();
  $_SESSION['unique_id'] = $getUserData['unique_id'];
  header("Location:index.php");
} else {
  echo "Invalid Username or Password";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="login.js"></script>
    <title>Login Page</title>
</head>
<body>
  <div class="justify-content-center align-items-center mt-5">
    <!-- <form> -->
      <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
        <h3 class="card-title">Login</h3>
        <form method="get">
        <div class="card-body">
        <div class="row mb-3">
          <label for="userName" class="col-sm-2 col-form-label">Username</label>
          <div class="col-sm-10">
            <input type="username" class="form-control" id="userName" name="username" required>
          </div>
        </div>
        <div class="row mb-3">
          <label for="userPassword" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="userPassword" name="password" required>
          </div>
        </div>
        <div>
          <!-- <a class="btn btn-info" role="button" onClick="check()" href="Index.html">Submit</a> -->
          <button class="btn btn-success" name="login">Log In</button>
        </div>
        </div>
        </form>
        <!-- <a href="register.html">SignUp</a>
        <a href="index.html">Home</a> -->
      </div>
    <!-- </form> -->

    </div>
</body>
</html>