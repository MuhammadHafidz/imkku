<?php 
include 'conn.php';
if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $pasword = $_POST['password'];

   $login = mysqli_query(connection(),"select * from user where username='$username' and password='$pasword'");
   $cek = mysqli_num_rows($login);

   if ($cek >=0){
        session_start();
        $_SESSION['username']=$username;
        $_SESSION['password']=$pasword;
        $_SESSION['status']="login";
        header("location:index.php");
   }
   else {
        header("location:login.php");
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">
    <!-- <link href="assets/css/login.css" rel="stylesheet"> -->
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <img src="assets/img/logo2.png" alt="" class="card-title text-center" style="width : 50%">
            <form class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control login" placeholder="User Name" required autofocus>
                <!-- <label for="username">User Name</label> -->
              </div>
              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control login" placeholder="Password" required>
                <!-- <label for="inputPassword">Password</label> -->
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" id="login" name="login" type="submit">Sign in</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>