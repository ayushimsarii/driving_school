<!DOCTYPE html>
<html>
<head>
	<title>Class Report</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
	include_once 'sidenavbar.php';
	?>
<div class="container">
    <center>
			<div class="row">
				<h4>Class Summary Report</h4>
				<div>
					Student name : <?php echo $fetchname?><br>
					Course name : <?php echo $std_course?>
				</div>
			</div>
    </center>
</div>


<?php
 include_once 'footer.php';
 ?>
</body>
</html>