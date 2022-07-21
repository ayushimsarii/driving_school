<?php
include('connect.php');
echo $id=$_POST['id'];
$test=$_POST['test'];
$shorttest=$_POST['shorttest'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
$ptype=$_POST['ptype'];
$percentage=$_POST['percentage'];
$query="UPDATE `test`
SET `test` = '$test',`shorttest`='$shorttest',`phase`='$phase',`ctp`='$ctp',`ptype`='$ptype',`percentage`='$percentage'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:phase-view.php?error='.$error);
?>