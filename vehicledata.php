<?php
include_once 'connect.php';
if(isset($_POST['submitvehicle']))
{    

     $VehicleName = $_POST['VehicleName'];
     $VehicleType = $_POST['VehicleType'];
     $VehicleNumber = $_POST['VehicleNumber'];
     $sql = "INSERT INTO vehicle (VehicleName, VehicleType, VehicleNumber)
      VALUES ('$VehicleName','$VehicleType','$VehicleNumber')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     header("Location:userinfo.php?error=You Added Vehicle Successfully");
}
?>