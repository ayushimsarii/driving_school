<?php
include_once 'connect.php';
$ctp=$_GET['ctp'];
$id=$_GET["id"];
$sql = "DELETE FROM phase WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
            $error="<div class='alert alert-success'>Data Deleted successfully..</div>";
            header('Location:next-home.php?id='.$id."&error=".$error."&ctp=".$ctp);
?>
