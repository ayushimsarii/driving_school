<?php
include('connect.php');
$error = '';
$output = '';
// $phase_id=$_POST['phase_id'];
// $phase=$_POST['phase'];
// $ctp=$_POST['ctp'];
if (isset($_POST['submit_memo'])) 
{
										    
if($_POST["date"]=="" || $_POST["topic"]=="" || $_POST["comment"]=="")
 {
$error = "<div class='alert alert-danger'>Data Is Required</div>";
header("Location:memo.php");
}
else
{
$date = $_POST['date'];
$topic = $_POST['topic'];
$comment = $_POST['comment'];

foreach ($date as $key => $value) {
$query ="INSERT into memo(date, topic, comment) values('".$value."', '".$topic[$key]."','".$comment[$key]."')";
$statement = $connect->prepare($query);
 $statement->execute();
$error ="<div class='alert alert-primary'>Data inserted successfully..</div>";
header("Location:memo.php?");
	}
}
 }
?>