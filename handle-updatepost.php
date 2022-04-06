<?php
require "./lib/posts.php";
$id =$_POST['id'];
$text =$_POST['body'];
$is_update = updateposts($id,$text);

if($is_update ==1){
    header("location: index.php");
}
elseif($text=" "){
    header("location: index.php");
}
else{
    echo "ERROR";
}

?>