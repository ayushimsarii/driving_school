
<?php
include('connect.php');
$class_id="";
$phase_id="";
$ctp="";
$class="";
if(isset($_GET['class_id']) && isset($_GET['class'])){$class_id=$_GET['class_id'];
	$class=$_GET['class'];
	$class_data = "SELECT * FROM $class where id='$class_id'";
	$statement = $connect->prepare($class_data);
	$statement->execute();
   
	if($statement->rowCount() > 0)
		{
			$result = $statement->fetchAll();
			$sn=1;
			foreach($result as $row)
			{
				if($class=='actual'){
				$symbol=$row['symbol'];
			}else{
				$symbol=$row['shortsim'];	
			}
			}
		}

}else{$class_id="class not selected";}
if(isset($_GET['phase_id'])){$phase_id=$_GET['phase_id'];

	$phase= "SELECT * FROM phase where id='$phase_id'";
	$statement = $connect->prepare($phase);
	$statement->execute();
   
	if($statement->rowCount() > 0)
		{
			$result = $statement->fetchAll();
			$sn=1;
			foreach($result as $row)
			{
			$phase_name=$row['phasename'];
			}
		}
}else{$phase_id="phase not selected";}
if(isset($_GET['ctp'])){$ctp=$_GET['ctp'];
	$ctp_value= "SELECT * FROM ctppage where CTPid='$ctp'";
	$statement = $connect->prepare($ctp_value);
	$statement->execute();
   
	if($statement->rowCount() > 0)
		{
			$result = $statement->fetchAll();
			$sn=1;
			foreach($result as $row)
			{
			$ctp_name=$row['course'];
			}
		}
}else{$ctp="ctp not selected";}


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
    <link rel="stylesheet" href="sidestyle.css">
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';

?>
<div class="container" id="actualcontainer">
	<h3>Item And Subitem</h3>
	<div>
        Class : <?php echo $symbol?><br>
        Phase : <?php echo $phase_name?><br>
        Course : <?php echo $ctp_name?><br>
</div>
<br>
	<div class="row" style="width:100%;">
		
		<!-- <h1>Phase</h1> -->
		<div class="col">
           
        <form method="get" action="form_submit.php" style="width:95%;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item" id="student_details">
            <i class="fas fa-plus-hexagon"></i>ADD
            </button>
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
			<input type="hidden" value="<?php echo $class_id?>" name="class_id">
			<input type="hidden" value="<?php echo $phase_id?>" name="phase_id">
			<input type="hidden" value="<?php echo $ctp?>" name="ctp_id1">
			<input type="hidden" value="<?php echo $class?>" name="class">
        </form>
    </div>
    <!-- fetch item -->
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
									<th><input type="checkbox" id="select-all-item"></th>
									<th>Id</th>
									<th>Item</th>
								    <th>Operations</th>
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
										    <td><a onclick="document.getElementById('item_id').value='<?php echo $student['id'] ?>';
												  document.getElementById('item_name').value='<?php echo $student['item'] ?>';
												" data-toggle="modal" data-target="#edititem"><i class="fas fa-edit"></i></a>
												<a href="item_delete.php?id=<?php echo $student['id']?>"><i class="fas fa-trash"></a></i></td>
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
									<th><input type="checkbox" id="select-all-subitem"></th>
									<th>ID</th>
									<th>Name</th>
									<th>Operations</th>
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
											<td><a onclick="document.getElementById('subitem_id').value='<?php echo $job['id'] ?>';
												  document.getElementById('subitem_name').value='<?php echo $job['subitem'] ?>';
												" data-toggle="modal" data-target="#editsubitem"><i class="fas fa-edit"></i></a>
												<a href="subitem_delete.php?id=<?php echo $job['id']?>"><i class="fas fa-trash"></a></i></td>
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
		<!--edit item modal-->
<div class="modal fade" id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit item</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <form method="post" action="edit_item.php">
					<input type="hidden" name="id" value="" id="item_id">
					<input type="text" name="item" value="" id="item_name">
					<input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<!--edit subitem modal-->
<div class="modal fade" id="editsubitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subitem</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <form method="post" action="edit_subitem.php">
					<input type="hidden" name="id" value="" id="subitem_id">
					<input type="text" name="item" value="" id="subitem_name">
					<input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
	</div>
</div><br>


    <?php
include_once 'footer.php';
?>
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
      <td style="display:flex;" ><input type="radio" disabled name="grade[item'+arr[i]['ides']+']"  value="U"/> U\
       <input type="radio" disabled name="grade[item'+arr[i]['ides']+']" value="F"/> F \
       <input type="radio" disabled name="grade[item'+arr[i]['ides']+']" value="G"/> G \
       <input type="radio" disabled name="grade[item'+arr[i]['ides']+']" value="V"/> V \
       <input type="radio" disabled name="grade[item'+arr[i]['ides']+']" value="E"/> E \
       <input type="radio" disabled name="grade[item'+arr[i]['ides']+']" value="N"/> N \
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
      <td style="display:flex;" disabled><input disabled type="radio" name="grade['+arr[0]+stdbId+']" value="U"/> U \
      <input type="radio" disabled name="grade['+arr[0]+stdbId+']" value="F"/> F \
      <input type="radio" disabled name="grade['+arr[0]+stdbId+']" value="G"/> G \
      <input type="radio" disabled name="grade['+arr[0]+stdbId+']" value="V"/> V \
      <input type="radio" disabled name="grade['+arr[0]+stdbId+']" value="E"/> E \
      <input type="radio" disabled name="grade['+arr[0]+stdbId+']" value="N"/> N \
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
				 <td style="display:flex;"><input disabled type="radio" name="grade['+arr[j]+stdbId+']" value="U"/> U\
				 <input type="radio" disabled name="grade['+arr[j]+stdbId+']" value="F"/> F\
				 <input type="radio" disabled name="grade['+arr[j]+stdbId+']" value="G"/> G\
				 <input type="radio" disabled name="grade['+arr[j]+stdbId+']" value="V"/> V\
				 <input type="radio" disabled name="grade['+arr[j]+stdbId+']" value="E"/> E\
				 <input type="radio" disabled name="grade['+arr[j]+stdbId+']" value="N"/> N\
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
  document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<script>
  document.getElementById('select-all-item').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<script>
  document.getElementById('select-all-subitem').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>
</body>
</html>