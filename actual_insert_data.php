<?php
include('connect.php');
$error = '';
$output = '';
$phase=$_POST['phase'];
if (isset($_POST['submit_actual'])) 
{
										    
if($_POST["actual"]=="" || $_POST["actualsymbol"]=="")
 {
$error = "<div class='alert alert-danger'>Actual class is require</div>";
header("Location:phase-view.php?phase=".$phase."&error=".$error);
}
else
{
$actual = $_POST['actual'];
$symbol = $_POST['actualsymbol'];

foreach ($actual as $key => $value) {
$query ="INSERT into actual(actual, symbol, phase) values('".$value."', '".$symbol[$key]."','$phase')";
$statement = $connect->prepare($query);
 $statement->execute();
$error ="<div class='alert alert-primary'>Actual class inserted successfully..</div>";
header("Location:phase-view.php?phase=".$phase."&error=".$error);
	}
}
 }
?>