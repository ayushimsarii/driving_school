<!DOCTYPE html>
<html lang="en">

<head>
    <title>CTP PAGE</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, 
                   initial-scale=1" />
    <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="sidestyle.css">
        
</head>
<?php 
    if(isset($_REQUEST['error']))
      {
        $error=$_REQUEST['error'];
        echo "<script>alert('$error');</script>";
      }
?>

  
	<?php
	include_once 'header.php';
	?>
	<?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>
<body>
<!-- <center>
  <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;">
          <i style="color:black;" class="fas fa-bell"></i></a>
          <ul class="dropdown-menu"></ul>
        </li>
</center> -->
<center>
    <div class="container">
        
        <div class="row">
            <center>
        <form id="add_user_fetch" action="ctpdata.php" method="post" style="border:1px solid black; margin:45px; padding:35px; width:100%;">

<div class="row">
<?php 
  if(isset($_REQUEST['error']))
  {
  $error=$_REQUEST['error'];
  echo $error;
  }?>

  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursename">Course</label>
      <input type="text" id="course" name="course" class="form-control form-control-md" />
    </div>

  </div>
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursename">Class Size</label>
      <input type="text" id="classsize" name="ClassSize" class="form-control form-control-md" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursename">Course Code</label>
      <input type="text" id="coursecode" name="CourseCode" class="form-control form-control-md" />
    </div>

  </div>
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursenumber">Sponcors</label>
      <input type="text" id="sponcors" name="Sponcors" class="form-control form-control-md" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursename">Location</label>
      <input type="text" id="location" name="Location" class="form-control form-control-md" />
    </div>

  </div>
  <div class="col-md-6 mb-4">

    <div class="form-outline">
      <label class="form-label" for="coursenumber">Course Aim</label>
      <input type="text" id="courseaim" name="CourseAim" class="form-control form-control-md" />
    </div>

  </div>
</div>

<div class="row">
  <div class="col-md-12">

    <div class="form-outline">
      <label style="text-align:left;" class="form-label" for="coursenumber">Add Manual</label>
      <input type="text" id="addmanual" name="manual" class="form-control form-control-md" /><br>
      <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#add_manual"><i class="fas fa-plus-square"></i></button>
    </div>
  </div>

</div>


<div class="mt-4 pt-2">
  <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit" />
</div>

</form>
</center>
        </div>

    </div>
    </center>
<!--Next and Previous Button-->

<div class="container" style="width:70%;">
	<button  class="btn btn-primary" type="submit"><a href="Home.php">Previous</a></button>
	<button style="float: right;" class="btn btn-primary" type="submit"><a href="Next-home.php">Next</a></button>
</div><br><br><br><br>

<!-- <script type = "text/javascript">
$(document).ready(function(){
	
	function load_unseen_notification(view = '')
	{
		$.ajax({
			url:"notification_fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data)
			{
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);
			}
			}
		});
	}
 
	load_unseen_notification();
 
	$('#add_user_fetch').on('submit', function(event){
		event.preventDefault();
		if($('#course').val() != '' && $('#coursecode').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"ctpdata.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
			$('#add_user_fetch')[0].reset();
			load_unseen_notification();
			}
		});
		}
		else{
			alert("Enter Data First");
		}
	});
 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	load_unseen_notification('yes');
	});
 
	setInterval(function(){ 
		load_unseen_notification();; 
	}, 5000);
 
});
</script> -->
<?php
include_once 'footer.php';
?>
</body>

</html>