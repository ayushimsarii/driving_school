<?php
include('connect.php');

echo $id=$_POST['id'];
$actual_new=$_POST['actual_new'];
if(isset($_POST["saveactual"])){
$query="UPDATE `actual`
SET `actual` = '$actual_new'
WHERE `id`='$id'";
var_dump($query);
$statement = $connect->prepare($query);

            $statement->execute();
            $error="added";
            header('Location: All class data.php?id='.$id);
            
     
 }
  

    

    ?>