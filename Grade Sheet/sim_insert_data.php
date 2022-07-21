<?php
include('connect.php');
$error = '';
$output = '';
$phase_id=$_POST['phase_id'];
$phase=$_POST['phase'];
$ctp=$_POST['ctp'];
if (isset($_POST['submit_sim'])) 
{
if($_POST["sim"]=="" || $_POST["shortsim"]=="" || $_POST["ptype"]=="" || $_POST["percentage"]=="")
{
    $error = "<div class='alert alert-danger'>Simulation class is require</div>";
    header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
}
else
{
$sim = $_POST['sim'];
$shortsim = $_POST['shortsim'];
$ptype = $_POST['ptype'];
$percentage = $_POST['percentage'];

foreach ($sim as $key => $value) {
$query ="INSERT into sim(sim, shortsim, ptype, percentage, phase,ctp) values('".$value."', '".$shortsim[$key]."','".$ptype[$key]."','".$percentage[$key]."','$phase_id','$ctp')";
$statement = $connect->prepare($query);
$statement->execute();
$error ="<div class='alert alert-primary'>Simulation class inserted successfully..</div>";
header("Location:phase-view.php?phase_id=".$phase_id."&error=".$error."&ctp=".$ctp."&phase=".$phase);
		 }
	}
}
?>