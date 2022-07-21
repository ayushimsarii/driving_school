<?php
include('connect.php');
echo $id=$_POST['id'];
$school_name=$_POST['school_name'];
$department_name=$_POST['department_name'];
$type=$_POST['type'];
$query="UPDATE `homepage`
SET `school_name` = '$school_name',`department_name`='$department_name',`type`='$type'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:usersinfo.php?error='.$error);
?>