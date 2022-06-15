<?php 
echo $Courseid=$_GET['Courseid'];
include_once 'connect.php';
$sql = "DELETE FROM newcourse WHERE Courseid='$Courseid'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $error="<div class='alert alert-success'>Data Deleted successfully.</div>";
         header('Location:usersinfo.php?error='.$error);
?>