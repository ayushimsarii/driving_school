<!--Fethching ctp name-->
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
              $output2 .= '<option value="'.$row2['CTPid'].'">'.$row2['course'].'</option>';
             }
         
         }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>
	<!-- <link href="css/bootstrap.css" rel="stylesheet"> -->

	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="sidestyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--Script for showing tables-->
  <script>
$(document).ready(function(){
  $("#vehiclebtn").click(function(){
    $("#vehicletable").show();
    $("#vehiclesearch").show();
  });
  $("#newcoursebtn").click(function(){
    $("#newcoursetable").show();
    $("#newcoursesearch").show();
  });
  $("#ctpbtn").click(function(){
    $("#ctptable").show();
    $("#ctpsearch").show();
  });
  $("#departmentbtn").click(function(){
    $("#departmenttable").show();
    $("#departmentsearch").show();
  });
  $("#scorebtn").click(function(){
    $("#scoretable").show();
    $("#scoresearch").show();
  });
});
</script>
</head>
<body class="bodyuser">

<!--Head Navbar-->   
	<?php
	include_once 'header.php';
	?>
  <center>
  <li class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;">
          <i style="color:black;" class="fas fa-bell"></i></a>
          <ul class="dropdown-menu"></ul>
        </li>
</center>
<!--Sidenavbar-->
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
        <a class="nav-link" id="score-tab" data-toggle="tab" href="#score" role="tab" aria-controls="score" aria-selected="false"><i class="fas fa-badge-percent"></i>Scoring</a>
      </li>
    <li class="nav-item">
        <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false"><i class="fas fa-cogs"></i> Settings</a>
      </li>
  </ul> <br><br>

  <!--Tab panel for user-->
  <div class="tab-content">
        <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
            <button class="btn btn-success" id="btn-success"><a href="roles.php">Manage Roles</a></button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#newuser">Register User</button>
            <button class="btn btn-warning" id="btn-warning" type="button" data-toggle="modal" data-target="#user_list">User List</button>
        </div>
