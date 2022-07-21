<?php
include('connect.php');
$error = '';
$output = '';
// $phase_id=$_POST['phase_id'];
// $phase=$_POST['phase'];
// $ctp=$_POST['ctp'];
if (isset($_POST['submit_discipline'])) 
{
										    
if($_POST["date"]=="" || $_POST["topic"]=="" || $_POST["comment"]=="")
 {
$error = "<div class='alert alert-danger'>Discipline Is Required</div>";
header("Location:discipline.php");
}
else
{
$date = $_POST['date'];
$topic = $_POST['topic'];
$comment = $_POST['comment'];

foreach ($date as $key => $value) {
$query ="INSERT into discipline(date, topic, comment) values('".$value."', '".$topic[$key]."','".$comment[$key]."')";
$statement = $connect->prepare($query);
 $statement->execute();
$error ="<div class='alert alert-primary'>Discipline inserted successfully..</div>";
header("Location:discipline.php?");
	}
}
 }
?>