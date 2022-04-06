<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="./bootstrap-5.1.0-dist/css/bootstrap.min.css"
    />
    <title>Document</title>
</head>
<body>
    <form action="updatepassword.php" method="POST" class="container pt-5">
        <input type="password" name="password" placeholder="new password" class="form-control mb-3">
        <input type="password" name="confirmpassword" placeholder="confirm new password" class="form-control mb-3">
        <button name="submit" class="btn btn-primary mb-3">Update</button>
    </form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
if(empty($_SESSION['user'])){
    header("location: login.php");
  }
require "./lib/users.php";
if(isset($_POST['password'])){
    if($_POST['password']== $_POST['confirmpassword']){
        $is_update = updateuserpassword($_SESSION['user']['id'],$_POST['password']);
        if($is_update==1){
            echo '<script>alert("Updated")</script>';
        }
        else{
            echo '<script>alert("Fail to Update")</script>';
        }
    }
}
?>