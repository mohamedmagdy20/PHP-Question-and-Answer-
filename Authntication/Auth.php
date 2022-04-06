<?php
require "./incl/connection.php";
function Check($email,$password){
    $sql= "SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    $row =mysqli_fetch_assoc($query);
    return $row;

}
?>