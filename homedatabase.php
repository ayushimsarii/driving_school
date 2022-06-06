<?php
include("connect.php");
if(isset($_POST['save']))
{	 
	 $school_name = $_POST['school_name'];
     $department_name = $_POST['department_name'];
     $type = $_POST['type'];
	 $sql = "INSERT INTO `homepage` (school_name, department_name, type) VALUES ('$school_name', '$department_name', '$type')";
	 $statement = $connect->prepare($sql);
	 $statement->execute();
	 $error="<div class='alert alert-success'>Data inserted successfully</div>";
	 header("Location:Home.php?error=".$error);
}

?>