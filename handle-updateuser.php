<?php
require "./lib/users.php";
$id =$_POST['id'];
$name =$_POST['name'];
$email=$_POST['email'];
$is_update = updateuser($name,$email,$id);

if($is_update ==1){
    header("location: updateprofile.php");
    echo '<script>alert("Profile Updated")</script>';
}
else{
    echo '<script>alert("fail to Update")</script>';
}
