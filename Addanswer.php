<?php
$postid =$_GET['postid'];
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
    <form action="handle-addanswer.php" method="POST" class="container pt-5">
        <textarea name="text" class="form-control" cols="30" rows="10"></textarea>
        <input type="hidden" name="id" value="<?=$postid?>">
        <button name="submit" class="btn btn-primary">Add Answer</button>
    </form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>