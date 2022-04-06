<?php
require "./lib/answer.php";
$id = $_GET['answerid'];
echo $id;
$deleteanswer = deleteanswer($id);

if($deleteanswer==1){
    header("location: index.php");
}
else{
    echo "error";
}

?>