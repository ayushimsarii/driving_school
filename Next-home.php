<!--Insert Phases-->
<?php

if(isset($_GET['ctp'])){
$ctp=$_GET['ctp'];
}
if(isset($_POST['ctp'])){
$ctp=$_POST['ctp'];

}
require "connect.php";
$error = '';
$output = '';
			$query = "SELECT * FROM phase where ctp='$ctp'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
					$sn=1;
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                        <td>'.$sn++.'</td>
                            <td><a href="phase-view.php?phase_id='.$row["id"].'&phase='.$row["phasename"].'&ctp='.$ctp.'">'.$row["phasename"].'</a></td>
                                <td><a href="phase-update.php?id='.$row["id"].'&ctp='.$ctp.'">Edit</a></td>
                                <td><a href="phase-delete.php?id='.$row["id"].'&ctp='.$ctp.'">Delete</a></td>
                            </td>
                        </tr>';
                    }
                }
                else
                {
                    $output .= '
                        <tr>
                            <td colspan="2">No Data Found</td>
                        </tr>
                    ';
                }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Phase</title>
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
	<link rel="stylesheet" type="text/css" href="style.css">

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
<!--Input Phases-->

<div class="container">

				<center>
				<?php
			if(isset($_POST['ctp']) || isset($_GET['ctp'])){?>
				<h3>Selected CTP:<?php echo $ctp?></h3>
		<?php }
		else{?>
			<h1>Phase</h1>	
		<?php }?>	

			<div class="row">
				<?php 
					if(isset($_REQUEST['error'])){
							$error=$_REQUEST['error'];
							echo $error;
							}
					?>
					<div class="col">
						<center>
							<form class="insert-phases" id="integrity" method="post" action="insert_phase.php">
								<div class="input-field">
									<table class="table table-bordered" id="table-field">
										<tr>
										<?php if(isset($_POST['ctp']) || isset($_GET['ctp'])){?>
											<input type="hidden" name="ctp" value="<?php echo $ctp ?>">
											<?php } ?>
											<td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="phase[] " class="form-control" value="" required /> </td>
											<td><input type="button" name="add_phase" value="Add" id="add_phase" class="btn btn-warning"></td>
										</tr>
									</table>
								</div>
								<center>
									<button class="btn btn-success" type="submit" name="savephase">Submit</button>
								</center>
							</form>	
						</center>
					</div>
				</center>
				</div>

			<!--Phase Table-->
				<center>
					<div class="row">
						<center>
							<table class="table table-striped table-bordered">
								<tr>
									<th>Id</th>
									<th>Phase</th>
									<th colspan="2">Operations</th>
								</tr>
									<?php
										echo $output;
									?>                
							</table>
						</center>
					</div>
			</center>
</div>

<!--Next and Previous Button-->

<div class="container" style="width:70%;">
	<button  class="btn btn-primary" type="submit"><a href="firstctp.php">Previous</a></button>
	<button style="float: right;" class="btn btn-primary" type="submit"><a href="phase-view.php">Next</a></button>
</div>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for add multiple phases-->

<script type="text/javascript">
    $(document).ready(function()
	    {
	        var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="phase[] " class="form-control" value="" required /> </td>\
	                        <td><input type="button" name="remove_actual" value="Remove" id="remove_phase" class="btn btn-danger"></td>\
	                    </tr>'
	        var max = 5;
	        var a = 1;

	        $("#add_phase").click(function()
	        {
	            if(a <= max)
	            {
	                $("#table-field").append(html);
	                a++;
	            }
	        });
	        $("#table-field").on('click','#remove_phase',function()
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