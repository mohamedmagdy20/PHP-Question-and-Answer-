<?php
session_start();
require "./Authntication/Auth.php";
//$password = $_POST['password'];
//print_r($password_hach);
//password_verify($password_hach,);
if(isset($_POST['email'])){
    $data = Check($_POST['email'],$_POST['password']);
     if(!empty($data)){
        $_SESSION['user'] = $data;
         header("location: index.php");
     }
     else{
         header("location: login.php");
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap-5.1.0-dist/css/bootstrap.min.css"/>
    <title>Document</title>
</head>
<body class="bg-light">
    <form action="login.php" method="POST" class="container pt-5 pb-4">
    <div class="mb-3">
    <label class="form-label">Login</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email">
        <div id="text" class="form-text">We'll never share your info with anyone else.</div>
        <input type="password" name="password" class="form-control mt-3 mb-3" placeholder="Enter Password">
        <div class="d-flex">
        <button class="btn btn-primary">Login</button>
        <p class="ps-3">Dont Have <a href="./Adduser.php">Email</a></p>
        </div>
    </div>
    </form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>