<?php
include('connect.php');
$id=$_REQUEST['user_dbid'];
$user_name=$_REQUEST['user_name'];
$user_role=$_REQUEST['user_role'];
$user_id=$_REQUEST['user_id'];
$user_ph=$_REQUEST['user_ph'];
$user_em=$_REQUEST['user_em'];
$query="UPDATE `users`
SET `name` = '$user_name',`role`='$user_role',`std_id`='$user_id',`phone`='$user_ph',`email`='$user_em'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
            $error="added";
          header('Location:edituser-update.php?id='.$id);
            
?>