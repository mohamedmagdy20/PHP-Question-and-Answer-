<?php
session_start();
if(empty($_SESSION['user'])){
    header("location: login.php");
  }
require "./lib/users.php";
$data = getuserbyid($_SESSION['user']['id']);
//print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .img{
            width: 150px;
        }
    </style>
    <link
      rel="stylesheet"
      href="./bootstrap-5.1.0-dist/css/bootstrap.min.css"
    />
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="text-center pt-5">
        <img src="./uploads/<?=$data['image_url']?>" class="rounded-circle border border-3 img" alt="">
    </div>
    <form action="handle-updateuser.php" method="POST" class="container pt-4">
        <input type="text" name="name" class="form-control mt-3" value="<?=$data['name']?>">
        <input type="email" name="email" class="form-control mt-3" value="<?=$data['email']?>">
        <input type="hidden" name="id" class="form-control mt-3" value="<?=$data['id']?>">
       
        <button class="btn btn-warning mt-3" name="submit">Update</button>
        <a href="./updatepassword.php" class="btn btn-info mt-3">Change Password</a>
    </form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>