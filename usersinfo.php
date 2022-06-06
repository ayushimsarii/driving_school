<?php
include('connect.php');
$output ="";
 $query = "SELECT * FROM vehicle  ORDER BY id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
             $output .= '
             <tr>
             <td>'.$sn++.'</td>
             <td>'.$row['VehicleName'].'</td>
             <td>'.$row['VehicleType'].'</td>
             <td>'.$row['VehicleNumber'].'</td>
             <td><button class="btn btn-success" type="button" data-toggle="modal" data-target="#edit_vehicle" id="'.$row["id"].'"><a><i class="fas fa-edit"></i></a></button>
                 <button class="btn btn-danger"><a href="user-delete.php?id='.$row["id"].'"><i class="fas fa-trash"></i></a></button></td>
             </tr>
             ';
         }
     
     }

  $output1 ="";
 $query1 = "SELECT * FROM newcourse  ORDER BY id DESC";
 $statement1 = $connect->prepare($query1);
 $statement1->execute();

 if($statement1->rowCount() > 0)
     {
         $result1 = $statement1->fetchAll();
         $sn1=1;
         foreach($result1 as $row1)
         {
             $output1 .= '
             <tr>
             <td>'.$sn1++.'</td>
             <td>'.$row1['Courseid'].'</td>
             <td>'.$row1['CourseName'].'</td>
             <td>'.$row1['CourseNumber'].'</td>
             <td>'.$row1['Symbol'].'</td>
             <td>'.$row1['StudentNames'].'</td>
             <td>'.$row1['CourseManager'].'</td>
             <td>'.$row1['DrivingPhaseManager'].'</td>
             <td>'.$row1['ParkingPhaseManager'].'</td>
             <td><a href="editvehicle-update.php?id='.$row1["id"].'">Edit</a>
            <a href="user-delete.php?id='.$row1["id"].'">Delete</a></td>
             </tr>
             ';
         }
     
     }
     $output2="";
     $query2 = "SELECT * FROM ctppage  ORDER BY CTPid DESC";
     $statement2 = $connect->prepare($query2);
     $statement2->execute();
    
     if($statement2->rowCount() > 0)
         {
             $result2 = $statement2->fetchAll();
             
             foreach($result2 as $row2)
             {
              $output2 .= '<option value="'.$row2['course'].'">'.$row2['course'].'</option>';
             }
         
         }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body class="bodyuser">
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
	include_once 'sidenavbar.php';
	?>

<--Slider Tabs-->    
<div class="tile" id="tile-1">

  <!-- Nav tabs -->
  <center>
  <ul class="nav nav-tabs nav-justified" role="tablist" id="slidertab" style="width: 70%;">
    <!-- <div class="slider"></div> -->
     <li class="nav-item">
        <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true"><i class="fas fa-user"></i></i>Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="vehicle-tab" data-toggle="tab" href="#vehicle" role="tab" aria-controls="vehicle" aria-selected="false"><i class="fas fa-car-bus"></i></i>Vehicles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="newcourse-tab" data-toggle="tab" href="#newcourse" role="tab" aria-controls="newcourse" aria-selected="false"><i class="fas fa-map-signs"></i>New Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="ctp-tab" data-toggle="tab" href="#ctp" role="tab" aria-controls="ctp" aria-selected="false"><i class="fas fa-map-signs"></i>CTP Page</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
      </li>
  </ul> <br><br>

  <!-- Tab panes -->
  <div class="tab-content">
        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
            <button class="btn btn-success" id="btn-success"><a href="roles.php">Manage Roles</a></button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#newuser">Register User</button>
            <button class="btn btn-warning" id="btn-warning" type="button" data-toggle="modal" data-target="#user_list">User List</button>
        </div>
          <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addvehicle">Add Vehicle</button>
              <button class="btn btn-primary">Manage Vehicles</button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#vehicle_list">Vehicle List</button>
          </div>
          <div class="tab-pane fade" id="newcourse" role="tabpanel" aria-labelledby="newcourse-tab">
              <button class="btn btn-success"><a href="newcourse.php">Add New Course</a></button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#newcourse_list">New Course List</button>
          </div>
          <div class="tab-pane fade" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
              <button class="btn btn-success"><a href="ctp.php">Add New CTP</a></button>
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#select_ctp">Phase</button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#fetch_ctp_list">CTP List</button>
          </div>
          <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">Settings</div>
  </div>
</center>
</div>


        <!--fetch vehicle list modal-->

        <div class="modal fade" id="vehicle_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vehicles List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                    <table style="width:80%;" class="table table-striped table-bordered">
                    <tr>
                        <th>Sr No</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Number</th>
                        <th>Action</th>
                      
                    </tr>
                        <?php
                            echo $output;
                        ?>                
                </table>
                </center>
              </div>
            </div>
          </div>
        </div>

