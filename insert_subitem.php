<?php 
include('connect.php');
echo $item=$_REQUEST['subitem'];
$sql = "INSERT INTO subitem (subitem) VALUES ('".$item."')";

							$statement = $connect->prepare($sql);

							$statement->execute();
							header('location:gradesheet.php');
?>