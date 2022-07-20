<?php
include('connect.php');
// if($role=="super admin"){

 //   }
   $query1 = "SELECT * FROM lock_manage";
   $statement1 = $connect->prepare($query1);
   $statement1->execute();
   foreach($statement1 as $row1){
       if($row1 != ""){
      $lock_page=$row1['lock_page'];
           }
      }
  
session_start();
$username="";
if(isset($_SESSION['nickname']))
{
     $username=$_SESSION['nickname'];
}
if(isset($_SESSION['permission']))
{
     $permission=$_SESSION['permission'];
}
if(isset($_SESSION['role']))
{
     $role=$_SESSION['role'];
}
if(isset($_SESSION['id']))
{
     $user_id=$_SESSION['id'];
}
$q1 = "SELECT * FROM homepage where user_id=$user_id";
            $st1 = $connect->prepare($q1);
            $st1->execute();
		
			if($st1->rowCount() > 0){
				$result = $st1->fetchAll();
				foreach($result as $row)
                    {
                        $department=$row['department_name'];
                        $institute=$row['school_name'];
                    }
                  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
    <link rel="stylesheet" type="text/css" href="sidestyle.css">
  </head>
<!-- <style type="text/css">
  .navbar-dark .navbar-nav .nav-link 
  {
    color: black;
}
</style> -->
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="lightnavbar">
<div class="container-fluid">
<?php if(isset($department)){?>
  <a class="navbar-brand" href="#" style="color:green;"><?php echo $institute.'/'.$department?></a>
  <?php }?>

  <h3><span style="color:green;">
  <!-- <span class="avatar avatar-sm rounded-circle">
                  
                  <img alt="Photo" class="rounded-circle" src="upload/images.png">
                </span> -->
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Hello <?php echo $username;?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profile.php">Update Profile</a>
    </div>
        
        <button class="btn btn-warning" data-toggle="modal" data-target="#notification"><i class="fas fa-bell"></i></button>
        <a href="logout.php" class="btn btn-outline-success">logout<i class="fas fa-sign-out"></i></a>
      </span></h3>
</div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-success" id="mainnavbar">
  <div class="container-fluid">
    <!-- <?php if(isset($department)){?>
  <a class="navbar-brand" href="#" style="color:yellow"><?php echo $institute.'/'.$department?></a>
  <?php }?> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <li class="nav-item active">
              <a class="nav-link" href="Home.php"><i class="fas fa-home-alt"></i>Home<span class="sr-only">(current)</span></a>
            </li>
            
            <?php if(!isset($_SESSION['permission']) || $permission['show_c'] == "1"){?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="phase-view.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-users-class"></i>Class
              </a>
       
              <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                <a class="nav-link" href="actual.php">Actual</a>
                <a class="nav-link" href="sim.php">Sim</a>
                <a class="nav-link" href="academic.php">Academic</a>
              </div>
            </li>
            <?php } ?>
            
         
            <?php if(!isset($_SESSION['permission']) || $permission['Task'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="tasklog.php"><i class="fas fa-tasks"></i>Task</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Activity'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="stdactlog.php"><i class="fas fa-user-graduate"></i>Activity</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="testing.php"><i class="fas fa-vial"></i>Testing</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="emergency.php"><i class="fas fa-hospital"></i>Emergeny</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Qual'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="qual.php"><i class="fas fa-graduation-cap"></i>Qual</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Clearance'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="clearance.php"><i class="fas fa-cloud-sun"></i>Clearance</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['CAP'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="CAP.php"><i class="fas fa-grip-vertical"></i>CAP</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Memo'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="memo.php"><i class="fas fa-memory"></i>Memo</a>
               </li>
               <?php } ?>
               <?php if(!isset($_SESSION['permission']) || $permission['Report'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="classreport.php"><i class="fas fa-file-chart-line"></i>Report</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Discipline'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="discipline.php"><i class="fas fa-dice-d6"></i>Discipline</a>
            </li>
            <?php } ?>
      </ul>
      <!-- <h3><span style="color:white">
        Hello <?php echo $username;?>
        <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"><i class="fas fa-bell"></i></a>
          <ul class="dropdown-menu"></ul>
        </li>
        <a href="logout.php" class="btn btn-warning">logout</a>
      </span></h3> -->
    </div>
  </div>
</nav>
<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <H3>Notifications</h3>
        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
       
        <table>
          <thead></thead>
          <?php 
          $fetched_per="";
$fetch_noti= "SELECT * FROM grade_per_notifications where is_read='0'";
$fetch_notist2 = $connect->prepare($fetch_noti);
$fetch_notist2->execute();

 if($fetch_notist2->rowCount() > 0)
     {
         $re2 = $fetch_notist2->fetchAll();
       foreach($re2 as $row2)
         {
          
          $ask_userid=$row2['user_id'];
          $fetch_ins_name= $connect->prepare("SELECT name FROM `users` WHERE id=?");
          $fetch_ins_name->execute([$ask_userid]);
          $ins_name = $fetch_ins_name->fetchColumn();

         $for_userid=$row2['to_userid']; 
         $fetch_std_name= $connect->prepare("SELECT name FROM `users` WHERE id=?");
         $fetch_std_name->execute([$for_userid]);
         $std_name = $fetch_std_name->fetchColumn();
           $grade=$row2['data'];

          $fetched_per='<tr>
          <td>'.$ins_name.' Asking For '.$row2['type'].' To Give Grade '.$grade.' For '.$std_name.'</td>
          </tr>';
          echo $fetched_per;
         }
     
     }     ?>        
							</table>


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<script type = "text/javascript">
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
		if($('#name').val() != '' && $('#role').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"admin_register_user.php",
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
</script>

</body>
</html>

