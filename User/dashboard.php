<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- <link rel="stylesheet" href="style.css" /> -->
</head>
<style type="text/css">
input
	{
		margin: 5px;
		padding: 5px;
		/*width: auto;*/
	}
	/*.row
	{
		border: 1px solid black;
		border-radius: 15px;
	}*/
	.container
	{
		margin-top: 10px;
	}
  td,
  th
  {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 5px;
    
    text-align: center;
  }
  table
  {
    margin: auto;
    margin-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
  ::placeholder 
  { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
    font-weight: bold;
    font-size: larger; 
}
a
{
	text-decoration: none;
	color: white;
}
</style>
<body>

	<div class="container">
        <p>Hey, <?php echo $_SESSION['username']; ?>! You are now user dashboard page.</p><p class="btn btn-danger"><a href="logout.php">Logout</a></p>
    </div>


	<div class="container">
      	<div class="row">
      		<div class="col">
      			<table>
      				<tr>
      					<td><label>UP</label><input type="text" name="up" placeholder= <?php echo $_SESSION['username']; ?> ></td>
      					<td><label>Ride</label><input type="text" name="ride"></td>
      				</tr>
      				<tr>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      			</tr>
	      			<tr>
	      				<td><label>Instructor</label><input type="text" name="ins"></td>
	      				<td><label>Time</label><input type="time" name="time"></td>
	      			</tr>
	      			<tr>
		      			<td><label>Vehicle Number</label><input type="Number" name="veh"></td>
		      			<td><label>Position</label><input type="text" name="pos"></td>
		      		</tr>
      		    </table>
      		</div>

      		<div class="col">
      			<h4>Prereuisites</h4>
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      		</div>
      	</div>
      </div>

      <div class="container">
      	<h2>PHASE 1</h2>
      	<div>
      		<button class="btn btn-success">Actual</button>
      		<button class="btn btn-success"><a href="sim.php">Sim</a></button>
      	</div>
      </div>
</body>
</html>