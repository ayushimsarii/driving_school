

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style type="text/css">
	.container
	{
		margin: 5px;
		padding: 5px;
	}
	button
	{
		margin: 5px;
		padding: 5px;
	}
	.form-control
	{
		width: 30%;
	}
	label
	{
		margin: 5px;
	}
	/*.row
	{
		border: 1px solid black;
		margin: auto;
	}*/
	a
	{
		color: white;
		text-decoration: none;
	}
</style>
<body>
	<?php
	include 'header.php';
	?>
<div class="container">
	<div class="row">
		<center>
			<form method="post" action="homedatabase.php">
				<label>School/Institute/Group Name</label>
				<input type="text" name="school_name" class="form-control">

				<label>Department/Team Name</label>
				<input type="text" name="department_name" class="form-control">

				<label>Type : Driving, Parking</label>
				<input type="text" name="type" class="form-control">
                 
                <input class="btn btn-success" type="submit" name="save" value="Save/Next">
				<!-- <button class="btn btn-primary" type="submit"><a href="Next-home.php">Next</a></button> -->
			</form>
		</center>
	</div>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>