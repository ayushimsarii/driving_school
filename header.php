<?php
session_start();
if(isset($_SESSION['username']))
{
     $username=$_SESSION['username'];
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
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item active">
              <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="actual.php">Actual</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sim.php">Sim</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="academic.php">Academic</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Next-home.php">Phase</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="phase-view.php">Class</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tasklog.php">Task</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="stdactlog.php">Student</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="emergency.php">Emergeny</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="testing.php">Testing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="qual.php">Qual</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="clearance.php">Clearance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="classreport.php">Class report</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="memo.php">Memo Record</a>
            </li>
      </ul>
     <h3 style="color:white"><span >
        Hello <?php echo $username;?>
        <a href="logout.php" class="btn btn-warning">logout</a>
      </span></h3>
    </div>
  </div>
</nav>



</body>
</html>

