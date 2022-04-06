<?php
require("./incl/connection.php");

function addposts($body,$user_id){
    $sql = "INSERT INTO `posts`(`body`,`user_id`) VALUES ('$body','$user_id')";
    mysqli_query($GLOBALS['connection'],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}
function deleteposts($id){
    $sql = "DELETE FROM `posts` WHERE `posts`.`id`='$id'";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]);
}

function updateposts($id,$body){
    $sql = "UPDATE `posts` SET `posts`.`body`='$body' WHERE `posts`.`id`='$id'";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}

function showposts(){
    $sql = "SELECT * FROM `posts`";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];
}
    
function getpostbyid($id){
    $sql = "SELECT * FROM `posts` WHERE `posts`.`id`='$id'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    $row =mysqli_fetch_assoc($query);
    return $row;

}
function searchposts($key){
    $pattern ="%$key%";
    $sql = "SELECT * FROM `posts` WHERE `body` LIKE '$pattern'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];
}

?>