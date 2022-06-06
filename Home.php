

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
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	include 'header.php';
	?>
	<?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>
	<br>

<div class="container">

	<center>
	<div class="row">
		<center>
		<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
				<br><br>
			<form method="post" action="homedatabase.php">
				<label>School/Institute/Group Name</label>
				<input type="text" name="school_name" class="form-control"><br>

				<label>Department/Team Name</label>
				<input type="text" name="department_name" class="form-control"><br>

				<label>Type : Driving, Parking</label>
				<input type="text" name="type" class="form-control"><br>
                 
                <input class="btn btn-success" type="submit" name="save" value="Save/Next"><br>
				<!-- <button class="btn btn-primary" type="submit"><a href="Next-home.php">Next</a></button> -->
			</form>
		</center>
	</div>
</center>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>