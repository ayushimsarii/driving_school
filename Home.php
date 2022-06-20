

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
	<link rel="stylesheet" href="sidestyle.css">
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
			<?php 
			$q1 = "SELECT * FROM homepage where user_id=$user_id";
            $st1 = $connect->prepare($q1);
            $st1->execute();
		
			if($st1->rowCount() > 0){
				$result = $st1->fetchAll();
				foreach($result as $row)
                    { ?>
						<label>School/Institute/Group Name</label>
						<input type="text" name="school_name" readonly value="<?php echo $row['school_name']?>" class="form-control"><br>
		
						<label>Department/Team Name</label>
						<input type="text" name="department_name" readonly value="<?php echo $row['department_name']?>" class="form-control"><br>
		
						<label>Type : Driving, Parking</label>
						<input type="text" name="type" readonly value="<?php echo $row['type']?>" class="form-control"><br>	
						<a class="btn btn-success" href="firstctp.php">Save/Next</a><br>
				
				<?php 	}
			}else{
			
			?>	
			<form method="post" action="homedatabase.php">
			<input type="hidden" name="user_id" value="<?php echo $user_id ?>" class="form-control"><br>
				<label>School/Institute/Group Name</label>
				<input type="text" name="school_name" class="form-control" required><br>

				<label>Department/Team Name</label>
				<input type="text" name="department_name" class="form-control" required><br>

				<label>Type : Driving, Parking</label>
				<input type="text" name="type" class="form-control" required><br>
                 
                <input class="btn btn-success" type="submit" name="save" value="Save/Next"><br>
				<!-- <button class="btn btn-primary" type="submit"><a href="Next-home.php">Next</a></button> -->
			</form>
			<?php } ?>
		</center>
	</div>
</center>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>