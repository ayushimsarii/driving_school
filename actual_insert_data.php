<?php
include('connect.php');
$error = '';
$output = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_actual'])) 
{
										    
if($_POST["actual"]=="" || $_POST["actualsymbol"]=="" || $_POST["ptype"]=="" || $_POST["percentage"]=="")
 {
$error = "<div class='alert alert-danger'>Actual class is require</div>";
header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
}
else
{
$actual = $_POST['actual'];
$symbol = $_POST['actualsymbol'];
$ptype = $_POST['ptype'];
$percentage = $_POST['percentage'];

foreach ($actual as $key => $value) {
$query ="INSERT into actual(actual, symbol, ptype, percentage, phase,ctp) values('".$value."', '".$symbol[$key]."','".$ptype[$key]."','".$percentage[$key]."','$phase','$ctp')";
$statement = $connect->prepare($query);
 $statement->execute();
$error ="<div class='alert alert-primary'>Actual class inserted successfully..</div>";
header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
	}
}
 }
?>