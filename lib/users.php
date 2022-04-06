<?php
require ("./incl/connection.php");
function adduser($name,$email,$image_url,$password){
    $sql = "INSERT INTO `user`(`name`, `email`,`image_url`, `password`) VALUES ('$name','$email','$image_url','$password')";
    mysqli_query($GLOBALS['connection'],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}

function deleteuser($id){
    $sql = "DELETE FROM `user` WHERE `id`=$id";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]);

}

function updateuser($name,$email,$id){
    $sql = "UPDATE `user` SET `name`= '$name',`email`='$email' WHERE `id`='$id'";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}

function updateuserpassword($id,$password){
    $sql = "UPDATE `user` SET `password`='$password' WHERE `id`='$id'";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}

function showusers(){
    $sql = "SELECT * FROM `user`";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];
}

function searchuser($key){
    $pattern ="%$key%";
    $sql = "SELECT * FROM `user` WHERE `name` LIKE '$pattern'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];
}
function getuserbyid($id){
    $sql = "SELECT * FROM `user` WHERE `user`.`id`='$id'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    $row =mysqli_fetch_assoc($query);
    return $row;

}

?>