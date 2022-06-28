<?php
include('connect.php');
echo $id=$_POST['id'];
// $percentagetype=$_POST['percentagetype'];
$subitem=$_POST['subitem'];
// $color=$_POST['color'];
$query="UPDATE `sub_item`
SET `subitem` = '$subitem'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:gradesheet.php?error='.$error);
?>