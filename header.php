<?php
include('connect.php');


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
  <!-- JavaScript Bundle with Popper -->
  <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style type="text/css">
  .navbar-dark .navbar-nav .nav-link 
  {
    color: black;
}
</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <?php if(isset($department)){?>
  <a class="navbar-brand" href="#" style="color:yellow"><?php echo $institute.'/'.$department?></a>
  <?php }?>
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
            <?php if(!isset($_SESSION['permission']) || $permission['Student'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="stdactlog.php">Student</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Emergency'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="emergency.php">Emergeny</a>
            </li>
            <?php } ?>
            <?php if(!isset($_SESSION['permission']) || $permission['Testing'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="testing.php">Testing</a>
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
           
            <?php if(!isset($_SESSION['permission']) || $permission['Class'] == "1"){?>
            <li class="nav-item">
              <a class="nav-link" href="memo.php">Memo Record</a>
               </li>
               <?php } ?>
      </ul>
      <h3><span style="color:white">
        Hello <?php echo $username;?>
        <button class="btn btn-warning"><i class="fas fa-bell"></i></button>
        <a href="logout.php" class="btn btn-warning">logout</a>
      </span></h3>
    </div>
  </div>
</nav>



</body>
</html>

