<?php
/** database connection **/
$mysqli = new mysqli("localhost","root","","driving_school");
include('connect.php');
$item="";
$item_data="SELECT * FROM item where userid='18'";
$stat = $connect->prepare($item_data);
$stat->execute();
if($stat->rowCount() > 0)
{
  $reper55 = $stat->fetchAll();
  $sn=1;
  foreach($reper55 as $rowstat5)
  {
	$item=$rowstat5['item'];
  }
}
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
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Item bank</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style type="text/css">
	div
	{
		margin: 5px;
		padding: 5px;
	}
	.subitem
	{
		width: 300px;
	}
</style>
<script>
	function genCharArray(charA, charZ) {
	var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
	for (; i <= j; ++i) {
		a.push(String.fromCharCode(i));
	}
	return a;
}
$(document).ready(function()
{
	$('[data-toggle="tooltip"]').tooltip();

	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
	
	$(document).on("click","#submit_All",function()
	{
		var item=$('#read_data').val();console.log(item);
		// var submitall = sessionStorage.getItem('item');
		// var subitem = sessionStorage.getItem('subitem');
		// console.log(submitall);
		// document.cookie = "item = " + submitall;
		// document.cookie = "subitem1 = " + subitem;
	});
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
			rows+= '<tr><td>'+arr[i]['ides']+'</td><td>'+arr[i]['name']+' <br /> <button type="button" class="btn btn-primary mybutton" data-toggle="modal" data-target="#exampleModal2" data-db-id="'+arr[i]['ides']+'" data-student="'+sid+'">Subitem Bank</button><input type="text" id="std_db_id" value="'+arr[i]['ides']+'" name="std_idies[]"><input type="text" name="std_sub[]" value="item"></td><td><input type="radio" name="grade[item'+arr[i]['ides']+']"  value="A"/> A <input type="radio" name="grade[item'+arr[i]['ides']+']" value="B"/> B <input type="radio" name="grade[item'+arr[i]['ides']+']" value="C"/> C <input type="radio" name="grade[item'+arr[i]['ides']+']" value="D"/> D <input type="radio" name="grade[item'+arr[i]['ides']+']" value="E"/> E </td><td><button class="btn btn-danger">Remove</button></td></tr><tr id="job_description_'+sid+'"></tr>';
		    sessionStorage.setItem('item',rows);
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
			
			rows+= '<tr><td style="width:100px;" class="td">'+alphabet[0].toUpperCase()+'</td><td>'+arr[0]+'<input type="text" name="std_idies[]" value="'+stdbId+'"> <input type="text" name="std_sub[]" value="'+arr[0]+'"> </td> <td style="width:300px;"><input type="radio" name="grade['+arr[0]+stdbId+']" value="A"/> A<input type="radio" name="grade['+arr[0]+stdbId+']" value="B"/> B<input type="radio" name="grade['+arr[0]+stdbId+']" value="C"/> C<input type="radio" name="grade['+arr[0]+stdbId+']" value="D"/> D<input type="radio" name="grade['+arr[0]+stdbId+']" value="E"/> E</td><td style="width:100px;"><button class="btn btn-danger">Remove</button></td></tr><br>';
					$("#job_description_"+stId).before(rows);
					sessionStorage.setItem('subitem',rows);
		}
		else{
			for (j = 0; j < arr.length; ++j)
			{
				rows = "";
				var job = $("#jobinfo_"+j).attr('data-name-'+j);
				var jid = $("#jobinfo_"+j).attr('data-tr-id_'+j);
				rows+= '<tr><td>'+alphabet[j].toUpperCase()+'</td><td>'+arr[j]+'<input type="text" name="std_idies[]" value="'+stdbId+'"><input type="text" name="std_sub[]" value="'+arr[j]+'"> </td> <td><input type="radio" name="grade['+arr[j]+stdbId+']" value="A"/> A<input type="radio" name="grade['+arr[j]+stdbId+']" value="B"/> B<input type="radio" name="grade['+arr[j]+stdbId+']" value="C"/> C<input type="radio" name="grade['+arr[j]+stdbId+']" value="D"/> D<input type="radio" name="grade['+arr[j]+stdbId+']" value="E"/> E</td><td><button class="btn btn-danger">Remove</button></td></tr>';
				$("#job_description_"+stId).before(rows);
				sessionStorage.setItem('subitem',rows);	
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
	
	
});

</script>
</head>
<body>
		<div class="container">
		    <div class="row">
			
		        	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-octagon-plus"></i>ADD</button>
		        
			</div>
		</div><form method="get" action="form_submit.php">
                <div class="container">
					<table class="table table-bordered target-table" id="radio">
							<thead>
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Grade</th>
									<th>Actions</th>
								</tr>
							</thead>
							
						
							<tbody id="read_data">
								
							</tbody>
						
						</table>
						<input type="submit" class="btn btn-primary" name="save" id="submit_All">
						</form>
					</div>
              
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel2">Subitem Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action="item.php" method="post">
				   <input class="form-control" type="text" name="item" placeholder="Add more item">
				   
					
							
					</div>
					<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="submit">   </form>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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
		<div class="modal fade" id="addsubitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel2">Subitem Bank</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					<form action="subitem.php" method="post">
				   <input class="form-control" type="text" name="subitem" placeholder="Add more subitem">
			
				  
				   	
							
					</div>
					<div class="modal-footer">
					<input class="btn btn-primary" type="submit" name="submit"></form>
					</div>
				</div>
			</div>
		</div>
	   
</body>
</html>
