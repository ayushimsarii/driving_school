<?php
include('connect.php');
echo $id=$_POST['CTPid'];
$course=$_POST['course'];
$manual=$_POST['manual'];
$CourseCode=$_POST['CourseCode'];
$Sponcors=$_POST['Sponcors'];
$Location=$_POST['Location'];
$CourseAim=$_POST['CourseAim'];
$ClassSize=$_POST['ClassSize'];
$query="UPDATE `ctppage`
SET `course` = '$course',`manual`='$manual',`CourseCode`='$CourseCode',`Sponcors`='$Sponcors',`Location`='$Location',`CourseAim`='$CourseAim',`ClassSize`='$ClassSize'
WHERE `CTPid`='$id'";
echo $query;
$statement = $connect->prepare($query);
$statement->execute();
$error="<div class='alert alert-success'>Data edited successfully..</div>";

header('Location:usersinfo.php?error='.$error);
?>