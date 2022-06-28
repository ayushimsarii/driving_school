<?php 
echo $id=$_GET['id'];
include_once 'connect.php';
$sql = "DELETE FROM itembank WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $error="<div class='alert alert-success'>Data Deleted successfully.</div>";
         header('Location:gradesheet.php?error='.$error);
?>