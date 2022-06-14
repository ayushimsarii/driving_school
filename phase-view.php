
<!DOCTYPE html>
<html lang="en">
<head>
<title>Class</title>
<!-- <title>Phase</title> -->
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
			include_once 'header.php';
			
			?>
				<?php
				if($role =='super admin'){
				include_once 'sidenavbar.php';
				}
				?>
					<!--Fetching Phase Name-->
					<?php 
						if(isset($_GET['ctp'])){
							$ctp=$_GET['ctp'];
						}
						if(isset($_GET['phase_id'])){
							$phase="";
							 $phase_id=$_GET['phase_id'];
						}	
					if(isset($_GET['phase'])){
						$phase="";
						$phase=$_GET['phase'];
					?>
						
					<div class="container">
					<center>
           			<h3 style="color:red"><?php echo 'phase name/ctp name<br>'.$_GET['phase'].'/'.$ctp ?> </h3>	</center>
         	 </div>
		<?php }  ?>

			<div class="container">
			<center>
				<div class="row">
				<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
					<!--Adding actual Classes-->
						<h3>Class : <span>Actual</span></h3>
							<form class="insert-phases" id="actual" method="post" action="actual_insert_data.php">
									<div class="input-field">
										<table class="table table-bordered" id="table-field-actual">
													<tr>
													<input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
													<input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
													<input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
														<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?" required=""></td>
														<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control"></td>
														<td><input type="button" name="add_actual" value="Add" id="add_actual" class="btn btn-warning"></td>
													</tr>
										</table>
										</div>
										<center>
											<button class="btn btn-success" type="submit" name="submit_actual">Save</button>
										</center>
							</form>	
				</div>
			</center>
		</div>

<!--Adding Simulation Classes-->
<div class="container">
  <center>
    <div class="row">
    		<h3>Class : <span>Simulation</span></h3>
		    		<form class="insert-phases" id="sim" method="post" action="sim_insert_data.php">
							<div class="input-field">
								<table class="table table-bordered" id="table-field-sim">
									<tr>
									<input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
													<input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
													<input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
										<td style="text-align: center;"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>
										<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control"></td>
										<td><input type="button" name="add_sim" value="Add" id="add_sim" class="btn btn-warning"></td>
									</tr>
								</table>
								</div>
								<center>
									<button class="btn btn-success" type="submit" name="submit_sim">Save</button>
								</center>
						</form>	
	  </div>
	</center>
</div>

<!--Adding Academic classes-->
<div class="container">
  <center>
    <div class="row">
    		<h3>Class : <span>Academic</span></h3>
		    	<form class="insert-phases" id="academic" method="post" action="academic_insert_data.php">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-academic">
									<tr>
									<input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
													<input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
													<input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
										<td style="text-align: center;"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>
										<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control"></td>
										<td><input type="button" name="add_academic" value="Add" id="add_academic" class="btn btn-warning"></td>
									</tr>
								</table>
							</div>
							<center>
								<button class="btn btn-success" type="submit" name="submit_academic">Save</button>
							</center>
					</form>	
    </div>
  </center>
</div>

<!--Previous and Next Button-->

    <div class="container">
			<button  class="btn btn-primary" type="submit"><a href="Next-home.php">Previous</a></button>
			<button style="float: right;" class="btn btn-primary" type="submit"><a href="actual.php">Next</a></button>
    </div>

 <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for adding multiple actual classes-->

 <script type="text/javascript">
		 	$(document).ready(function()
		 	{
			 		var html = '<tr>\
									<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?"></td>\
									<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control"></td>\
												<td><input type="button" name="remove_actual" value="Remove" id="remove_actual" class="btn btn-danger"></td>\
								</tr>'
				    var max = 5;
					var a = 1;

					$("#add_actual").click(function()
					{
						if(a <= max)
						{
							$("#table-field-actual").append(html);
							a++;
						}
					});
					$("#table-field-actual").on('click','#remove_actual',function()
					{
						$(this).closest('tr').remove();
						a--;
					});
		 	});
 </script>


<!--Script for adding multiple sim classes-->

 <script type="text/javascript">
	 	$(document).ready(function()
	 	{
		 		var html1 = '<tr>\
								<td style="text-align: center;"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>\
								<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control"></td>\
											<td><input type="button" name="remove_sim" value="Remove" id="remove_sim" class="btn btn-danger"></td>\
							</tr>'
			    var max1 = 5;
				var b = 1;

				$("#add_sim").click(function()
				{
					if(b <= max1)
					{
						$("#table-field-sim").append(html1);
						b++;
					}
				});
				$("#table-field-sim").on('click','#remove_sim',function()
				{
					$(this).closest('tr').remove();
					b--;
				});
	 	});
 </script>

<!--Script for adding multiple academic classes-->

 <script type="text/javascript">
	 	$(document).ready(function()
	 	{
		 		var html2 = '<tr>\
								<td style="text-align: center;"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many academic Classes you want?"></td>\
								<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control"></td>\
											<td><input type="button" name="remove_academic" value="Remove" id="remove_academic" class="btn btn-danger"></td>\
							</tr>'
			    var max2 = 5;
				var c = 1;

				$("#add_academic").click(function()
				{
					if(c <= max2)
					{
						$("#table-field-academic").append(html2);
						c++;
					}
				});
				$("#table-field-academic").on('click','#remove_academic',function()
				{
					$(this).closest('tr').remove();
					c--;
				});
	 	});
 </script>
 
<!--Script for search classes-->

      <script>
          function myFunction() 
          {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("datatable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) 
            {
              td = tr[i].getElementsByTagName("td")[1];
              if (td) 
              {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                  tr[i].style.display = "";
                } 
                else 
                {
                  tr[i].style.display = "none";
                }
              }       
            }
          }

      </script>
      <?php
		include_once 'footer.php';
		?>
</body>
</html>