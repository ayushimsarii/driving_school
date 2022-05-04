<!DOCTYPE html>
<html>
<head>
	<title>Actual Page</title>
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
		border: 1px solid black;
		margin-top: 10px;
	}
	button
	{
		margin: 5px;
		padding: 5px;
	}
	h3
	{
		text-align: center;
	}
	p
	{
		width: 50px;
		height: 50px;
		border: 1px solid black;
	}
	textarea
	{
		margin: 5px;
		padding: 5px;
		width: 250px;
		height: 150px;
	}
	a
	{
		color: white;
		text-decoration: none;
	}
</style>
<body>

<div class="container">
	<h3>Actual Page</h3>
	<div class="row">
		<div class="col">
			<?php
          
                        // session_start();
                        $conn = mysqli_connect("localhost","root","","class");
                        $select = mysqli_query($conn, "SELECT * FROM actual");
                        if (mysqli_num_rows($select) > 0) { $i=1;
                        while($row = mysqli_fetch_assoc($select)) { 
                        ?>
                        
                        			<div class="btn-group" style="width:100%">
									  <button style="width:30%"><?php echo $row['shortactual'];?></button>
									</div>
                        				
                        		
                        <?php 
                        $i++; 
                      } 
                    }
                        ?>
		</div>

		<div class="col">
			<div>
				<p></p>
				<input type="date" name="date">
			</div>
			<div style="border: 1px solid black; width: 50%; text-align: center; margin: 5px;
			padding: 5px;">
				<textarea>Student Haves</textarea><br>
				<textarea>Class # Select</textarea><br>
				<textarea>Send A Message</textarea>
			</div>
		</div>
	</div>
</div>

 <div class="container-fluid">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="">Next</a></button>
    </div>
</body>
</html>