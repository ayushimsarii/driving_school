<?php 

$course="select course";

?>
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
	<link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<script>
$(document).ready(function(){
  $("#actualbtn").click(function(){
    $("#actualtable").show();
    $("#actualsearch").show();
  });
  $("#simbtn").click(function(){
    $("#simtable").show();
    $("#simsearch").show();
  });
  $("#academicbtn").click(function(){
    $("#academictable").show();
    $("#academicsearch").show();
  });
  $('#mark_type').on('change', function(){
          
          var type = $(this).val();
          console.log(type);
          $(".type_value").val(type);
          $(".type").val('percentage');
        });
});
</script>
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
					?>
						
					<div class="container">
					<center>
           			<h3 style="color:red"><?php echo 'phase name/ctp name<br>'.$_GET['phase'].'/'.$course ?> </h3>	</center>
         	 </div>
		<?php }  ?>
		<center>
<!--Button of classes-->
		<div class="tab-content">
			<div class="tab-pane fade show active" id="class" role="tabpanel" aria-labelledby="class-tab">
				<button type="button" class="btn btn-warning" id="actualbtn">Actual</button>
				<button class="btn btn-primary" type="button" id="simbtn">Simulation</button>
				<button class="btn btn-warning" type="button" id="academicbtn">Academic</button>
			</div>
        </div>
		</center>
<!--Fetch actual table-->
<center>
<div class="container">
                         <div class="row" id="actualrow">
                        <center>
                            
                          <table style="width:100%;display:none;" class="table table-striped table-bordered" id="actualtable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="actualsearch" onkeyup="actual()" placeholder="Search for Vehicle name.." title="Type in a name">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Class Name</th>
                                    <th>Symbol</th>
                                    <th>Phase</th>
                                    <th>CTP</th>
                                    <th>% Type</th>
                                    <th>Percentage</th>
                                    <th>item and subitem</th>
                                    <th>Action</th>
                                  
                                </tr>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM actual where ctp='$ctp' and phase='$phase_id'";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row['actual'] ?></td>
                                            <td><?php echo $row['symbol'] ?></td>
                                            <td><?php echo $phase ?></td>
                                            <td><?php echo $course ?></td>
                                            <td><?php echo $row['ptype'] ?></td>
                                            <td><?php echo $row['percentage'] ?></td>
                                            <td><a href="add_item_subitem.php?class_id=<?php echo $id?>&phase_id=<?php echo $phase_id?>&ctp=<?php echo $ctp?>">Add</a></td>
                                            <td><a onclick="document.getElementById('id').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('actual1').value='<?php echo $row['actual'] ?>';
                                               document.getElementById('symbol').value='<?php echo $row['symbol'] ?>';
                                               document.getElementById('phase').value='<?php echo $phase ?>';
                                               document.getElementById('ctp').value='<?php echo $course ?>';
                                               document.getElementById('ptype1').value='<?php echo $row['ptype'] ?>';
                                               document.getElementById('percentage1').value='<?php echo $row['percentage'] ?>';
                                            " data-toggle="modal" data-target="#editactual"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="actual-delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
								</center>
                          </div>
                      </div>
          </div>
	</center>

<!--fetch  simulation table-->
<center>
<div class="container">
                         <div class="row" id="simrow">
                        <center>
                            
                          <table style="width:100%;display:none;" class="table table-striped table-bordered" id="simtable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="simsearch" onkeyup="sim()" placeholder="Search for Vehicle name.." title="Type in a name">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Class Name</th>
                                    <th>Symbol</th>
                                    <th>Phase</th>
                                    <th>CTp</th>
                                    <th>% Type</th>
                                    <th>Percentage</th>
                                    <th>item and subitem</th>
                                    <th>Action</th>
                                  
                                </tr>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM sim where ctp='$ctp' and phase='$phase_id'";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row['sim'] ?></td>
                                            <td><?php echo $row['shortsim'] ?></td>
                                            <td><?php echo $phase ?></td>
                                            <td><?php echo $row['ctp'] ?></td>
                                            <td><?php echo $row['ptype'] ?></td>
                                            <td><?php echo $row['percentage'] ?></td>
                                            <td><a href="add_item_subitem.php">Add</a></td>
                                            <td><a onclick="document.getElementById('id1').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('sim1').value='<?php echo $row['sim'] ?>';
                                               document.getElementById('shortsim1').value='<?php echo $row['shortsim'] ?>';
                                               document.getElementById('simphase').value='<?php echo $phase ?>';
                                               document.getElementById('simctp').value='<?php echo $row['ctp'] ?>';
                                               document.getElementById('ptype2').value='<?php echo $row['ptype'] ?>';
                                               document.getElementById('percentage2').value='<?php echo $row['percentage'] ?>';
                                            " data-toggle="modal" data-target="#editsim"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="sim_delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
								</center>
                          </div>
                      </div>
          </div>
</center>
<!--fetch academic table-->
<center>
<div class="container">
                         <div class="row" id="academicrow">
                        <center>
                            
                          <table style="width:100%;display:none;" class="table table-striped table-bordered" id="academictable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="academicsearch" onkeyup="academic()" placeholder="Search for Vehicle name.." title="Type in a name">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Class Name</th>
                                    <th>Symbol</th>
                                    <th>Phase</th>
                                    <th>CTP</th>
                                    <th>% Type</th>
                                    <th>Percentage</th>
                                    <th>item and subitem</th>
                                    <th>Action</th>
                                  
                                </tr>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM academic where ctp='$ctp' and phase='$phase_id'";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row['academic'] ?></td>
                                            <td><?php echo $row['shortacademic'] ?></td>
                                            <td><?php echo $phase ?></td>
                                            <td><?php echo $row['ctp'] ?></td>
                                            <td><?php echo $row['ptype'] ?></td>
                                            <td><?php echo $row['percentage'] ?></td>
                                            <td><a href="add_item_subitem.php">Add</a></td>
                                            <td><a onclick="document.getElementById('acaid').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('academicname').value='<?php echo $row['academic'] ?>';
                                               document.getElementById('shortacademicname').value='<?php echo $row['shortacademic'] ?>';
                                               document.getElementById('ptype3').value='<?php echo $row['ptype'] ?>';
                                               document.getElementById('percentage3').value='<?php echo $row['percentage'] ?>';
                                               document.getElementById('academicphase').value='<?php echo $phase ?>';
                                               document.getElementById('academicctp').value='<?php echo $row['ctp'] ?>';
                                            " data-toggle="modal" data-target="#editacademic"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="academic-delet.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
								</center>
                          </div>
                      </div>
          </div>
