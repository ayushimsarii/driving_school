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
<?php 
						if(isset($_GET['ctp'])){
							$ctp=$_GET['ctp'];
              $ctp_id = "SELECT * FROM ctppage where CTPid='$ctp'";
              $statement = $connect->prepare($ctp_id);
              $statement->execute();

              if($statement->rowCount() > 0)
                {
                  $result = $statement->fetchAll();
                  $sn=1;
                  foreach($result as $row)
                  {
                    $course=$row['course'];
                  }
                }
						}
						if(isset($_GET['phase_id'])){
							$phase_id="";
							 $phase_id=$_GET['phase_id'];
						}	
					if(isset($_GET['phase'])){
						$phase="";
						$phase=$_GET['phase'];
					}
					?>
<center>
<div class="container">
	
		<div class="row" style="width:80%;">
		
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
				<center>
				<form class="insert-phases" id="discipline" method="post" action="insert_discipline_data.php">
						<div class="input-field">
								<table class="table table-bordered" id="table-field-discipline">
									<tr>
										<!-- <input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
										<input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
										<input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>"> -->
											<td><input type="date" name="date[]" class="form-control" placeholder="Enter Date"></td>
											<td><input maxlength="20" type="text" name="topic[]" class="form-control" placeholder="Topic"></td>
											<td style="width:50%;"><textarea style="height:20px; width:100%;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment"></textarea></td>
											<td><button type="button" name="add_discipline" id="add_discipline" class="btn btn-outline-success"><i class="fas fa-plus-circle"></i></button></td>
									</tr>
								</table>
									<button class="btn btn-success" type="submit" name="submit_discipline">Save</button>
						</div>
				</form>	
				</center>
		</div>
    
</div>
</center>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for adding multiple actual classes-->

 <script type="text/javascript">
		 	$(document).ready(function()
		 	{
			 		var html = '<tr>\
					                <td><input type="date" name="date[]" class="form-control" placeholder="Enter Date"></td>\
									<td><input maxlength="20" type="text" name="topic[]" class="form-control" placeholder="Topic"></td>\
									<td><textarea style="height:20px;" maxlength="100" type="text" name="comment[]" class="form-control" placeholder="Comment"></textarea></td>\
									<td><button type="button" name="remove_discipline" id="remove_discipline" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i></button></td>\
								</tr>'
				    var max = 5;
					var a = 1;

					$("#add_discipline").click(function()
					{
						if(a <= max)
						{
							$("#table-field-discipline").append(html);
							a++;
						}
					});
					$("#table-field-discipline").on('click','#remove_discipline',function()
					{
						$(this).closest('tr').remove();
						a--;
					});
		 	});
 </script>
<?php
 include_once 'footer.php';
 ?>
</body>
</html>