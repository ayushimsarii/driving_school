<?php
include('connect.php');

echo $id=$_POST['id'];
$upt_name=$_POST['upt_name'];
if(isset($_POST["saveit"])){
$query="UPDATE `phase`
SET `phasename` = '$upt_name'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
            $error="<div class='alert alert-success'>Data Updated successfully..</div>";
            header('Location: phase-update.php?id='.$id."&error=".$error);
            
     
 }
  

    

    ?>