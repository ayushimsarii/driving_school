<?php
include('connect.php');
echo $id=$_POST['Courseid'];
$CourseName=$_POST['CourseName'];
$CourseNumber=$_POST['CourseNumber'];
$Symbol=$_POST['Symbol'];
$StudentNames=$_POST['StudentNames'];
$CourseManager=$_POST['CourseManager'];
$DrivingPhaseManager=$_POST['DrivingPhaseManager'];
$ParkingPhaseManager=$_POST['ParkingPhaseManager'];
$query="UPDATE `newcourse`
SET `CourseName` = '$CourseName',`CourseNumber`='$CourseNumber',`Symbol`='$Symbol',`StudentNames`='$StudentNames',`CourseManager`='$CourseManager',`DrivingPhaseManager`='$DrivingPhaseManager',`ParkingPhaseManager`='$ParkingPhaseManager'
WHERE `Courseid`='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:usersinfo.php?error='.$error);
?>