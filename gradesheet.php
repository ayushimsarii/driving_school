<?php
include('connect.php');
$actclass="";
$simclass="";
$academicclass="";
     $in="";
     $q2= "SELECT * FROM users where role='Instructor'";
 $st2 = $connect->prepare($q2);
 $st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $in.= '<option value="'.$row2['name'].'">'.$row2['name'].'</option>';
         }
     
     }

     $q3="SELECT * FROM actual";
     $st3 = $connect->prepare($q3);
     $st3->execute();
     if($st3->rowCount() > 0)
     {
       $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
       {
         $actclass.='<option value="'.$row3['symbol'].'">'.$row3['symbol'].'</option>';
       }
     }
     
     $q4="SELECT * FROM sim";
     $st4 = $connect->prepare($q4);
     $st4->execute();
     if($st4->rowCount() > 0)
     {
       $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
       {
         $simclass.='<option value="'.$row4['shortsim'].'">'.$row4['shortsim'].'</option>';
       }
     }
     
     $q5="SELECT * FROM academic";
     $st5 = $connect->prepare($q5);
     $st5->execute();
     if($st5->rowCount() > 0)
     {
       $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
       {
         $academicclass.='<option value="'.$row5['shortacademic'].'">'.$row5['shortacademic'].'</option>';
       }
     }
     $per_table_data="";
     $per="SELECT * FROM percentage";
     $per5 = $connect->prepare($per);
     $per5->execute();
     if($per5->rowCount() > 0)
     {
       $reper55 = $per5->fetchAll();
       $sn=1;
       foreach($reper55 as $rowper5)
       {
         $per_table_data.='<tr>
         <td>'.$sn++.'</td>
         <td>'.$rowper5['percentagetype'].'</td>
             <td>'.$rowper5['percentage'].'</td>
             <td>'.$rowper5['color'].'</td>
                 
         </tr>';
       }
     }
	 $q5="SELECT * FROM academic";
     $st5 = $connect->prepare($q5);
     $st5->execute();
     if($st5->rowCount() > 0)
     {
       $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
       {
         $academicclass.='<option value="'.$row5['shortacademic'].'">'.$row5['shortacademic'].'</option>';
       }
     }
?>
<?php
/** database connection **/
$mysqli = new mysqli("localhost","root","","driving_school");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

/**
* get students **/
$sql = "SELECT * FROM  itembank";
$st = $mysqli->query($sql);
$students = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$students[] = $row;
	}
}

/**
* get jobs **/
$sql2 = "SELECT * FROM sub_item";
$jb = $mysqli->query($sql2);
$jobs = array();
if ($jb->num_rows > 0) 
{
	// output data of each row
	while($row = $jb->fetch_assoc()) 
	{
		$jobs[] = $row;
	}
}

$mysqli->close();

?>
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
  <link rel="stylesheet" type="text/css" href="sidestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>


<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
?>
  <!--Username dashboard info-->
  <div class="container">

	<!--User info fetched in the input box-->
      <div class="container" id="std-info">
      <h3>Gradesheet</h3><?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
	<div>Student name : 
    <?php echo $fetchname?><br>
	Course name : 
  <?php echo $phpcourse.'<br>';
  if(isset($_GET['class'])){
  echo 'class : '.$class=$_GET['class'].'<br>';
  }

  ?>
</div>  
      	<div class="row" style="width:100%;">
      		<div class="col-8">
      			<table>
                              <tr>
                                <td><label>Id</label><input class="form-control" type="text" name="up" readonly value="<?php echo $fetchid?>"></td>
                                <td><label>Name</label><input class="form-control" type="text" name="ride" readonly value="<?php echo $fetchname?>"></td>
                              </tr>
                              <tr>
                                <td><label>Role</label><input class="form-control" type="text" name="status" readonly value="<?php echo $fetchrole?>"></td>
                                <td><label>Phone</label><input class="form-control" type="text" name="status" readonly value="<?php echo $fetchphone?>"></td>
                              </tr>
                              <tr>
                                <td><label class="form-label" for="Instructor">Instructor</label>
                                    <select type="text" id="student" class="form-control form-control-md" name="Instructor" required>
                                        <option selected disabled value="">-select instructor-</option>
                                        <?php echo $in?>
                                    </select></td>
                                <td><label>Time</label><input class="form-control" type="time" name="time"></td>
                              </tr>
                              <tr>
                              <td><label>Vehicle Number</label><input class="form-control" type="text" name="veh-num"></td>
                              </tr> 
                              </table>
      		</div>
