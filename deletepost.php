<?php
require "./incl/connection.php";
require "./lib/posts.php";
session_start();
$_SESSION["question_id"] = $_GET['postid'];
$id = $_GET['postid'];
//echo $id; die;
$delete = deleteposts($id);
if($delete==1){
    header("location: index.php");
}
else{
    echo "ERROR";
}
?>