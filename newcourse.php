<?php
include('connect.php');

     $pm="";
     $q2= "SELECT * FROM users where role='Phase Manager'";
 $st2 = $connect->prepare($q2);
 $st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $pm.= '<option value="'.$row2['name'].'">'.$row2['name'].'</option>';
         }
     
     }

     $cm="";
     $q3= "SELECT * FROM users where role='course manager'";
      $st3 = $connect->prepare($q3);
       $st3->execute();

 if($st3->rowCount() > 0)
     {
         $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
         {
          $cm.= '<option value="'.$row3['name'].'">'.$row3['name'].'</option>';
         }
     
     }
     $std="";
     $q4= "SELECT * FROM users where role='student'";
      $st4 = $connect->prepare($q4);
       $st4->execute();

 if($st4->rowCount() > 0)
     {
         $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
         {
          $std.= '<option value="'.$row4['id'].'">'.$row4['name'].'</option>';
         }
     
     }
     $ctp="";
     $q5= "SELECT * FROM ctppage";
      $st5 = $connect->prepare($q5);
       $st5->execute();

 if($st5->rowCount() > 0)
     {
         $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
         {
          $ctp.= '<option value="'.$row5['course'].'">'.$row5['course'].'</option>';
         }
     
     }
?>

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

              <div class="row m-5">
              <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Course Name</label>
                    <select type="text" id="student" class="form-control form-control-md" name="coursename" required>
                        <option selected disabled value="">-select ctp-</option>
                        <?php echo $ctp?>
                    </select> 
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursenumber">Course Number</label>
                    <input type="text" id="coursenumber" name="coursenumber" class="form-control form-control-md" />
                    
                  </div>

                </div>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="role">Phase Manager</label>
                  <select type="text" id="student" class="form-control form-control-md" name="Phase_manager" required>
                        <option selected disabled value="">-Phase manager-</option>
                        <?php echo $pm?>
                    </select> 
                  </div>

                </div>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursemanager">Course Manager</label>
                    
                    <select type="text" id="coursemanager" name="coursemanager" class="form-control form-control-md">
                        <option selected disabled value="">-course manager-</option>
                        <?php echo $cm ?>
                    </select>
                    <!-- <label class="form-label" for="coursemanager">Course Manager</label> -->
                  </div>

                </div>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label for="birthdayDate" class="form-label">Symbol</label>
                    <input type="text" name="Symbol" class="form-control form-control-md" id="Symbol" />
                  </div>

                </div>

                <div class="col-md-6 mb-4">
                  <label class="form-label select-label">Choose Student</label>
                 
                  <select class="select form-control form-control-md" name="student">
                    <option value="" disabled selected>-select student-</option>
                  <?php echo  $std?>
                  </select> 
                </div>

                <div class="col-md-12 mb-4">
                  <button class="btn btn-success" type="button" data-toggle="modal" data-target="#newuser"><i class="fas fa-user"></i>Add New User</button>
                  </select> 
                </div>

                <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
              </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--add new user-->
<div class="modal fade" id="newuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register New User</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
 <form style="width: 80%; border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate>
 <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>         
                            <!-- <div class="col-md-12">
                               <input class="form-control" class="login-input" type="file" name="image" placeholder="Upload Photo" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div> -->

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="name" placeholder="Full Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="studid" placeholder="Student Id" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" class="login-input" type="text" name="nickname" placeholder="Nick Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="tel" class="login-input" name="phone" placeholder="Enter Your Phone Number" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                                <select class="form-select mt-3" name="role" required>
                                      <option selected disabled value=""></option>
                                      <option value="student">Student</option>
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" class="login-input" name="username" placeholder="Username" required />
                               <div class="valid-feedback">username field is valid!</div>
                               <div class="invalid-feedback">username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" class="login-input" name="email" placeholder="Email Adress">
                               <div class="valid-feedback">email field is valid!</div>
                               <div class="invalid-feedback">email field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>


                           <div class="col-md-12 mt-2">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                               <div class="valid-feedback mv-up">You selected a gender!</div>
                                <div class="invalid-feedback mv-up">Please select a gender!</div>
                            </div>

                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->
                  

                            <div class="form-button mt-2">
                                <input class="btn btn-primary" type="submit" name="submit" value="Register" class="login-button">
        <!-- <p class="link"><a href="login.php">Click to Login</a></p> -->
                            </div>
                        </form>
              </div>
            </div>
          </div>
        </div>
<?php
include_once 'footer.php';
?>
</body>
</html>