</center>




			<div class="container">
			<center>
				<div class="row">
				<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
                   <select class="form-select mt-3" name="role" required id="mark_type">
                                      <option selected value="">-select type-</option>
                                    <option value="100">percentage type</option>
                               </select>
                               <br>
					<!--Adding actual Classes-->
						<h3>Class : <span>Actual</span></h3>
							<form class="insert-phases" id="actual" method="post" action="actual_insert_data.php">
									<div class="input-field">
										<table class="table table-bordered" id="table-field-actual">
													<tr>
													<input type="hidden" name="phase_id" class="form-control" value="<?php echo $phase_id ?>">
													<input type="hidden" name="phase" class="form-control" value="<?php echo $phase ?>">
													<input type="hidden" name="ctp" class="form-control" value="<?php echo $ctp ?>">
														<td class="short"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?" required=""></td>
														<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control" placeholder="Symbol"></td>
                            <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>
														<td class="short"><input maxlength="10" readonly class="type_value" type="number" name="percentage[]" class="form-control" placeholder="Percentage"></td>
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
										<td class="short"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>
										<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control" placeholder="Symbol"></td>
                    <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>
										<td class="short"><input maxlength="10" readonly class="type_value" type="number" name="percentage[]" class="form-control" placeholder="Percentage"></td>
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
										<td class="short"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>
										<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control" placeholder="Symbol"></td>
                    <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>
										<td class="short"><input maxlength="10" type="number" readonly class="type_value" name="percentage[]" class="form-control" placeholder="Percentage"></td>
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
<!--Edit actual class modal-->
<div class="modal fade" id="editactual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Actual Class</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_actual_class.php">
                <input type="text" name="id" value="" id="id" readonly>
              <input type="text" name="actual" value="" id="actual1">
              <input type="text" name="symbol" value="" id="symbol">
              <input type="text" name="phase" value="" id="phase">
              <input type="text" name="ctp" value="" id="ctp">
              <input type="text" name="ptype" value="" id="ptype1">
              <input type="text" name="percentage" value="" id="percentage1">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                  </form>
            </div>
          </div>
        </div>
</div> 
<!--Edit Sim class modal-->
<div class="modal fade" id="editsim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Actual Class</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_sim_class.php">
                <input type="text" name="id" value="" id="id1" readonly>
              <input type="text" name="sim" value="" id="sim1">
              <input type="text" name="shortsim" value="" id="shortsim1">
              <input type="text" name="phase" value="" id="simphase">
              <input type="text" name="ctp" value="" id="simctp">
              <input type="text" name="ptype" value="" id="ptype2">
              <input type="text" name="percentage" value="" id="percentage2">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                  </form>
            </div>
          </div>
        </div>
</div>
<!--Edit Academic class modal-->
<div class="modal fade" id="editacademic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Academic Class</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_academic_class.php">
                <input type="text" name="id" value="" id="acaid" readonly>
              <input type="text" name="academic" value="" id="academicname">
              <input type="text" name="shortacademic" value="" id="shortacademicname">
              <input type="text" name="ptype" value="" id="ptype3">
              <input type="text" name="percentage" value="" id="percentage3">
              <input type="text" name="phase" value="" id="academicphase">
              <input type="text" name="ctp" value="" id="academicctp">
              <input class="btn btn-primary" type="submit" name="submit1" value="Submit">
                                  </form>
            </div>
          </div>
        </div>
</div><br><br>
<!--Previous and Next Button-->

    <div class="container" style="width:60%;">
			<button  class="btn btn-primary" type="submit"><a href="Next-home.php">Previous</a></button>
			<button style="float: right;" class="btn btn-primary" type="submit"><a href="actual.php">Next</a></button>
    </div><br><br><br><br><br><br>
<?php
include_once 'footer.php';
?>
	<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for adding multiple actual classes-->

 <script type="text/javascript">
		 	$(document).ready(function()
		 	{
			 		var html = '<tr>\
									<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?"></td>\
									<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control" placeholder="Symbol"></td>\
                  <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>\
                  <td class="short"><input maxlength="10" readonly class="type_value" type="number" name="percentage[]" class="form-control" placeholder="Percentage"></td>\
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
								<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control" placeholder="Symbol"></td>\
                <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>\
                <td class="short"><input maxlength="10" readonly class="type_value" type="number" name="percentage[]" class="form-control" placeholder="Percentage"></td>\
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
								<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control" placeholder="Symbol"></td>\
                <td class="short"><input maxlength="10" type="hidden" class="type" name="ptype[]" class="form-control" placeholder="% Type"></td>\
                <td class="short"><input maxlength="10" readonly class="type_value" type="number" name="percentage[]" class="form-control" placeholder="Percentage"></td>\
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

<script>
function actual() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("actualsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("actualtable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function sim() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("simsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("simtable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<script>
function academic() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("academicsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("academictable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
     
</body>
</html>