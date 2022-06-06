<?php
include_once 'connect.php';
$sql = "DELETE FROM roles WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
         header('Location:roles.php');
?>