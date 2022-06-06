<?php
include('connect.php');
$error = '';
$output = '';
$phase=$_POST['phase'];
if (isset($_POST['submit_sim'])) 
{
if($_POST["sim"]=="" || $_POST["shortsim"]=="")
{
    $error = "<div class='alert alert-danger'>Simulation class is require</div>";
    header("Location:phase-view.php?phase=".$phase."&error=".$error);
}
else
{
$sim = $_POST['sim'];
$shortsim = $_POST['shortsim'];

foreach ($sim as $key => $value) {
$query ="INSERT into sim(sim, shortsim, phase) values('".$value."', '".$shortsim[$key]."','$phase')";
$statement = $connect->prepare($query);
$statement->execute();
$error ="<div class='alert alert-primary'>Simulation class inserted successfully..</div>";
header("Location:phase-view.php?phase=".$phase."&error=".$error);
		 }
	}
}
?>