<?php
require "./incl/connection.php";

require "./incl/showposts.php";
require "./lib/answer.php";
session_start();
if(empty($_SESSION['user'])){
    header("location: login.php");
}
$answer = $_POST['text'];
$id =$_POST['id'];
// echo $answer ." ".$id;
// print_r($_SESSION['user']['id']);
//die; 
    if(isset($_POST['submit']) && !empty($answer)){
         $isadd = addanswer($answer,$id,$_SESSION['user']['id']);
        if($isadd == 1){
            header("location: index.php");
        }
        else{
         echo "<script>alert('Fail to Add');</script>";
         header("location: Addanswer.php");
        }
}