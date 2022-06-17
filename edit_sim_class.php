<?php
include('connect.php');
echo $id=$_POST['id'];
$actual=$_POST['sim'];
$symbol=$_POST['shortsim'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
$ptype=$_POST['ptype'];
$percentage=$_POST['percentage'];
$query="UPDATE `sim`
SET `sim` = '$sim',`shortsim`='$shortsim',`phase`='$phase',`ctp`='$ctp',`ptype`='$ptype',`percentage`='$percentage'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:phase-view.php?error='.$error);
?>