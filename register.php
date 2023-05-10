<?php
include_once "php/config.php";
$_SESSION['unique_id'] = mt_rand(9999,99999);
if (isset($_POST['submit'])) {
  $recordusers = "INSERT INTO users(username,email,password,unique_id) VALUES('" . $_POST['username'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "','" .$_SESSION['unique_id']."')";
  // echo $recordusers;
  if (mysqli_query($conn, $recordusers)) {
    header("Location: login.php");
  } else {
    echo "Not Inserted";
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
  <script type="text/javascript" language="javascript" src="register.js"></script>
  <title>Register Page</title>
</head>

<body>
  <div class="justify-content-center align-items-center mt-5">
    <!-- <form> -->
    <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
      <h3 class="card-title">Register</h3>
      <form method="post">
        <div class="card-body">
          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="username" class="form-control" id="username" name="username" required>
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div>
            <!-- <a class="btn btn-info" onClick="register()" role="button" href="#">Submit</a> -->
            <button class="btn btn-success" name="submit">Register</button>
          </div>
        </div>
      </form>
    </div>
    <!-- </form> -->
  </div>
</body>

</html>