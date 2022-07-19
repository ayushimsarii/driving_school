<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Descipline Log</title>
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
$classcolor= "SELECT * FROM gradesheet where user_id='$student'";
$classcolorst= $connect->prepare($classcolor);
$classcolorst->execute();

if($classcolorst->rowCount() > 0)
    {
        $class="btn btn-success";
    }
    else{
        $class="btn btn-dark"; 
    }
    
?>
<div class="container">
	<center>
		<div class="row">
		
		<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
			<h4>Descipline Log</h4>
			<div>
				Student name : <?php echo $fetchname?><br>
				Course name : <?php echo $std_course?>
			</div>
			<form class="insert-descipline" id="" method="post" action="insert_descipline.php">
							<label class="form-label" for="aue">Question</label>
							<input type="text" name="que[] " class="form-control" value="" required />
						
							<label class="form-label" for="ans">Answer</label>
							<input type="text" name="ans[] " class="form-control" value="" required />
						
							<button type="button" name="add_" id="add_emer" class="btn btn-warning"><i class="fas fa-plus-circle"></i></button>
						<br>
			</form>
			<center>
					<button class="btn btn-success" type="submit" name="savedescipline">Submit</button>
	            </center>
		</div>
    </center>
</div>


<?php
 include_once 'footer.php';
 ?>
</body>
</html>