<?php
include('connect.php');

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
$(document).ready(function(){
  $("#btn1").click(function(){
    $("#list").show();
  });
  $("#btn2").click(function(){
    $("#list1").show();
  });
  $("#btn3").click(function(){
    $("#list3").show();
  });
});
</script>
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
  <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
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
            <button class="btn btn-primary"><a href="register_user.php">Register User</a></button>
            <button class="btn btn-warning" id="btn-warning"><a href="user_list.php">User List</a></button>
        </div>
          <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addvehicle">Add Vehicle</button>
              <button class="btn btn-primary">Manage Vehicles</button>
              <button type="button" class="btn btn-warning" id="btn1">Vehicle List</button>
              <!-- vehicle table -->
                       <div class="container">
                        <br>
                         <div class="row">
                        <center>
                          <table style="width:80%;display:none;" class="table table-striped table-bordered" id="list">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Number</th>
                                    <th>Action</th>
                                  
                                </tr>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM vehicle  ORDER BY id DESC";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><?php echo $sn++ ?></td>
                                            <td><?php echo $row['VehicleName'] ?></td>
                                            <td><?php echo $row['VehicleType'] ?></td>
                                            <td><?php echo $row['VehicleNumber'] ?></td>
                                            <td><a onclick="document.getElementById('payid').value='<?php echo $row['id'] ?>';
                                               document.getElementById('vec_name').value='<?php echo $row['VehicleName'] ?>';
                                               document.getElementById('vec_type').value='<?php echo $row['VehicleType'] ?>';
                                               document.getElementById('vec_nub').value='<?php echo $row['VehicleNumber'] ?>';
                                            " data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
                          </div>
                      </div>
          </div>
          <div class="tab-pane fade" id="newcourse" role="tabpanel" aria-labelledby="newcourse-tab">
              <button class="btn btn-success"><a href="newcourse.php">Add New Course</a></button>
              <button class="btn btn-warning" type="button" id="btn2">New Course List</button>
              <div class="container">
                        <br>
                         <div class="row">
                        <center>
                          <table style="width:80%;display:none;" class="table table-striped table-bordered" id="list1">
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
                                <?php 
                               $output1 ="";
                               $query1 = "SELECT * FROM newcourse  ORDER BY Courseid DESC";
                               $statement1 = $connect->prepare($query1);
                               $statement1->execute();
                               if($statement1->rowCount() > 0)
                               {
                                   $result1 = $statement1->fetchAll();
                                   $sn1=1;
                                   foreach($result1 as $row1)
                                   {
                                        ?>
                                         <tr>
             <td><?php echo $sn1++;?></td>
             <td><?php echo $row1['Courseid'];?></td>
             <td><?php echo $row1['CourseName'];?></td>
             <td><?php echo $row1['CourseNumber'];?></td>
             <td><?php echo $row1['Symbol'];?></td>
             <td><?php echo $row1['StudentNames'];?></td>
             <td><?php echo $row1['CourseManager'];?></td>
             <td><?php echo $row1['DrivingPhaseManager'];?></td>
             <td><?php echo $row1['ParkingPhaseManager'];?></td>
             <td><a onclick="document.getElementById('Courseid').value='<?php echo $row1['Courseid'] ?>';
                            document.getElementById('CourseName').value='<?php echo $row1['CourseName'] ?>';
                            document.getElementById('CourseNumber').value='<?php echo $row1['CourseNumber'] ?>';
                            document.getElementById('Symbol').value='<?php echo $row1['Symbol'] ?>';
                            document.getElementById('StudentNames').value='<?php echo $row1['StudentNames'] ?>';
                            document.getElementById('CourseManager').value='<?php echo $row1['CourseManager'] ?>';
                            document.getElementById('DrivingPhaseManager').value='<?php echo $row1['DrivingPhaseManager'] ?>';
                            document.getElementById('ParkingPhaseManager').value='<?php echo $row1['ParkingPhaseManager'] ?>';
                            " data-toggle="modal" data-target="#editcourse" class="btn btn-success"><i class="fas fa-edit"></i></a>
             </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
                          </div>
                      </div>
            </div>
          <div class="tab-pane fade" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
              <button class="btn btn-success"><a href="newcourse.php">Add New CTP</a></button>
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#select_ctp">Phase</button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#ctp_list" id="btn3">CTP List</button>
              <div class="container">
                        <br>
                         <div class="row">
                        <center>
                          <table style="width:80%;display:none;" class="table table-striped table-bordered" id="list3">
                          <tr>
                        <th>Sr No</th>
                        <th>CTP Id</th>
                        <th>Course Name</th>
                        <th>Manual</th>
                        <th>CourseCode</th>
                        <th>Sponcors</th>
                        <th>Location</th>
                        <th>CourseAim</th>
                        <th>ClassSize</th>
                        <th>Action</th>
                      
                    </tr>
                                <?php 
                             
                               $query2 = "SELECT * FROM ctppage ORDER BY CTPid DESC";
                               $statement2 = $connect->prepare($query2);
                               $statement2->execute();
                               if($statement2->rowCount() > 0)
                               {
                                   $result2 = $statement2->fetchAll();
                                   $sn2=1;
                                   foreach($result2 as $row2)
                                   {
                                        ?>
                                         <tr>
             <td><?php echo $sn1++;?></td>
             <td><?php echo $row2['CTPid'];?></td>
             <td><?php echo $row2['course'];?></td>
             <td><?php echo $row2['manual'];?></td>
             <td><?php echo $row2['CourseCode'];?></td>
             <td><?php echo $row2['Sponcors'];?></td>
             <td><?php echo $row2['Location'];?></td>
             <td><?php echo $row2['CourseAim'];?></td>
             <td><?php echo $row2['ClassSize'];?></td>
             <td><a onclick="document.getElementById('CTPid').value='<?php echo $row2['CTPid'] ?>';
                            document.getElementById('course1').value='<?php echo $row2['course'] ?>';
                            document.getElementById('manual').value='<?php echo $row2['manual'] ?>';
                            document.getElementById('CourseCode').value='<?php echo $row2['CourseCode'] ?>';
                            document.getElementById('Sponcors').value='<?php echo $row2['Sponcors'] ?>';
                            document.getElementById('Location').value='<?php echo $row2['Location'] ?>';
                            document.getElementById('CourseAim').value='<?php echo $row2['CourseAim'] ?>';
                            document.getElementById('ClassSize').value='<?php echo $row2['ClassSize'] ?>';
                            " data-toggle="modal" data-target="#editctp" class="btn btn-success"><i class="fas fa-edit"></i></a>
             </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
                          </div>
                      </div>
         
         
            </div>
          <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">Settings</div>
  </div>
</center>
</div>
<!-- edit vehicle modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Vehicles</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_vechile.php">
              <input type="hidden" name="payid" value="" id="payid">
              <input type="text" name="vec_name" value="" id="vec_name">
              <input type="text" name="vec_type" value="" id="vec_type">
              <input type="text" name="vec_nub" value="" id="vec_nub">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                  </form>
            </div>
          </div>
        </div>
      </div>
      <!-- edit course modal -->
<div class="modal fade" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Vehicles</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_course.php">
                <input type="text" name="Courseid" value="" id="Courseid" readonly>
              <input type="text" name="CourseName" value="" id="CourseName">
              <input type="text" name="CourseNumber" value="" id="CourseNumber">
              <input type="text" name="Symbol" value="" id="Symbol">
              <input type="text" name="StudentNames" value="" id="StudentNames">
              <input type="text" name="CourseManager" value="" id="CourseManager">
              <input type="text" name="DrivingPhaseManager" value="" id="DrivingPhaseManager">
              <input type="text" name="ParkingPhaseManager" value="" id="ParkingPhaseManager">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                  </form>
            </div>
          </div>
        </div>
   </div>   
   <div class="modal fade" id="editctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Vehicles</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_ctp.php">
                <input type="text" name="CTPid" value="" id="CTPid" readonly>
              <input type="text" name="course" value="" id="course1">
              <input type="text" name="manual" value="" id="manual">
              <input type="text" name="CourseCode" value="" id="CourseCode">
              <input type="text" name="Sponcors" value="" id="Sponcors">
              <input type="text" name="Location" value="" id="Location">
              <input type="text" name="CourseAim" value="" id="CourseAim">
              <input type="text" name="ClassSize" value="" id="ClassSize">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                                  </form>
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
                        <button class="btn btn-success" type="submit" name="submit_Phase">Way To Phase</button>
                        </form>
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