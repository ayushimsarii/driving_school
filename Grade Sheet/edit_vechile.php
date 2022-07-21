<?php
include('connect.php');
echo $id=$_POST['payid'];
$vec_name=$_POST['vec_name'];
$vec_type=$_POST['vec_type'];
$vec_nub=$_POST['vec_nub'];
$query="UPDATE `vehicle`
SET `VehicleName` = '$vec_name',`VehicleType`='$vec_type',`VehicleNumber`='$vec_nub'
WHERE `id`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:usersinfo.php?error='.$error);
?>