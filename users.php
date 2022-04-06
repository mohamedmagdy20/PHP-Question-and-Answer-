<?php
require "./incl/connection.php";
require "./incl/showposts.php";
require "./lib/answer.php";
require "./lib/posts.php";
require "./lib/users.php";
session_start();  
if(empty($_SESSION['user'])){
  header("location: login.php");
}
if(isset($_POST['search'])){
    $data = searchuser($_POST['search']);
}
else{
    $data = showusers();
}
?>
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
<div class="container pt-5">
        <div><a class="btn btn-primary mb-3 " href="./Adduser.php"> ADD New User </a></div>
        <form action="./users.php" method="post">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <button class="btn btn-primary mt-3">search</button>
        </form>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach($data as $row):?>
        <tr>
          <th scope="row"><?=$row['name'];?></th>
          <td><?=$row['email'];?></td>
          <td><?=$row['password'];?></td>
          <td><a class="btn btn-danger" href="Deleteuser.php?id=<?=$row['id'];?>">Delete</a></td>
        </tr>
        <tr>
        <?php endforeach;?>
    
       </tbody>
    </table>
    </div>
    <script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script> 

</body>
</html>