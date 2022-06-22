<?php
include_once 'connect.php';
if(isset($_POST['submitpercentage']))
{    

     $percentagetype = $_POST['percentagetype'];
     $percentage = $_POST['percentage'];
     $color = $_POST['color'];
     $sql = "INSERT INTO percentage (percentagetype, percentage, color)
      VALUES ('$percentagetype','$percentage','$color')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     $error="<div class='alert alert-success'>Vechile added successfully..</div>";
 
     header("Location:usersinfo.php?error=".$error);
}
?>