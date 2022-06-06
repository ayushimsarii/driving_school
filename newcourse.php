<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CTP Page</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body>
<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>
  
	<?php
	include_once 'header.php';
	?>
	<?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-9">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">New Course Form</h3>
            <form action="newcoursedata.php" method="post">

              <div class="row">
              <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Course Name</label>
                    <input type="text" id="coursename" name="coursename" class="form-control form-control-md" />
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursenumber">Course Number</label>
                    <input type="text" id="coursenumber" name="coursenumber" class="form-control form-control-md" />
                    
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="role">Phase Manager</label>
                    <input type="text" id="role" name="role" class="form-control form-control-md"/>
                    <!-- <select type="text" id="student" class="form-control form-control-md" name="role" required>
                        <option selected disabled value=""></option>
                        <option value="course manager">Phase Manager</option>
                        <option value="phase manager">Phase Manager</option>
                        <option value="Instructor">Phase Manager</option>
                        <option value="student">Phase Manager</option>
                    </select> -->
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursemanager">Course Manager</label>
                    <input type="tel" id="coursemanager" class="form-control form-control-md" />
                    <!-- <select type="text" id="coursemanager" name="coursemanager" class="form-control form-control-md">
                        <option selected disabled value=""></option>
                        <option value="course manager">Course Manager</option>
                        <option value="phase manager">Course Manager</option>
                        <option value="Instructor">Course Manager</option>
                        <option value="student">Course Manager</option>
                    </select> -->
                    <!-- <label class="form-label" for="coursemanager">Course Manager</label> -->
                  </div>

                </div>
              </div>

               <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label for="birthdayDate" class="form-label">Symbol</label>
                    <input type="text" name="Symbol" class="form-control form-control-md" id="Symbol" />
                  </div>

                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label select-label">Choose Student</label>
                  <input type="text" name="student" class="form-control form-control-md" id="student" />
                  <!-- <select class="select form-control form-control-md" name="student">
                    <option value="1" disabled>Choose option</option>
                    <option value="2">Student 1</option>
                    <option value="3">Student 2</option>
                    <option value="4">Student 3</option>
                  </select> -->
                </div>
              </div>

              <!-- <div class="row">
                <div class="col-12">

                  <select class="select form-control form-control-md" name="student">
                    <option value="1" disabled>Choose option</option>
                    <option value="2">Student 1</option>
                    <option value="3">Student 2</option>
                    <option value="4">Student 3</option>
                  </select>
                  <label class="form-label select-label">Choose Student</label>

                </div>
              </div> -->

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include_once 'footer.php';
?>
</body>
</html>