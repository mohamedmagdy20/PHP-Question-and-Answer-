<?php
require("./incl/connection.php");

function addanswer($answer,$postid,$userid){
    $sql = "INSERT INTO answer (answer,post_id,user_id) VALUES ('$answer',$postid,$userid)";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}
function deleteanswer($id){
    $sql = "DELETE FROM `answer` WHERE `answer`.`id`=$id";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]);
}

function updateanswer($answer,$id){
    $sql = "UPDATE `answer` SET `answer`= '$answer'WHERE `id`='$id'";
    mysqli_query($GLOBALS["connection"],$sql);
    return mysqli_affected_rows($GLOBALS["connection"]); 
}

function showanswer(){
    $sql = "SELECT `user`.`id`,`user`.`name` AS username, `answer`.`user_id` ,`answer`.`answer`,`answer`.`date`, `answer`.`post_id`, `posts`.`id`,`answer`.`id` FROM `answer`,`user`,posts WHERE `answer`.`user_id` = `user`.`id` AND `answer`.`post_id`= `posts`.`id`";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];
}

function getanswerbyid($id){
    $sql = "SELECT * FROM `answer`WHERE `answer`.`id`= '$id' ";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    $row =mysqli_fetch_assoc($query);
    return $row;

}
?>