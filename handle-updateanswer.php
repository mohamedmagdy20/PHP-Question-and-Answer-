<?php
require "./lib/answer.php";
$id = $_POST['id'];
$body =$_POST['body'];
$is_update =updateanswer($body,$id);
if($is_update ==1 ){
    header("location: index.php");
}
elseif($body=""){
    header("location: index.php");
}
else{
    echo "ERROR";
}

?>