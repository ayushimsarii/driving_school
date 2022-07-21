<?php 
include('connect.php');
echo $item=$_REQUEST['subitem'];
$sql = "INSERT INTO sub_item (subitem) VALUES ('".$item."')";

							$statement = $connect->prepare($sql);

							$statement->execute();
							header('location:demo1.php');
?>