<!--Prereuisites container-->
      		<div class="col-4">
            <div class="dropdown">
            <label style="font-size:20px; font-weight:bolder;">Prereuisites</label>
      		<select style="width:90px;" type="text" id="country" class="form-control multiple-select" name="class[]" multiple>
            <option selected disabled value="">Add</option>
            <?php echo $actclass?>
            <?php echo $academicclass?> <?php echo $simclass?>
          </select>
          <div id="result"></div> 
          <button type="button" onclick="GetSelectedText()">Get</button>
          </div>
      		</div>
      	</div>
      </div>

      <!--Add Selected Item and fetch-->
       <div class="container">
         <div class="row" style="width:100%;">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item" id="student_details"><!-- <br>
         <br><span id="student_details"></span> -->
            <i class="fas fa-plus-hexagon"></i>ADD
          </button>

         
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#detailsper">Info</button>
        </center>
         </div>
       </div>

<!--Comment box Container-->
<div class="container">
  <div class="row" style="width:100%;">
    <div class="col-8">
      <center>
       <form method="get" action="form_submit.php" style="width:95%;">

					<table class="table table-bordered target-table" id="radio">
							<thead class="thead-dark" style="background-color:black;">
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Grade</th>
									<th>Actions</th>
								</tr>
							</thead>
							
						
							<tbody>
								
							</tbody>
						</table>
						
						<input type="submit" class="btn btn-primary" name="save">
						<input type="hidden" name="users_id" value="<?php echo $fetchuser_id?>">
				</form>
</center>
    </div>
           <div class="col-4">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
          </div>
        </div>

        <div class="row" style="width:100%;">
            <div class="col-8">
              <center>
                <form>
                  <textarea style="width:90%;">Overall</textarea><br>
                  <button type="button" data-toggle="modal" data-target="#additional-training" class="btn btn-success">Additional Training</button>
                </form>
              </center>
            </div>

            <div class="col-4">
            <table>
				<center>
				<button class="btn btn-info" type="button" data-toggle="modal" data-target="#detailsper">Info</button></center>
                <tr>
                   <td style="display: flex;">
                      
                         <input type="radio"  value="U" name="U"/><span style="font-weight:bold;">U</span>
                      
                      
                         <input type="radio" value="F"/><span style="font-weight:bold;"> F </span>
                    
                         <input type="radio" value="G"/><span style="font-weight:bold;"> G </span>
                      
                         <input type="radio" value="V"/><span style="font-weight:bold;"> V </span>
                     
                         <input type="radio" value="E"/><span style="font-weight:bold;"> E </span>
                      
                         <input type="radio" value="N"/><span style="font-weight:bold;"> N </span>
                     
                   </td>
				</tr>
                   <tr><td><input class="form-control" id="gradesper"/></td></tr>
                   <tr><td>
                    <?php
                    if(isset($_GET['per'])){
                    echo $percentage=$_GET['per'];
                    }?></td>
                    </tr>
                    <tr>
                      <td><form><input class="btn btn-success" type="button" value="Save" name="save" onclick="displayRadioValue()"/></form></td>
                    </tr>
                </table>
            </div>
        </div>
      </div>

<!--modal for percentage info-->
<div class="modal fade" id="detailsper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Percentage</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                <table class="table table-striped table-bordered">
								<tr>
									<th>Id</th>
									<th>Type</th>
									<th>Percentage</th>
                  <th>Color</th>
								</tr>
								<?php echo $per_table_data?>
							</table>
                </center>
              </div>
            </div>
          </div>
        </div>
    
<!--Item Modal-->
<div class="modal fade" id="insert item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Item Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<div class="row">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#additem"><i class="fa-solid fa-octagon-plus"></i>Add item</button>
                  </div>
				
						<table class="table table-bordered src-table1">
							<thead>
								<tr>
									<th>#</th>
									<th>Id</th>
									<th>Item</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
								$studentJobsArr = array();
								if(count($students) > 0)
								{
									$studentJobsArr[] = 
									$totalStudents = count($students);
									$i = 0;
									foreach($students as $student)
									{
										?>
										<tr id="check_<?php echo $i;?>" data-total-record="<?php echo $totalStudents;?>" data-tr-id_<?php echo $i;?>="<?php echo $student['id'];?>" data-name-<?php echo $i;?>="<?php echo $student['item'];?>">
											<td><input type="checkbox" name="itemcheck[]" id="<?php echo $student['id']; ?>" value="<?php echo $student['item'];?>" /></td>
											<td><?php echo $student['id'];?></td>
											<td><?php echo $student['item'];?></td>
										
										</tr>
										<?php
										$i++;
									}
								}
								?>
								      
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="submitstudent">Select</button>
					</div>
				</div>
			</div>
		</div>

