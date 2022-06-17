<?php 
echo $id=$_GET['id'];
include_once 'connect.php';
$sql = "DELETE FROM academic WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $error="<div class='alert alert-success'>Data Deleted successfully.</div>";
         header('Location:phase-view.php?error='.$error);
?>