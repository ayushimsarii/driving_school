<?php 
echo $id=$_GET['id'];
include_once 'connect.php';
$sql = "DELETE FROM vehicle WHERE id='$id'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $error="<div class='alert alert-success'>Data Deleted successfully.</div>";
         header('Location:usersinfo.php?error='.$error);
?>