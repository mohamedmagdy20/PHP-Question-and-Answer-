<?php
require "./incl/showposts.php";
require "./lib/answer.php";
require "./lib/posts.php";
require "./lib/users.php";
session_start();
//print_r($_SESSION["question_id"]);
//print_r($_SESSION["Answer_id"]);
//die;
if(empty($_SESSION['user'])){
  header("location: login.php");
}
if(isset($_POST['body'])){
    $question=trim(htmlspecialchars($_POST['body']));
    //echo $answer; die;
    $question= addposts($_POST['body'],$_SESSION['user']['id']);
    if($question==1){
        //echo"Inserted";
        header("location: index.php");
    }
    else{
       echo "ERROR"; 
    }

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
<body class="bg-light">
    <div>
<form action="AddQuestion.php" method="post" class="container pt-5">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ADD Question</label>
    <textarea type="email" class="form-control" cols="30" rows="10" name="body" ></textarea>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <button type="submit" class="btn btn-primary">Add Post</button>
</form>
</div>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>