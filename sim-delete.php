<?php
include_once 'connect.php';
$sql = "DELETE FROM sim WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
            header('Location: phase-view.php?id='.$id);
?>