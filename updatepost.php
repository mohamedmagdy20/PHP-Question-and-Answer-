<?php
session_start();
if(empty($_SESSION['user'])){
  header("location: login.php");
}
require "./lib/posts.php";
$id = $_GET['postid'];
//echo $id;
$data = getpostbyid($id);
// print_r($data);
// die;
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
<body class="bg-light">
<form action="handle-updatepost.php" method="post" class="container pt-5">
  <div class="mb-3">
    <label class="form-label">Update Post</label>
    <input type="text" value="<?= $data['body']?>" name="body" class="form-control">
    <div id="text" class="form-text">We'll never share your info with anyone else.</div>
  </div>
  <input type="hidden" name="id" value=<?=$data['id'];?>>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>