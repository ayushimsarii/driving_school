<!DOCTYPE html>
<html>
<head>
	<title>Item Bank</title>
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
</head>
<style type="text/css">
	.container
	{
		margin: auto;
		border: 1px solid black;
		margin-top: 10px;
	}
	form
	{
		margin:5px;
		padding: 5px;
	}
	ul
	{
		list-style: none;
	}
	li
	{
		margin: 5px;
		padding: 5px;
	}
	button
	{
		margin: 5px;
		padding: 5px;
	}
	input
	{
		margin: 5px;
		padding: 5px;
	}
	.btn-info
	{
		font-weight: bold;
		font-size: x-large;
	}
</style>

<body>
	<div class="container-fluid">
		<button class="btn btn-info" onclick="add_more()"><i class="fas fa-plus"></i></button>
	</div>




      <div class="container" id="container">
      	<center>
      		<?php include 'add.php' ?>
      		<form action="add.php" method="post" id="gradesheet" name="div">
      			<!--Item input box-->
      			<label>Item</label>
      				<input type="text" name="item" id="item1" value="">
      				   <br>
      				<input type="submit" name="Insert" class="btn btn-primary" value="Insert">
      		</form>
      		<button class="btn btn-primary" onclick="add()"><i class="fas fa-plus"></i></button>
      	    <button class="btn btn-secondary" onclick="remove()"><i class="fas fa-minus"></i></button><br>
      	    <button class="btn btn-success" type="submit"><a href="gradesheet.php">Gradesheet</a></button><br>
      	</center>
      </div>
</body>
<script src="itembank.js"></script>
</html>