<!--Insert Item-->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="insert_item.php" method="post">

                            <div class="form-outline">
                                <label class="form-label" for="coursename">Item</label>
                                <input type="text" id="course" name="item[]" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="Insert_item" />
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>   
<!--Subitem modal-->
<div class="modal fade" id="insert subitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel2">Subitem Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						
					</div>
					<div class="modal-body">
					<div class="row">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsubitem"><i class="fa-solid fa-octagon-plus"></i>Add subitem</button>
                  </div>
						<table class="table table-bordered src-table2">
							<thead>
								<tr>
									<th>#</th>
									<th>ID</th>
									<th>Name</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
								if(count($jobs) > 0)
								{
									$j = 1;
									$totalJobs = count($jobs);
									foreach($jobs as $job)
									{
										?>
										<tr id="jobinfo_<?php echo $j;?>" data-total-record="<?php echo $totalJobs;?>" data-tr-id_<?php echo $j;?>="<?php echo $job['id'];?>" data-name-<?php echo $j;?>="<?php echo $job['subitem'];?>">
											<td><input type="checkbox" name="subcheck[]"value="<?php echo $job['subitem'];?>" data-row-id="<?php echo $j;?>" /></td>
											<td><?php echo $job['id'];?></td>
											<td><?php echo $job['subitem'];?></td>
											
										</tr>
										<?php
										$j++;
									}
								}
								?>      
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="submitjob" data-studentid="" data-studendbtid="">Select</button>
					</div>
				</div>
			</div>
		</div>

<!--Insert Sub Item-->
<div class="modal fade" id="addsubitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sub Item</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="insert_subitem.php" method="post">

                            <div class="form-outline">
                                <label class="form-label" for="coursename">Sub Item</label>
                                <input type="text" id="course" name="subitem" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="Insert_item" />
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>
<!--Additional Training modal-->

<div class="modal fade" id="additional-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Additional Item</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
				
						<table class="table table-bordered src-table1">
							<thead>
								<tr>
									<th>#</th>
									<th>Id</th>
									<th>Item</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
								$studentJobsArr = array();
								if(count($students) > 0)
								{
									$studentJobsArr[] = 
									$totalStudents = count($students);
									$i = 0;
									foreach($students as $student)
									{
										?>
										<tr id="check_<?php echo $i;?>" data-total-record="<?php echo $totalStudents;?>" data-tr-id_<?php echo $i;?>="<?php echo $student['id'];?>" data-name-<?php echo $i;?>="<?php echo $student['item'];?>">
											<td><input type="checkbox" name="itemcheck[]" id="<?php echo $student['id']; ?>" value="<?php echo $student['item'];?>" /></td>
											<td><?php echo $student['id'];?></td>
											<td><?php echo $student['item'];?></td>
										
										</tr>
										<?php
										$i++;
									}
								}
								?>
								      
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="submitstudent">Select</button>
					</div>
				</div>
			</div>
		</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(".multiple-select").select2({
 // maximumSelectionLength: 2
});
</script>

