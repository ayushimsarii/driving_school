<?php
include('connect.php');

echo $id=$_POST['id'];
$upt_name=$_POST['upt_name'];
if(isset($_POST["saveit"])){
$query="UPDATE `phase`
SET `phase` = '$upt_name'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
            $error="added";
            header('Location: edit.php?id='.$id);
            
     
 }
  

    

    ?>