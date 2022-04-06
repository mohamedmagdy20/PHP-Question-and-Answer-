<?php
session_start();
require "./lib/answer.php";
if(empty($_SESSION['user'])){
  header("location: login.php");
}
$id = $_GET['answerid'];
$row = getanswerbyid($id);
//print_r($row);
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
<form action="./handle-updateanswer.php" method="POST" class="container pt-5">
    <textarea name="body" cols="30" rows="10" class="form-control" placeholder="<?=$row['answer']?>"></textarea>
    <input type="hidden" name="id" value="<?= $row['id']?>">
    <button class="btn btn-primary mt-3">Update</button>
</form>

<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>   
</body>
</html>