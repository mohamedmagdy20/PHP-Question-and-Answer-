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
  $posts = Search($_POST['search']);
  $answers = showanswer();
}
else{
  $posts =Show();
  $answers = showanswer();
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
    <style>
        .form-control{
            width: 500px !important;
        }
    </style>
    <title>Document</title>
</head>
<body class="pb-5">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Question&Answer</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="index.php" method="POST" class="d-flex m-auto">
        <input class="form-control  me-1" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php if($_SESSION['user']['password']=='$2y$10$p/pB'): ?>
      <a href="./users.php"  class="btn btn-outline-info me-2">Show Users</a>
      <?php endif; ?>
      <?php if(empty($_SESSION['user'])):?>
      <a href="./login.php"  class="btn btn-outline-secondary ">Login</a>
      <?php endif;?>
      <a href="./logout.php" class="btn btn-outline-danger ms-2">Logout</a>
    </div>

  </div>
</nav>
<nav class="navbar navbar-light bg-light">
  <form class="container justify-content-start">
    <a href="./AddQuestion.php" class="btn btn-sm btn-secondary me-2">ADD New Question</a>  
    <a href="./updateprofile.php" class="btn btn-sm btn-warning">Update profile info</a>
  </form>
</nav>
<?php foreach($posts as $post):?>
  
<div class="container  pt-5 ">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div>
          <?= $post['name']?>
          <img src="./uploads/<?=$post['image_url']?>" class="rounded-circle w-25">
        </div>
        <div><?= date("d M, Y h:i a", strtotime($post['date']))?></div>
      </div>
      <div class="card-body">
        <div>
        <h5 class="card-title"><?=$post['body']?></h5>
        <a href="./Addanswer.php?postid=<?=$post['id'];?>" class="btn btn-primary">Add Answer</a>
      
        <?php if($_SESSION['user']['id'] == $post['user_id'] ): ?>
        <a href="./updatepost.php?postid=<?= $post['id']?>" class="btn btn-warning">Update</a>
        <a href="./deletepost.php?postid=<?= $post['id']?>" class="btn btn-danger">delete</a>
        <?php endif;?>
        </div>
        <?php foreach($answers as $answer):?>
         <?php  if( $answer['post_id']== $post['id']):?>
          <div class="card container mt-3 mb-4 pt-3 pb-3">
            <div class="d-flex justify-content-between">
            <h6><?= $answer['username']?></h6>
           
            <h6><?= date("d M, Y h:i a", strtotime($answer['date']))?></h6>
            </div>
            <p class="card-text"><?= $answer['answer']?></p>
            <?php if( $_SESSION['user']['id'] == $answer['user_id'] ): ?>
            <div class="mt-2">
            <a href="./update_answer.php?answerid=<?=$answer['id']?>"class="btn btn-sm btn-warning">Update</a>
            <a href="./delete_answer.php?answerid=<?=$answer['id']?>" class="btn btn-sm btn-danger">delete</a>
            </div>
            <?php endif;?>    
          </div>  
          <?php endif;?>
        <?php endforeach;?>      
      </div>      
     
</div>
</div>
<?php endforeach;?>


<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>