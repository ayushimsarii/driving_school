<?php
include_once 'connect.php';
if(isset($_POST['submitvehicle']))
{    

     $VehicleName = $_POST['VehicleName'];
     $VehicleType = $_POST['VehicleType'];
     $VehicleNumber = $_POST['VehicleNumber'];
     $VehicleSpot = $_POST['VehicleSpot'];
     $sql = "INSERT INTO vehicle (VehicleName, VehicleType, VehicleNumber, VehicleSpot)
      VALUES ('$VehicleName','$VehicleType','$VehicleNumber', '$VehicleSpot')";

     $statement = $connect->prepare($sql);

     $statement->execute();
     header("Location:userinfo.php?error=You Added Vehicle Successfully");
}
?>