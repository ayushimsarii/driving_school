<?php 
echo $CTPid=$_GET['CTPid'];
include_once 'connect.php';
$sql = "DELETE FROM ctppage WHERE CTPid='$CTPid'";
$statement = $connect->prepare($sql);

            $statement->execute();
      
         $error="<div class='alert alert-success'>Data Deleted successfully.</div>";
         header('Location:usersinfo.php?error='.$error);
?>