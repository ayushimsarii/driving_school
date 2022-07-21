<?php
include('connect.php');
echo $id=$_POST['id'];
// $percentagetype=$_POST['percentagetype'];
$item=$_POST['item'];
// $color=$_POST['color'];
$query="UPDATE `itembank`
SET `item` = '$item'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:gradesheet.php?error='.$error);
?>