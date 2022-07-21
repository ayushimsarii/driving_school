<?php
include('connect.php');
echo $id=$_POST['id'];
// $percentagetype=$_POST['percentagetype'];
$percentage=$_POST['percentage'];
// $color=$_POST['color'];
$query="UPDATE `percentage`
SET `percentage` = '$percentage'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:usersinfo.php?error='.$error);
?>