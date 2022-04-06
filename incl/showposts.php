<?php 
require("./incl/connection.php");

function Show(){
    $sql = "SELECT `posts`.`id` ,`user`.`name`,`posts`.`body`,`posts`.`date`,`posts`.`user_id` FROM `user`,`posts` WHERE user.id =posts.user_id";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];

}
function Search($key){
    $pattern ="%$key%";
    $sql ="SELECT `user`.`name`,`posts`.`body`,`posts`.`date`,`posts`.`user_id`,`posts`.`id` FROM `user`,`posts` WHERE user.id =posts.user_id AND `posts`.`body` LIKE '$pattern'";
    $query =mysqli_query($GLOBALS["connection"],$sql);
    while($row = mysqli_fetch_assoc($query)){
        $data[]= $row;
    }
    return (!empty($data))?$data:[];

}
?>