<!--Tab panel for percentage-->
        <div class="tab-pane fade" id="score" role="tabpanel" aria-labelledby="score-tab">
            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#addpercentage">Insert Percentage</button>
            <button class="btn btn-success" id="scorebtn" type="button">Percentage</button>
            <button class="btn btn-primary" id="permissionbtn" type="button" data-toggle="modal" data-target="#per_list">Permission</button>
            
            <!--Table for percentage-->
            <div class="container">
                        <br>
                         <div class="row">
                          <center>
                      
                          <table style="width:100%;display:none;" class="table table-striped" id="scoretable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="scoresearch" onkeyup="score()" placeholder="Search for name.." title="Type in a name">
                          <thead>
                        <th>Sr No</th>
                        <th>Type</th>
                        <th>Percentage</th>
                        <th>Color</th>
                        <th>Action</th>
                      
                    </thead>
                                <?php 
                               $output6 ="";
                               $query6 = "SELECT * FROM percentage  ORDER BY id ASC";
                               $statement6 = $connect->prepare($query6);
                               $statement6->execute();
                               if($statement6->rowCount() > 0)
                               {
                                   $result6 = $statement6->fetchAll();
                                   $sn6=1;
                                   foreach($result6 as $row6)
                                   {
                                        ?>
                                         <tr>
             <td><?php echo $id=$row6['id'];?></td>
             <td><?php echo $row6['percentagetype'];?></td>
             <td><?php echo $row6['percentage'];?></td>
             <td><?php echo $row6['color'];?></td>
             <td><a onclick="document.getElementById('perid').value='<?php echo $row6['id'] ?>';
                            
                            document.getElementById('percentage_name').value='<?php echo $row6['percentage'] ?>';
                            
                            " data-toggle="modal" data-target="#editpercentage"><i class="fas fa-edit"></i></a>
                            </td>
             </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
                           
                         
                          </center>
                          </div>
                      </div>
        </div>
<!--Tab panel for vehicle-->
          <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
              <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addvehicle">Add Vehicle</button>
              <button class="btn btn-primary">Manage Vehicles</button>
              <button type="button" class="btn btn-warning" id="vehiclebtn">Vehicle List</button>
              <!-- vehicle table -->
                       <div class="container">
                        <br>
                         <div class="row">
                        <center>
                            
                          <table style="display:none;" class="table table-striped table-bordered" id="vehicletable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="vehiclesearch" onkeyup="vehicle()" placeholder="Search for Vehicle name.." title="Type in a name">
                                <thead>
                                    <th>Sr No</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Type</th>
                                    <th>Vehicle Number</th>
                                    <th>Vehicle Spot</th>
                                    <th>Action</th>
                                  
                                </thead>
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
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row['VehicleName'] ?></td>
                                            <td><?php echo $row['VehicleType'] ?></td>
                                            <td><?php echo $row['VehicleNumber'] ?></td>
                                            <td><?php echo $row['VehicleSpot'] ?></td>
                                            <td><a onclick="document.getElementById('payid').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('vec_name').value='<?php echo $row['VehicleName'] ?>';
                                               document.getElementById('vec_type').value='<?php echo $row['VehicleType'] ?>';
                                               document.getElementById('vec_nub').value='<?php echo $row['VehicleNumber'] ?>';
                                               document.getElementById('vec_spt').value='<?php echo $row['VehicleSpot'] ?>';
                                            " data-toggle="modal" data-target="#myModal"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="vec_delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
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
<!-- Tab Panel for New course-->
          <div class="tab-pane fade" id="newcourse" role="tabpanel" aria-labelledby="newcourse-tab">
              <button class="btn btn-success"><a href="newcourse.php">Add New Course</a></button>
              <button class="btn btn-warning" type="button" id="newcoursebtn">New Course List</button>
              <div class="container">
                        <br>
              <!--New course table-->
                         <div class="row" style="width:80%;">
                        <center>
                          <table style="display:none;" class="table table-striped" id="newcoursetable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="newcoursesearch" onkeyup="newcourse()" placeholder="Search for Course name.." title="Type in a name">
                          <thead>
                        <th>Sr No</th>
                        <th>Course Id</th>
                        <th>Course Name</th>
                        <th>Course Date</th>
                        <th>Course Number</th>
                        <th>Symbol</th>
                        <th>Student Names</th>
                        <th>Course Manager</th>
                        <th>Phase Manager</th>
                        <th>Action</th>
                      
                    </thead>
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
             <td><?php echo $Courseid=$row1['Courseid'];?></td>
             <td><?php echo $row1['CourseName'];?></td>
             <td><?php echo $row1['CourseDate'];?></td>
             <td><?php echo $row1['CourseNumber'];?></td>
             <td><?php echo $row1['Symbol'];?></td>
             <td><?php echo $row1['StudentNames'];?></td>
             <td><?php echo $row1['CourseManager'];?></td>
             <td><?php echo $row1['Phase_manager'];?></td>
             <td><a onclick="document.getElementById('Courseid').value='<?php echo $row1['Courseid'] ?>';
                            document.getElementById('CourseName').value='<?php echo $row1['CourseName'] ?>';
                            document.getElementById('CourseNumber').value='<?php echo $row1['CourseNumber'] ?>';
                            document.getElementById('Symbol').value='<?php echo $row1['Symbol'] ?>';
                            document.getElementById('StudentNames').value='<?php echo $row1['StudentNames'] ?>';
                            document.getElementById('CourseManager').value='<?php echo $row1['CourseManager'] ?>';
                            document.getElementById('DrivingPhaseManager').value='<?php echo $row1['Phase_manager'] ?>';
                            " data-toggle="modal" data-target="#editcourse"><i class="fas fa-edit"></i></a>
                            <a href="newcourse_delete.php?Courseid=<?php echo $Courseid?>"><i class="fas fa-trash"></i></a>
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
<!--Tab panel for Ctp-->
          <div class="tab-pane fade" id="ctp" role="tabpanel" aria-labelledby="ctp-tab">
              <button class="btn btn-success"><a href="ctp.php">Add New CTP</a></button>
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#select_ctp">Phase</button>
              <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#ctp_list" id="ctpbtn">CTP List</button>
              <div class="container">
                        <br>
              <!--CTP table-->
                         <div class="row" style="width:90%;">
                        <center>
                          <table style="display:none;" class="table table-striped" id="ctptable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="ctpsearch" onkeyup="ctp()" placeholder="Search for Course name.." title="Type in a name">
                          <thead class="thead-dark">
                        <th>Sr No</th>
                        <th>CTP Id</th>
                        <th>Course Name</th>
                        <th>Manual</th>
                        <th>Type</th>
                        <th>Vehicle Type</th>
                        <th>CourseCode</th>
                        <th>Sponcors</th>
                        <th>Location</th>
                        <th>CourseAim</th>
                        <th>ClassSize</th>
                        <th>Action</th>
                      
                    </thead>
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
             <td><?php echo $CTPid=$row2['CTPid'];?></td>
             <td><?php echo $row2['course'];?></td>
             <td><?php echo $row2['manual'];?></td>
             <td><?php echo $row2['type'];?></td>
             <td><?php echo $row2['vehtype'];?></td>
             <td><?php echo $row2['CourseCode'];?></td>
             <td><?php echo $row2['Sponcors'];?></td>
             <td><?php echo $row2['Location'];?></td>
             <td><?php echo $row2['CourseAim'];?></td>
             <td><?php echo $row2['ClassSize'];?></td>
             <td><a onclick="document.getElementById('CTPid').value='<?php echo $row2['CTPid'] ?>';
                            document.getElementById('course1').value='<?php echo $row2['course'] ?>';
                            document.getElementById('manual').value='<?php echo $row2['manual'] ?>';
                            document.getElementById('type').value='<?php echo $row2['type'] ?>';
                            document.getElementById('vehtype').value='<?php echo $row2['vehtype'] ?>';
                            document.getElementById('CourseCode').value='<?php echo $row2['CourseCode'] ?>';
                            document.getElementById('Sponcors').value='<?php echo $row2['Sponcors'] ?>';
                            document.getElementById('Location').value='<?php echo $row2['Location'] ?>';
                            document.getElementById('CourseAim').value='<?php echo $row2['CourseAim'] ?>';
                            document.getElementById('ClassSize').value='<?php echo $row2['ClassSize'] ?>';
                            " data-toggle="modal" data-target="#editctp"><i class="fas fa-edit"></i></a>
                            <a href="ctp_delete.php?CTPid=<?php echo $CTPid?>"><i class="fas fa-trash"></i></a>
             </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
                          </div>
                      </div>
         
         
            </div>
<!-- Tab panel for setting-->
          <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
              <button class="btn btn-primary" id="departmentbtn">Department</button>
              <div class="container">
                        <br>
                        <!--Table for home page data-->
                         <div class="row">
                        <center>

                          <table style="width:100%;display:none;" class="table table-striped table-bordered" id="departmenttable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="departmentsearch" onkeyup="department()" placeholder="Search for name.." title="Type in a name">
                          <thead>
                        <th>Sr No</th>
                        <th>Id</th>
                        <th>School Name</th>
                        <th>Department Name</th>
                        <th>Type</th>
                        <th>Action</th>
                      
                    </thead>
                                <?php 
                             
                               $query2 = "SELECT * FROM homepage ORDER BY id ASC";
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
             <td><?php echo $row2['id'];?></td>
             <td><?php echo $row2['school_name'];?></td>
             <td><?php echo $row2['department_name'];?></td>
             <td><?php echo $row2['type'];?></td>
             <td><a onclick="document.getElementById('id').value='<?php echo $row2['id'] ?>';
                            document.getElementById('school_name').value='<?php echo $row2['school_name'] ?>';
                            document.getElementById('department_name').value='<?php echo $row2['department_name'] ?>';
                            document.getElementById('type').value='<?php echo $row2['type'] ?>';
                            " data-toggle="modal" data-target="#editdepartment"><i class="fas fa-edit"></i></a>
                            <a href="department_delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></a></i>
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
   <!--Edit Ctp modal-->
   <div class="modal fade" id="editctp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit CTP</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_ctp.php">
                <input type="text" name="CTPid" value="" id="CTPid" readonly>
              <input type="text" name="course" value="" id="course1">
              <input type="text" name="manual" value="" id="manual">
              <input type="text" name="type" value="" id="type">
              <input type="text" name="vehtype" value="" id="vehtype">
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
<!--Edit Department modal-->
<div class="modal fade" id="editdepartment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_department.php">
              <input type="hidden" name="id" value="" id="id">
              <input type="text" name="school_name" value="" id="school_name">
              <input type="text" name="department_name" value="" id="department_name">
              <input type="text" name="type" value="" id="type">
              <input class="btn btn-primary" type="submit" name="submit" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>

<!--Edit Percentage Table-->
<div class="modal fade" id="editpercentage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Percentage</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="edit_percentage.php">
              <input type="hidden" name="id" value="" id="perid">
              <!-- <input type="text" name="percentagetype" value="" id="percentage_type"> -->
              <input type="text" name="percentage" value="" id="percentage_name">
              <!-- <input type="text" name="color" value="" id="percentage_color"> -->
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
                            </div>
                            
                            <div class="form-outline">
                                <label class="form-label" for="coursename">Vehicle Spot</label>
                                <input type="text" id="coursecode" name="VehicleSpot" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="submitvehicle" />
                        </form>
                </center>
              </div>
            </div>
          </div>
        </div>

<!--Add Percentage modal-->
<div class="modal fade" id="addpercentage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Percentage</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                        <form action="insert_percentage_data.php" method="post">

                            <div class="form-outline">
                                <label class="form-label" for="percentagetype">Percentage Type</label>
                                <input type="text" id="course" name="percentagetype" class="form-control form-control-md" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="percentage">Percentage</label>
                                <input type="text" id="addmanual" name="percentage" class="form-control form-control-md" />
                            </div>

                            <div class="form-outline">
                                <label class="form-label" for="color">Color</label>
                                <input type="text" id="coursecode" name="color" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="submitpercentage" />
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

<!--register new user modal-->
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
 <form id="add_user_fetch" method="post" style="width: 80%; border: 2 px solid black;" class="form form-border" action="admin_register_user.php" novalidate>
 <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>         
                            <div class="col-md-12">
                            <input type="file" name="image" class="form-control" required>
                               
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" id="nameuser" placeholder="Full Name" required>
                              
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="studid" placeholder="Student Id" required>
                               
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="nickname" placeholder="Nick Name" required>
                               
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="tel" name="phone" placeholder="Enter Your Phone Number" required>
                                 
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
                                
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" name="username" placeholder="Username" required />
                               
                            </div>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="email" id="useremail" placeholder="Email Adress">
                             
                            </div>

                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               
                           </div>


                           <div class="col-md-12 mt-2">
                            <label class="mb-3 mr-1" for="gender">Gender: </label>

                            <input type="radio" class="btn-check" name="gender" value="Male" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" value="female" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>

                            <input type="radio" class="btn-check" name="gender" value="secret" autocomplete="off" required>
                            <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>
                              
                            </div>
                            <input class="btn btn-primary" type="submit" name="upload" value="Register">
                        <!-- <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                          <label class="form-check-label">I confirm that all data are correct</label>
                         <div class="invalid-feedback">Please confirm that the entered data are all correct!</div>
                        </div> -->
                  

                            <!-- <div class="form-button mt-2">
                                <input class="btn btn-primary" type="submit" name="upload" value="Register">
         <p class="link"><a href="login.php">Click to Login</a></p>
                            </div> -->
                        </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="per_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Grade List</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
              <form method="get" action="update_grade_per.php">
              <table class="table table-striped">
               
                          <thead>
                        <th>Sr No</th>
                        <th>Type</th>
                        
                        <th>Action</th>
                      
                    </thead>
                                <?php 
                               $grade_per="";
                               $que = "SELECT * FROM grade_per ORDER BY id ASC";
                               $stat = $connect->prepare($que);
                               $stat->execute();
                               if($stat->rowCount() > 0)
                               {
                                   $result6 = $stat->fetchAll();
                                   $sn7=1;
                                   foreach($result6 as $row6)
                                   {
                                        ?>
                                         <tr>
                                        <td><?php echo $sn7++;?></td>
                                        <td><?php echo $row6['grade'];?></td>
                                        <td>
                                        <input type="hidden" name="grade_name[]" value="<?php echo $row6['grade']?>">
                                          <input type="checkbox" value="1" <?php if ($row6['permission'] == "1") {
                                            echo 'checked';
                                        } ?> name="grade[<?php echo $row6['grade'];?>]">
                                        </td>
             
                                       </tr>
              <?php
                                        }
                                    
                                    }        
       ?>      
       
                            </table>
                            <button class="btn btn-success" type="submit" name="savephase">Submit</button>
                            </form>
              </div>
            </div>
          </div>
        </div>
<!--Fetch User List-->
<div class="modal fade" id="user_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"> 
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
 $query = "SELECT * FROM users  ORDER BY id ASC";
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
             <td><a href="edituser-update.php?id='.$row["id"].'"><i class="fas fa-edit"></i></a>
            <a href="user-delete.php?id='.$row["id"].'"><i class="fas fa-trash"></i></a></td>
             </tr>
             ';
         }
     
     }
?>
                <center>
                <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                <table class="table table-striped table-bordered" id="usertable">
                    <thead>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Id</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>email</th>
                        <th>Action</th>
                      
                    </thead>
                        <?php
                            echo $output;
                        ?>                
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
<!--Search Bar for user table-->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("usertable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--Search bar for ctp table-->
<script>
function ctp() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("ctpsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("ctptable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--Search Bar for New course table-->
<script>
function newcourse() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("newcoursesearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("newcoursetable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--Search Bar for Vehicle table-->
<script>
function vehicle() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("vehiclesearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("vehicletable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--Search Bar for home pafe table-->
<script>
function department() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("departmentsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("departmenttable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--search bar for percentage table-->
<script>
function score() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("scoresearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("scoretable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


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
		if($('#nameuser').val() != '' && $('#useremail').val() != ''){
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

   <!--  <?php
include_once 'footer.php';
?> -->
</body>
</html>