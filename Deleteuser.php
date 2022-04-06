<?php
require "./lib/users.php";
$id = $_GET['id'];
$delete =deleteuser($id);
if($delete==1){
    header("location: users.php");
}
else{
    echo '<script>alert("Fail to Delete")</script>';
}


?>