<script>
	function genCharArray(charA, charZ) {
	var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
	for (; i <= j; ++i) {
		a.push(String.fromCharCode(i));
	}
	return a;
}
	
	$(document).on("click","#submitstudent",function()
	{
		var rows = "";
		var arr = [];
		//var selectedStudents = $(".src-table1 input:checked").parents("tr").clone();
		var valujes = $('input[name="itemcheck[]"]').val();
	
		$('input[name="itemcheck[]"]:checked').each(function() {
			 arr.push({name:this.value,ides:this.id});
		});
		//var rowId = $(".src-table1 input:checked").parents("tr").attr('data-tr-id');
		//console.log(arr);
		for (i = 0; i < arr.length; ++i)
		{
			var student = $("#check_"+i).attr('data-name-'+i);
			var sid = $("#check_"+i).attr('data-tr-id_'+i);
			//console.log(arr[0]['name']);
			rows+= '<tr><td>'+arr[i]['ides']+'</td><td>'+arr[i]['name']+' <br /> \
      <button type="button" class="btn btn-primary mybutton" data-toggle="modal" data-target="#insert subitem" data-db-id="'+arr[i]['ides']+'" data-student="'+sid+'"><i class="fas fa-plus"></i>Subitem</button>\
      <input style="display:none;" type="text" id="std_db_id" value="'+arr[i]['ides']+'" name="std_idies[]">\
      <input style="display:none;"  type="text" name="std_sub[]" value="item"></td>\
      <td style="display:flex;"><input type="radio" name="grade[item'+arr[i]['ides']+']"  value="U"/> U\
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="F"/> F \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="G"/> G \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="V"/> V \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="E"/> E \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="N"/> N \
        </td><td><button class="btn btn-danger" id="rembtn">Remove</button></td></tr>\
        <tr id="job_description_'+sid+'"></tr>';
		}
		
		$(".target-table tbody").after(rows);
	});
	
	$(document).on("click","#submitjob",function()
	{
		var stId = $(this).attr("data-studentid");
		var stdbId = $(this).attr("data-studendbtid");
		var rows = "";
		var arr = [];
		var rowids = [];
		console.log(stdbId);
		var value = $('input[name="subcheck[]"]').val();
		$('input[name="subcheck[]"]:checked').each(function(index, item) {
			arr.push(this.value);
			rowids.push($(item).attr('data-row-id'));
			indexsas = $(item).attr('data-row-id');
		});
			var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
	
		if(arr.length == 1)
		{
			rows = "";
			var job = $("#jobinfo_"+indexsas).attr('data-name-'+indexsas);
			var jid = $("#jobinfo_"+indexsas).attr('data-tr-id_'+indexsas);
			
			rows+= '<tr><td style="width:100px;" class="td">'+alphabet[0].toUpperCase()+'</td><td>'+arr[0]+'\
      <input style="display:none;" type="text" name="std_idies[]" value="'+stdbId+'"> \
      <input style="display:none;" type="text" name="std_sub[]" value="'+arr[0]+'"> </td> \
      <td style="display:flex;"><input type="radio" name="grade['+arr[0]+stdbId+']" value="U"/> U \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="F"/> F \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="G"/> G \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="V"/> V \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="E"/> E \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="N"/> N \
      </td><td style="width:100px;"><button class="btn btn-danger" id="rembtn2">Remove</button></td></tr><br>';
					$("#job_description_"+stId).before(rows);
		}
		else{
			for (j = 0; j < arr.length; ++j)
			{
				rows = "";
				var job = $("#jobinfo_"+j).attr('data-name-'+j);
				var jid = $("#jobinfo_"+j).attr('data-tr-id_'+j);
				rows+= '<tr><td>'+alphabet[j].toUpperCase()+'</td>\
				<td>'+arr[j]+'<input style="display:none;" type="text" name="std_idies[]" value="'+stdbId+'">\
				<input style="display:none;" type="text" name="std_sub[]" value="'+arr[j]+'"> </td>\
				 <td style="display:flex;"><input type="radio" name="grade['+arr[j]+stdbId+']" value="U"/> U\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="F"/> F\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="G"/> G\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="V"/> V\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="E"/> E\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="N"/> N\
				 </td><td><button class="btn btn-danger" id="rembtn1">Remove</button></td></tr>';
				$("#job_description_"+stId).before(rows);	
			}
		}
		arr=[];

	});
	
	$( document ).on("click", ".mybutton", function(){
		var studentId = $(this).attr("data-student");
	
		$("#submitjob").attr("data-studentid", studentId);
	});
	$( document ).on("click", ".mybutton", function(){
		var studentdbId = $(this).attr("data-db-id");
		$("#submitjob").attr("data-studendbtid", studentdbId);

	});
	

</script>

<script>
$(document).ready(function(){

 $("#radio").on('click','#rembtn',function(){
       $(this).closest('tr').remove();
     });

	 $("#radio").on('click','#rembtn1',function(){
       $(this).closest('tr').remove();
     });

	 $("#radio").on('click','#rembtn2',function(){
       $(this).closest('tr').remove();
     });

});

</script>
</body>
</html>