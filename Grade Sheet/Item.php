<?php 
include('connect.php');
echo $item=$_REQUEST['item'];
$sql = "INSERT INTO itembank (item) VALUES ('".$item."')";

							$statement = $connect->prepare($sql);

							$statement->execute();
							header('location:demo1.php');
?>