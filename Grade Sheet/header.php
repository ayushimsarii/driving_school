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
    <!-- <script src="js/bootstrap.min.js"></script> -->
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
<?php  
$profile= $connect->prepare("SELECT file_name FROM `users` WHERE id=?");
$profile->execute([$user_id]);
$prof_pic = $profile->fetchColumn();
if($prof_pic!=null){
  $pic= 'upload/'.$prof_pic;
}else{
  $pic= 'upload/';
}
?>
  <img alt="Photo" class="rounded-circle" src="<?php echo $pic ?>" style="height:50px;width:50px">
        
  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Hello <?php echo $username;?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <ul>
      <li style="display:block;">
        <a class="btn btn-outline-success" href="profile.php">Update Profile<i class="fas fa-user-circle"></i></a>
      </li>
      <li style="display:block;">
        <a href="logout.php" class="btn btn-outline-success">logout<i class="fas fa-sign-out"></i></a>
      </li>
    </ul>
    </div>
        
        <button class="btn btn-warning" data-toggle="modal" data-target="#notification"><i class="fas fa-bell"></i></button>
        
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
              <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            
            <?php if(!isset($_SESSION['permission']) || $permission['show_c'] == "1"){?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="phase-view.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Class
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
              <a class="nav-link" href="tasklog.php">Task</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Activity'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="stdactlog.php">Activity</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="testing.php">Testing</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="emergency.php">Emergeny</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Qual'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="qual.php">Qual</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Clearance'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="clearance.php">Clearance</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['CAP'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="CAP.php">CAP</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Memo'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="memo.php">Memo</a>
               </li>
               <?php } ?>
               <?php if(!isset($_SESSION['permission']) || $permission['Report'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="classreport.php">Report</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Discipline'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="discipline.php">Discipline</a>
            </li>
            <?php } ?>
      </ul>
      <h3><span style="color:white">
        
      <li class="dropdown">
        <a class="btn btn-outline-warning" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          DOC's
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="driving_school-4/Grade sheet/login.php">
                    <img style="height:30px; width:30px;" src="https://scontent.fbom3-1.fna.fbcdn.net/v/t1.15752-9/289931610_5375057919199729_6209599937355654461_n.png?stp=dst-webp&_nc_cat=108&ccb=1-7&_nc_sid=ae9488&_nc_ohc=3FEMhRMYD4cAX-cfbyO&_nc_ht=scontent.fbom3-1.fna&uss=214070531a663c06&odm=bXNhcmlpLndvcmtwbGFjZS5jb20&oe2=62FF5A23&oh=03_AVIHuZe4y2m6MH1OYrDeZbNpyRS_VBEcRfEV92qO6sCk-A&oe=62D92F0B" alt="images not found">
                    Grade Sheet</a><hr>
               
                  <a class="dropdown-item" href="driving_school-4/Library/index.php">
                  <img style="height:30px; width:30px;" src="https://scontent.fbom3-1.fna.fbcdn.net/v/t1.15752-9/293439227_1909777142555207_4704971287545370848_n.png?stp=dst-webp&_nc_cat=108&ccb=1-7&_nc_sid=ae9488&_nc_ohc=tmIWfqqsTloAX_-JnUN&_nc_ht=scontent.fbom3-1.fna&uss=eb41407c36c5920c&odm=bXNhcmlpLndvcmtwbGFjZS5jb20&oe2=62FCCFD6&oh=03_AVKtIsfl40bQj7rb01VQzJ4OUzY_ynT80BECPenfoaz6pg&oe=62D92DF6" alt="images not found">
                    Library</a><hr>

                  <a class="dropdown-item" href="BRI/index.php">
                  <img style="height:30px; width:30px;" src="https://scontent.fbom3-2.fna.fbcdn.net/v/t1.15752-9/290657372_886572016078640_5349877994475500086_n.png?stp=dst-webp&_nc_cat=104&ccb=1-7&_nc_sid=ae9488&_nc_ohc=nT8yKHobNZAAX-la1jV&_nc_ht=scontent.fbom3-2.fna&uss=34f921510ea6bc9a&odm=bXNhcmlpLndvcmtwbGFjZS5jb20&oe2=62FF56E2&oh=03_AVKqJ9mOMuP110_bWiLchvm-XSZ7OzHziNeTcaVJgu4eJA&oe=62D929D6" alt="images not found">
                    BRI</a><hr>
                  <a class="dropdown-item" href="Scheduling/index.php">
                  <img style="height:30px; width:30px;" src="https://scontent.fbom3-1.fna.fbcdn.net/v/t1.15752-9/294788057_607249490742959_6423593224146955433_n.png?stp=dst-webp&_nc_cat=109&ccb=1-7&_nc_sid=ae9488&_nc_ohc=DsCO3COkBbUAX-D1d18&_nc_ht=scontent.fbom3-1.fna&uss=28b587553124be11&odm=bXNhcmlpLndvcmtwbGFjZS5jb20&oe2=62FE6992&oh=03_AVKWmm07emK9_OrtumDjeEegsOg7kN7jxz40ZSh5Jt-50Q&oe=62D929A2" alt="images not found">
                    Scheduling</a>
            
        </div>
      </li>
      </span></h3>
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

</body>
</html>