<!--Add Vehicle Modal-->
<div class="modal fade" id="addvehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vehicles</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="vehicledata.php" method="post">

                            <div class="form-outline">
                                <label class="form-label" for="coursename">Vehicle Name</label>
                                <input type="text" id="course" name="VehicleName" class="form-control form-control-md" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="coursenumber">Vehicle Type</label>
                                <input type="text" id="addmanual" name="VehicleType" class="form-control form-control-md" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="coursename">Vehicle Number</label>
                                <input type="text" id="coursecode" name="VehicleNumber" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="submitvehicle" />
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>

<!--Fetch new course list-->

     <div class="modal fade" id="newcourse_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Course List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                    <table style="width:100%;" class="table table-striped table-bordered">
                    <tr>
                        <th>Sr No</th>
                        <th>Course Id</th>
                        <th>Course Name</th>
                        <th>Course Number</th>
                        <th>Symbol</th>
                        <th>Student Names</th>
                        <th>Course Manager</th>
                        <th>Driving Manager</th>
                        <th>Parking Manager</th>
                        <th>Action</th>
                      
                    </tr>
                                       
                </table>
                </center>
              </div>
            </div>
          </div>
        </div>


<!-- <--edit vehicle modal--> -->

 <div class="modal fade" id="edit_vehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Course List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                    <?php
                    include_once 'connect.php';
                    $id="";
                    $id=$_POST['id'];
                    $output="";
                    $query = "SELECT * FROM vehicle where id='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .='
                    <form action="edit_vehicle.php" method="post">
            <input type="hidden" value="'.$id.'" name="user_dbid" class="form-control">
                <label class="form-label">Vehicle Name :</label>
                    <input type="text" value="'.$row['VehicleName'].'" name="vehicle_name" class="form-control">
                <label class="form-label">Vehicle Type :</label>
                    <input type="text" value="'.$row['VehicleType'].'" name="vehicle_type" class="form-control">
                <label class="form-label">Vehicle Number :</label>
                    <input type="text" value="'.$row['VehicleNumber'].'" name="vehicle_number" class="form-control">
                <input class="btn btn-primary" type="submit" name="update_vehicle" value="Update" class="login-button">
        </form>'
        ;
                    }
                }
               
?>
                </center>
              </div>
            </div>
          </div>
        </div>

<!--Select which ctp u want-->
<div class="modal fade" id="select_ctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select CTP</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="Next-home.php" method="post">
                            <label class="form-label" for="student">Select CTP</label>
                            <select type="text" id="course" class="form-control form-control-md" name="ctp" required>
                                <option selected disabled value="">-select CTP-</option>
                                <?php echo $output2 ?>
                            </select>
                        <br>
                        <button class="btn btn-success" type="submit" name="Phase">Way To Phase</button>
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>

<!-- <!-New Register user--> -->
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
                                      <option selected disabled value="">Super Admin</option>
                                      <option value="super admin">Super Admin</option>
                                      <option value="course manager">Course Manager</option>
                                      <option value="phase manager">Phase Manager</option>
                                      <option value="Instructor">Instructor</option>
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
<!--Fetch user list-->
<div class="modal fade" id="user_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <?php
include('connect.php');
$output ="";
 $query = "SELECT * FROM users  ORDER BY id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
             $output .= '
             <tr>
             <td>'.$sn++.'</td>
             <td>'.$row['name'].'</td>
             <td>'.$row['studid'].'</td>
             <td>'.$row['role'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['email'].'</td>
             <td><a href="edituser-update.php?id='.$row["id"].'">Edit</a>
            <a href="user-delete.php?id='.$row["id"].'">Delete</a></td>
             </tr>
             ';
         }
     
     }
?>
                <center>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Std Id</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>email</th>
                        <th>Action</th>
                      
                    </tr>
                        <?php
                            echo $output;
                        ?>                
                </table>
            </center>
              </div>
            </div>
          </div>
        </div>

<!--fetch ctp list-->
<div class="modal fade" id="fetch_ctp_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CTP List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                    <table style="width:100%;" class="table table-striped table-bordered">
                    <tr>
                        <th>Sr No</th>
                        <th> Id</th>
                        <th>Course Name</th>
                        <th>Manual</th>
                        <th>Course Code</th>
                        <th>Sponcors</th>
                        <th>Location</th>
                        <th>Course Aim</th>
                        <th>Course Size</th>
                        <th>Action</th>
                      
                    </tr>
                                       
                </table>
                </center>
              </div>
            </div>
          </div>
        </div>
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="datapage.js"></script>

   <!--  <?php
include_once 'footer.php';
?> -->
</body>
</html>