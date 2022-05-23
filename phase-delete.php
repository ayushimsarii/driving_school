<?php
include_once 'connect.php';
$sql = "DELETE FROM phase WHERE id='" . $_GET["id"] . "'";
$statement = $connect->prepare($sql);

            $statement->execute();
            header('Location: Next-home.php?id='.$id);
?>
