<?php
include('connect.php');
if(isset($_GET['class_name'])){
$class_name=$_GET['class_name'];
}
$phase_id="";
$phase_id=$_GET['Phase_id'];
$actclass="";
$simclass="";
$academicclass="";
$vehnum="";
$vehtype="";
$in="";
$class="";
$classid="";

$q2= "SELECT * FROM users where role='Instructor'";
$st2 = $connect->prepare($q2);
$st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $in.= '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
         }
     
     }

     $q3="SELECT * FROM actual";
     $st3 = $connect->prepare($q3);
     $st3->execute();
     if($st3->rowCount() > 0)
     {
       $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
       {
         $actclass.='<option value="'.$row3['symbol'].'">'.$row3['symbol'].'</option>';
       }
     }
     
     $q4="SELECT * FROM sim";
     $st4 = $connect->prepare($q4);
     $st4->execute();
     if($st4->rowCount() > 0)
     {
       $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
       {
         $simclass.='<option value="'.$row4['shortsim'].'">'.$row4['shortsim'].'</option>';
       }
     }
     
     $q5="SELECT * FROM academic";
     $st5 = $connect->prepare($q5);
     $st5->execute();
     if($st5->rowCount() > 0)
     {
       $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
       {
         $academicclass.='<option value="'.$row5['shortacademic'].'">'.$row5['shortacademic'].'</option>';
       }
     }

	 $q6="SELECT * FROM vehicle";
     $st6 = $connect->prepare($q6);
     $st6->execute();
     if($st6->rowCount() > 0)
     {
       $re6 = $st6->fetchAll();
       foreach($re6 as $row7)
       {
         $vehnum.='<option value="'.$row7['id'].'">Number: '.$row7['VehicleNumber'].', Type: '.$row7['VehicleType'].'</option>';
       }
     }

	 $q7="SELECT * FROM vehicle";
     $st7 = $connect->prepare($q7);
     $st7->execute();
     if($st7->rowCount() > 0)
     {
       $re7 = $st7->fetchAll();
       foreach($re7 as $row8)
       {
         $vehtype.='<option value="'.$row8['VehicleType'].'">'.$row8['VehicleType'].'</option>';
       }
     }

     $per_table_data="";
     $per="SELECT * FROM percentage";
     $per5 = $connect->prepare($per);
     $per5->execute();
     if($per5->rowCount() > 0)
     {
       $reper55 = $per5->fetchAll();
       $sn=1;
       foreach($reper55 as $rowper5)
       {
         $per_table_data.='<tr>
         <td>'.$sn++.'</td>
         <td>'.$rowper5['percentagetype'].'</td>
             <td>'.$rowper5['percentage'].'</td>
             <td>'.$rowper5['color'].'</td>
                 
         </tr>';
       }
     }
	 $q5="SELECT * FROM academic";
     $st5 = $connect->prepare($q5);
     $st5->execute();
     if($st5->rowCount() > 0)
     {
       $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
       {
         $academicclass.='<option value="'.$row5['shortacademic'].'">'.$row5['shortacademic'].'</option>';
       }
     }

     $mysqli = new mysqli("localhost","root","","driving_school");

     // Check connection
     if ($mysqli->connect_errno) {
       echo "Failed to connect to MySQL: " . $mysqli->connect_error;
       exit();
     }

     $sql = "SELECT * FROM  itembank";
$st = $mysqli->query($sql);
$students = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$students[] = $row;
	}
}
?>
<?php
/** database connection **/
$mysqli = new mysqli("localhost","root","","driving_school");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

/**
* get students **/
$sql = "SELECT * FROM  itembank";
$st = $mysqli->query($sql);
$students = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$students[] = $row;
	}
}

/**
* get jobs **/
$sql2 = "SELECT * FROM sub_item";
$jb = $mysqli->query($sql2);
$jobs = array();
if ($jb->num_rows > 0) 
{
	// output data of each row
	while($row = $jb->fetch_assoc()) 
	{
		$jobs[] = $row;
	}
}

$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Actual Page</title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<!--<link href="css/bootstrap.css" rel="stylesheet">-->

	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="sidestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>


<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
?>
  <!--Username dashboard info-->
  <div class="container">

	<!--User info fetched in the input box-->
      <div class="container" id="std-info">
      <h3>Gradesheet</h3><?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
	<div>
    <!-- Student name :  -->
    <!-- <?php echo $phpcourse; echo $fetchname?><br> -->
	<h5>Course name : <span><?php echo $std_course.'<br>'?></span> </h5>
  <?php echo $std_course.'<br>';
  if(isset($_GET['id'])){
$classid=$_GET['id'];
  }
  if(isset($_GET['class'])){
    echo '<h5>class : </h5>'.$class=$_GET['class'];
    }else{
      echo 'class :<span style="color:red">select class</span>';  
    }
   
  ?>

  <br>
</div>  
      	<div class="row" style="width:100%;">
      		<div class="col-8">
          <form method="get" action="submit_gradesheet.php" style="width:95%;">
      			<table>
                              <tr>
                              <input class="form-control" type="hidden" name="stud_db_id" value="<?php echo $fetchuser_id?>">
                              <input class="form-control" type="hidden" name="class_name" value="<?php echo $class_name?>">
                              <input type="hidden" name="phases_id" value="<?php echo $phase_id?>">
                              <input type="hidden" name="course_id" value="<?php echo $phpcourse?>">
                              <input type="hidden" name="class_id" value="<?php echo $classid?>">
                              
                            <td><label>Id</label><input class="form-control" type="text" name="stud_id" readonly value="<?php echo $fetchid?>"></td>
                                <td><label>Name</label><input class="form-control" type="text" name="stud_name" readonly value="<?php echo $fetchname?>"></td>
                              </tr>
                              <tr>
                                <td><label>Role</label><input class="form-control" type="text" name="stud_role" readonly value="<?php echo $fetchrole?>"></td>
                                <td><label>Phone</label><input class="form-control" type="text" name="stud_phone" readonly value="<?php echo $fetchphone?>"></td>
                              </tr>
                              <tr>
                                <?php
     $stu_grade="SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$phpcourse' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
     $st = $connect->prepare($stu_grade);
     $st->execute();
     if($st->rowCount() > 0)
     {
       $re = $st->fetchAll();
       
       foreach($re as $value)
       {
        //fetch instructor of selected std if set
$std_in=$value['instructor'];
$instr_name= $connect->prepare("SELECT name FROM `users` WHERE id=?");
$instr_name->execute([$std_in]);
$name1 = $instr_name->fetchColumn();
//fetch vechile   
$vec_id=$value['vehicle']; 
$vec_name= $connect->prepare("SELECT VehicleNumber FROM `vehicle` WHERE id=?"); 
$vec_name->execute([$vec_id]);
$name2 = $vec_name->fetchColumn(); 
$vec_type= $connect->prepare("SELECT VehicleType FROM `vehicle` WHERE id=?"); 
$vec_type->execute([$vec_id]);
$name3 = $vec_type->fetchColumn();  
$st_time=$value['time'];
$st_date=$value['date']; 

$st_date=strtotime($st_date);           
}}
      ?>
                                <td><label class="form-label" for="Instructor">Instructor</label>
                                    <select type="text" id="instructor" class="form-control form-control-md" name="instructor_id" required>
                                    <?php if($std_in != ""){?>  
                                      <option selected disabled value="<?php echo $std_in ?>"><?php echo $name1?></option>
                                    <?php }else{ ?>  
                                    <option selected disabled value="">-select instructor-</option>
                                    <?php } ?>
                                        <?php echo $in?>
                                    </select></td>
                                    <td><label>Vehicle</label>
							                     <select type="text" class="form-control form-control-md" name="vechile_id" required>
                                       <?php if($vec_id != ""){?> 
                                        <option selected disabled value="<?php echo $vec_id ?>"><?php echo 'Number: '.$name2.', Type: '.$name3?></option>
                                    <?php }else{ ?> 
                                   <option selected disabled value="">-select Number-</option>
                                   <?php } ?>
                                        <?php echo $vehnum?>
                                    </select>
							                 </td>
                              </tr>
                              <tr>
                              <td><label>Time</label><input class="form-control" type="time" value="<?php if(isset($st_time)){$date = date("H:i", strtotime($st_time)); echo "$date";} ?>" name="time"></td>
                              <td><label>Date</label><input class="form-control" type="date" value="<?php echo date('Y-m-d',$st_date);?>" name="date"></td>
                              </tr> 
                              </table>
                              <?php


$lock="SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$phpcourse' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
$lockst = $connect->prepare($lock);
$lockst->execute();
if($lockst->rowCount() > 0)
{ 
 $re = $lockst->fetchAll();
     foreach($re as $row)
     {
      if($row['status'] == '1' && $role =='super admin'){?>
    <button onclick="document.getElementById('gradesheetid').value='<?php echo $row['id'] ?>';" class="btn btn-warning" type="button" data-toggle="modal" data-target="#unlock" id="ctpbtn">Unlock</button>
<?php } }}
?>


      		</div>
<!--Prereuisites container-->
      		<!-- <div class="col-4">
            <div class="dropdown">
                  <label style="font-size:20px; font-weight:bolder;">Prereuisites</label>
                    <select style="width:100%;" type="text" id="country" class="form-control multiple-select" name="class[]" searchable="Search here.." multiple>
                      <option style="font-size:larger;" selected disabled value="">Add</option>
                      <?php echo $actclass?>
                      <?php echo $academicclass?> 
                      <?php echo $simclass?>
                    </select>
            </div>
  
      		</div> -->
        

			
			
      	</div>
      </div>
     
      
<!--Comment box Container-->
<div class="container">
  <div class="row" style="width:100%;">
    <div class="col-8">
      <center>
  

					<table class="table table-bordered target-table" id="radio">
							<thead class="thead-dark" style="background-color:black;">
								<tr>
									<th>Id</th>
									<th>Name</th>
									<th>Grade</th>
						
								</tr>
							</thead>
							<tbody>
                <?php 
                //fetch item
                $allitem = "SELECT * FROM item where course_id='$phpcourse' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
                $statement = $connect->prepare($allitem);
                $statement->execute();
                 
                if($statement->rowCount() > 0)
                  {
                    $result = $statement->fetchAll();
                    $sn=1;
                    foreach($result as $row)
                    {?>
                      <tr class="Myitem">
                        <td><?php echo $sn++?></td>
                        <td><?php $item_id=$row['item'];$q= $connect->prepare("SELECT item FROM `itembank` WHERE id=?");
                              $q->execute([$item_id]);
                              $name = $q->fetchColumn();
                              echo $name;
                           $item_db_id=$row['id'];

                              $fetch_grade= $connect->prepare("SELECT grade FROM `item_gradesheet` WHERE item_id=? AND user_id=?");
                              $fetch_grade->execute([$item_db_id,$fetchuser_id]);
                              $grade = $fetch_grade->fetchColumn();
                             
                              ?>
                                 <input type="hidden" name="items_id[]" value="<?php echo $item_db_id?>">
                                 <input type="hidden" name="std_idies[]" value="<?php echo $item_id?>">
                                 <input type="hidden" name="std_sub[]" value="item">
                        </td>
                        <td style="display: flex;">
                      
                      <input id="itemU" type="radio" class="myRadio" <?php if($grade=="U") {echo "checked";}?> value="U" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-U">U</label>
                      <input id="itemF" type="radio" class="myRadio" <?php if($grade=="F") {echo "checked";}?> value="F" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-F">F</label>
                      <input id="itemG" type="radio" class="myRadio" <?php if($grade=="G") {echo "checked";}?> value="G" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-G">G</label>
                      <input id="itemV" type="radio" class="myRadio" <?php if($grade=="V") {echo "checked";}?> value="V" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-V">V</label>
                      <input id="itemE" type="radio" class="myRadio" <?php if($grade=="E") {echo "checked";}?> value="E" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-E">E</label>
                      <input id="itemN" type="radio" class="myRadio" <?php if($grade=="N") {echo "checked";}?> value="N" name="grade[item<?php echo $item_id?>]"/>
                      <label for="item-N">N</label>
                      </td>
                       </tr>
                       <!-- fetch subitem -->
                       <?php
                        $allsubitem = "SELECT * FROM subitem where course_id='$phpcourse' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name' AND item='$item_id'";
                        $statement = $connect->prepare($allsubitem);
                        $statement->execute();
                         
                        if($statement->rowCount() > 0)
                          {
                            $result1 = $statement->fetchAll();
                            $sn1='A';
                            foreach($result1 as $row1)
                            {
                        ?>
                        <tr>
                          <td><?php echo $sn1++ ;?></td>
                          <td><?php echo $sub_value=$row1['subitem'];
                          $subitem_db_id=$row1['id'];
                          $fetch_subgrade= $connect->prepare("SELECT grade FROM `subitem_gradesheet` WHERE subitem_id=? AND user_id=?");
                          $fetch_subgrade->execute([$subitem_db_id,$fetchuser_id]);
                          $grade1 = $fetch_subgrade->fetchColumn();
                         ?>
                          <input type="hidden" name="items_id[]" value="<?php echo $subitem_db_id?>">
                                <input type="hidden" name="std_idies[]" value="<?php echo $item_id?>">
                                 <input type="hidden" name="std_sub[]" value="<?php echo $sub_value?>"></td>
                      <td style="display: flex;">
                      <input type="radio" value="U" class="myRadio" <?php if($grade1=="U") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>U
                      <input type="radio" value="F" class="myRadio" <?php if($grade1=="F") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>F
                      <input type="radio" value="G" class="myRadio" <?php if($grade1=="G") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>G
                      <input type="radio" value="V" class="myRadio" <?php if($grade1=="V") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>V
                      <input type="radio" value="E" class="myRadio" <?php if($grade1=="E") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>E
                      <input type="radio" value="N" class="myRadio" <?php if($grade1=="N") {echo "checked";}?> name="grade[<?php echo $sub_value.$item_id?>]"/>N
                      </td>
                            </tr>
                        <?php  
                        }
                        }
                      }
                    }
                      ?>
                      
							</tbody>
						</table>


          
			
</center>
    </div>
           <div class="col-4">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
          </div>
        </div>

        <div class="row" style="width:100%;">
            <div class="col-8">
              <center>
                
                  <textarea style="width:90%;" name="overall_data">Overall</textarea><br>
                  <button type="button" data-toggle="modal" data-target="#additional-training" class="btn btn-success">Additional Training</button>
             
              </center>
            </div>

            <div class="col-4">
            <table>
				<center>
				<button class="btn btn-info" type="button" data-toggle="modal" data-target="#detailsper"><i class="fas fa-info-circle"></i></button></center>
        <tr>
          <?php 
          $overall_grade= $connect->prepare("SELECT over_all_grade, over_all_grade_per FROM `gradesheet` WHERE user_id=? and course_id=? AND class_id=? AND phase_id=? AND class=?");
          $overall_grade->execute([$fetchuser_id,$phpcourse,$classid,$phase_id,$class_name]);
          $fetch_overall_grade = $overall_grade->fetchColumn();
  ?>
                   <td style="display: flex;">
                      
                         <input type="radio" class="myRadio" value="U" <?php if($fetch_overall_grade=="U") {echo "checked";}?> id="U" name="overall_grade"/><span style="font-weight:bold;" id="u1">U</span>
                      
                         <input type="radio" class="myRadio" value="F" <?php if($fetch_overall_grade=="F") {echo "checked";}?> id="F" name="overall_grade"/><span style="font-weight:bold;" id="f1">F</span>
                    
                         <input type="radio" class="myRadio" value="G" <?php if($fetch_overall_grade=="G") {echo "checked";}?> id="G" name="overall_grade"/><span style="font-weight:bold;" id="g1">G</span>
                      
                         <input type="radio" class="myRadio" value="V" <?php if($fetch_overall_grade=="V") {echo "checked";}?> id="V" name="overall_grade"/><span style="font-weight:bold;" id="v1">V</span>
                     
                         <input type="radio" class="myRadio" value="E" <?php if($fetch_overall_grade=="E") {echo "checked";}?> id="E" name="overall_grade"/><span style="font-weight:bold;" id="e1">E</span>
                      
                         <input type="radio" class="myRadio" value="N" <?php if($fetch_overall_grade=="N") {echo "checked";}?> id="N" name="overall_grade"/><span style="font-weight:bold;" id="n1">N</span>
                     
                   </td>
				</tr>

                  <tr>
                    <td>
                      <span id="slider_value" style="color:red; font-size:20px; font-weight:bolder; display:none;"></span>
                      <input type="hidden" required name="overall_grade_per" id="silder_get_value">

                      <input maxlength="5" size="3" style="color:blue;" type="number" class="form-control" id="gradesper" onkeyup="displayRadioValue(this.value);"/>

                      <!-- <input type="range" maxlength="100" class="form-range" id="gradesper" onchange="displayRadioValue(this.value);"/> -->

                    </td>
                  </tr>

                   <tr><td>
                    <?php
                    if(isset($_GET['per'])){
                    echo $percentage=$_GET['per'];
                    }?></td>
                    </tr>
                    <tr>
                      <td><input type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')" /></td>
                    </tr>

   
                </table>
                </form>
            </div>
        </div>
      </div>
      <div class="modal fade" id="unlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <H3>Unlock gradesheet</h3>
        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <form action="unlock_sheet.php" method="GET">
            <input type="text" value="" id="gradesheetid" name="gradesheetid">
            <input class="form-control" type="text" class="login-input" name="username" placeholder="Admin Username" autofocus="true"/>

                        <input class="form-control" type="password" id="password" class="login-input" name="password" placeholder="Admin Password"/>
                       
                         <input class="btn btn-primary" type="submit" value="Login" name="login" class="login-button"/>
          </form>


        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!--modal for percentage info-->
<div class="modal fade" id="detailsper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Percentage</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                <table class="table table-striped table-bordered">
								<tr>
									<th>Id</th>
									<th>Type</th>
									<th>Percentage</th>
                  <th>Color</th>
								</tr>
								<?php echo $per_table_data?>
							</table>
                </center>
              </div>
            </div>
          </div>
        </div>
    

<!--Additional Training modal-->

<div class="modal fade" id="additional-training" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Additional Item</h5>
						<button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fas fa-times"></i></span>
						</button>
					</div>
					<div class="modal-body">
          <form method="get" action="tasklog.php">
						<table class="table table-bordered src-table1" id="itemtablesearch">
						<input class="form-control" type="text" id="itemsearch" onkeyup="item()" placeholder="Search for Item.." title="Type in a name">
							<thead>
								<tr>
									<th><input type="checkbox" id="select-all"></th>
									<th>Id</th>
									<th>Item</th>
								
								</tr>
							</thead>
							<tbody>
								<?php 
								$studentJobsArr = array();
								if(count($students) > 0)
								{
									$studentJobsArr[] = 
									$totalStudents = count($students);
									$i = 0;
									foreach($students as $student)
									{
										?>
										<tr>
											<td><input type="checkbox" id="itemchecklist" name="itemchecklist[]" value="<?php echo $student['item']?>"></td>
                      <td>
                        <input type="hidden" name="class" value="<?php echo $class ?>">
                      <?php echo $student['id'];?></td>
											<td><?php echo $student['item'];?></td>
										</tr>
										<?php
										$i++;
									}
								}
								?>
								      
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
					
						<button type="submit" class="btn btn-primary" id="submitstudent">Select</button>
              </form>
					</div>
				</div>
			</div>
		</div>

<!--edit item modal-->
<div class="modal fade" id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit item</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <form method="post" action="edit_item.php">
					<input type="hidden" name="id" value="" id="item_id">
					<input type="text" name="item" value="" id="item_name">
					<input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<!--edit subitem modal-->
<div class="modal fade" id="editsubitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Subitem</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
              <div class="modal-body">
                <form method="post" action="edit_subitem.php">
					<input type="hidden" name="id" value="" id="subitem_id">
					<input type="text" name="item" value="" id="subitem_name">
					<input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 
  $(".multiple-select").select2({
 // maximumSelectionLength: 2
 
});
</script>

<?php 
  $lock="SELECT * FROM gradesheet where user_id='$fetchuser_id' and course_id='$phpcourse' AND class_id='$classid' AND phase_id='$phase_id' AND class='$class_name'";
  $lockst = $connect->prepare($lock);
  $lockst->execute();
  if($lockst->rowCount() > 0)
  { 
   $re = $lockst->fetchAll();
       foreach($re as $row)
       {
        if($row['status'] == '1'){?>
   <script>
    $(document).ready(function(){
     $(".myRadio").attr('disabled', true);
    });
    </script>
 <?php } }}
?>
<script>
	function genCharArray(charA, charZ) {
	var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0);
	for (; i <= j; ++i) {
		a.push(String.fromCharCode(i));
	}
	return a;
}
	
	$(document).on("click","#submitstudent",function()
	{
		var rows = "";
		var arr = [];
		//var selectedStudents = $(".src-table1 input:checked").parents("tr").clone();
		var valujes = $('input[name="itemcheck[]"]').val();
	
		$('input[name="itemcheck[]"]:checked').each(function() {
			 arr.push({name:this.value,ides:this.id});
		});
		//var rowId = $(".src-table1 input:checked").parents("tr").attr('data-tr-id');
		//console.log(arr);
		for (i = 0; i < arr.length; ++i)
		{
			var student = $("#check_"+i).attr('data-name-'+i);
			var sid = $("#check_"+i).attr('data-tr-id_'+i);
			//console.log(arr[0]['name']);
			rows+= '<tr><td>'+arr[i]['ides']+'</td><td>'+arr[i]['name']+' <br /> \
      <button type="button" class="btn btn-primary mybutton" data-toggle="modal" data-target="#insert subitem" data-db-id="'+arr[i]['ides']+'" data-student="'+sid+'"><i class="fas fa-plus"></i>Subitem</button>\
      <input style="display:none;" type="text" id="std_db_id" value="'+arr[i]['ides']+'" name="std_idies[]">\
      <input style="display:none;"  type="text" name="std_sub[]" value="item"></td>\
      <td style="display:flex;"><input type="radio" name="grade[item'+arr[i]['ides']+']"  value="U"/> U\
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="F"/> F \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="G"/> G \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="V"/> V \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="E"/> E \
       <input type="radio" name="grade[item'+arr[i]['ides']+']" value="N"/> N \
        </td><td><button class="btn btn-danger" id="rembtn">Remove</button></td></tr>\
        <tr id="job_description_'+sid+'"></tr>';
		}
		
		$(".target-table tbody").after(rows);
	});
	
	$(document).on("click","#submitjob",function()
	{
		var stId = $(this).attr("data-studentid");
		var stdbId = $(this).attr("data-studendbtid");
		var rows = "";
		var arr = [];
		var rowids = [];
		console.log(stdbId);
		var value = $('input[name="subcheck[]"]').val();
		$('input[name="subcheck[]"]:checked').each(function(index, item) {
			arr.push(this.value);
			rowids.push($(item).attr('data-row-id'));
			indexsas = $(item).attr('data-row-id');
		});
			var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
	
		if(arr.length == 1)
		{
			rows = "";
			var job = $("#jobinfo_"+indexsas).attr('data-name-'+indexsas);
			var jid = $("#jobinfo_"+indexsas).attr('data-tr-id_'+indexsas);
			
			rows+= '<tr><td style="width:100px;" class="td">'+alphabet[0].toUpperCase()+'</td><td>'+arr[0]+'\
      <input style="display:none;" type="text" name="std_idies[]" value="'+stdbId+'"> \
      <input style="display:none;" type="text" name="std_sub[]" value="'+arr[0]+'"> </td> \
      <td style="display:flex;"><input type="radio" name="grade['+arr[0]+stdbId+']" value="U"/> U \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="F"/> F \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="G"/> G \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="V"/> V \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="E"/> E \
      <input type="radio" name="grade['+arr[0]+stdbId+']" value="N"/> N \
      </td><td style="width:100px;"><button class="btn btn-danger" id="rembtn2">Remove</button></td></tr><br>';
					$("#job_description_"+stId).before(rows);
		}
		else{
			for (j = 0; j < arr.length; ++j)
			{
				rows = "";
				var job = $("#jobinfo_"+j).attr('data-name-'+j);
				var jid = $("#jobinfo_"+j).attr('data-tr-id_'+j);
				rows+= '<tr><td>'+alphabet[j].toUpperCase()+'</td>\
				<td>'+arr[j]+'<input style="display:none;" type="text" name="std_idies[]" value="'+stdbId+'">\
				<input style="display:none;" type="text" name="std_sub[]" value="'+arr[j]+'"> </td>\
				 <td style="display:flex;"><input type="radio" name="grade['+arr[j]+stdbId+']" value="U"/> U\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="F"/> F\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="G"/> G\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="V"/> V\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="E"/> E\
				 <input type="radio" name="grade['+arr[j]+stdbId+']" value="N"/> N\
				 </td><td><button class="btn btn-danger" id="rembtn1">Remove</button></td></tr>';
				$("#job_description_"+stId).before(rows);	
			}
		}
		arr=[];

	});
	
	$( document ).on("click", ".mybutton", function(){
		var studentId = $(this).attr("data-student");
	
		$("#submitjob").attr("data-studentid", studentId);
	});
	$( document ).on("click", ".mybutton", function(){
		var studentdbId = $(this).attr("data-db-id");
		$("#submitjob").attr("data-studendbtid", studentdbId);

	});
	

</script>

<script>
$(document).ready(function(){
 
  $('#gradesper').on('change', function(){
    var inst_id = $(this).val();
    console.log(inst_id);
    if(inst_id){
    $('#silder_get_value').val(inst_id);
    }
   });
 $("#radio").on('click','#rembtn',function(){
       $(this).closest('tr').remove();
     });

	 $("#radio").on('click','#rembtn1',function(){
       $(this).closest('tr').remove();
     });

	 $("#radio").on('click','#rembtn2',function(){
       $(this).closest('tr').remove();
     });

});

</script>

<!--Search for additional training-->
<script>
function item() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("itemsearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("itemtablesearch");
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#itemU").click(function(){
            var rVal = $("#itemU:checked").val();
            if(rVal){
              $(".Myitem").css("background-color", "red");
            }
        });

        $("#itemF").click(function(){
            var rVal1 = $("#itemF:checked").val();
            if(rVal1){
              $(".Myitem").css("background-color", "yellow");
            }
        });

        $("#itemG").click(function(){
            var rVal2 = $("#itemG:checked").val();
            if(rVal2){
              $(".Myitem").css("background-color", "#3EC70B");
            }
        });

        $("#itemV").click(function(){
            var rVal3 = $("#itemV:checked").val();
            if(rVal3){
              $(".Myitem").css("background-color", "green");
            }
        });

        $("#itemE").click(function(){
            var rVal4 = $("#itemE:checked").val();
            if(rVal4){
              $(".Myitem").css("background-color", "blue");
            }
        });

        $("#itemN").click(function(){
            var rVal5 = $("#itemN:checked").val();
            if(rVal5){
              $(".Myitem").css("background-color", "white");
            }
        });
         
    });
</script>


 <!-- <script>
$(document).ready(function()
{
  if($("input[type='radio']#itemU").is(':checked'));
  {
    $(".Myitem").css("background-color", "yellow");
  });
});
</script> -->


<script>
  document.getElementById('select-all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<script>
  document.getElementById('select-all-item').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<script>
  document.getElementById('select-all-subitem').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
}
</script>

<!--check uncheck code for item grades-->
<script>
  document.querySelectorAll(
    'input[type=radio]').forEach((elem) => {
  elem.addEventListener('click', allowUncheck);
  // only needed if elem can be pre-checked
  elem.previous = elem.checked;
});

function allowUncheck(e) {
  if (this.previous) {
    this.checked = false;
  }
  // need to update previous on all elements of this group
  // (either that or store the id of the checked element)
  document.querySelectorAll(
      `input[type=radio][type=${this.type}]`).forEach((elem) => {
    elem.previous = elem.checked;
  });
}
</script>


<script>
  const displayRadioValue = (x) => {
    document.getElementById("slider_value").innerHTML=x;
  let grades = "";

  let avg = document.querySelector("#gradesper").value;
  {
    if (avg < 50)
    {
        // document.getElementById("U");
        // window.alert("You Get Less Than 50 Marks.\nGrade : U-Unsatisfied");
        document.querySelector('#U').checked = true;
        document.querySelector('#F').disabled = true;
        document.querySelector('#G').disabled = true;
        document.querySelector('#V').disabled = true;
        document.querySelector('#E').disabled = true;
        document.querySelector('#N').disabled = true;
        document.querySelector('#u1').style.color = 'red';
        document.querySelector('#u1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = 'red';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    } 
    else if (avg < 70) 
    {
        // window.alert("Grade : F-Fair"); 
        document.querySelector('#F').checked = true;
        document.querySelector('#U').disabled = true;
        document.querySelector('#G').disabled = true;
        document.querySelector('#V').disabled = true;
        document.querySelector('#E').disabled = true;
        document.querySelector('#N').disabled = true;
        document.querySelector('#f1').style.color = 'yellow';
        document.querySelector('#f1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = 'yellow';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    } 
    else if (avg < 80) 
    {
        // window.alert("Grade : G-Good"); 
        document.querySelector('#G').checked = true;
        document.querySelector('#U').disabled = true;
        document.querySelector('#f').disabled = true;
        document.querySelector('#V').disabled = true;
        document.querySelector('#E').disabled = true;
        document.querySelector('#N').disabled = true;
        document.querySelector('#g1').style.color = 'green';
        document.querySelector('#g1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = 'green';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    } 
    else if (avg < 90) 
    {
        // window.alert("Grade : V-Very Good"); 
        document.querySelector('#V').checked = true;
        document.querySelector('#U').disabled = true;
        document.querySelector('#G').disabled = true;
        document.querySelector('#F').disabled = true;
        document.querySelector('#E').disabled = true;
        document.querySelector('#N').disabled = true;
        document.querySelector('#v1').style.color = '#6fea7c';
        document.querySelector('#v1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = '#6fea7c';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    } 
    else if (avg < 100) 
    {
        // window.alert("Grade : E-Excellent"); 
        document.querySelector('#E').checked = true;
        document.querySelector('#U').disabled = true;
        document.querySelector('#G').disabled = true;
        document.querySelector('#V').disabled = true;
        document.querySelector('#F').disabled = true;
        document.querySelector('#N').disabled = true;
        document.querySelector('#e1').style.color = 'blue';
        document.querySelector('#e1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = 'blue';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    }
    else if (avg < 0) 
    {
        // window.alert("Grade : N-None");
        document.querySelector('#N').checked = true; 
        document.querySelector('#U').disabled = true;
        document.querySelector('#G').disabled = true;
        document.querySelector('#V').disabled = true;
        document.querySelector('#E').disabled = true;
        document.querySelector('#F').disabled = true;
        document.querySelector('#n1').style.color = 'black';
        document.querySelector('#n1').style.fontSize = 'larger';
        document.querySelector("#gradesper").style.backgroundColor = 'black';
        document.querySelector("#gradesper").style.fontSize = 'larger';
        document.querySelector("#gradesper").style.fontWeight = 'bolder';
    }
  }
  
};
</script>

<!-- <script>
  function itemU()
  {
    var x = document.querySelector(".Myitem");
    {
      x.style.backgroundColor="red";
    }
  }
  function itemF()
  {
    var y = document.querySelector(".Myitem");
    {
      y.style.backgroundColor="yellow";
    }
  }
  function itemG()
  {
    var z = document.querySelector(".Myitem");
    {
      z.style.backgroundColor="green";
    }
  }
  function itemV()
  {
    var x = document.querySelector(".Myitem");
    {
      x.style.backgroundColor="Blue";
    }
  }
  function itemE()
  {
    var x = document.querySelector(".Myitem");
    {
      x.style.backgroundColor="pink";
    }
  }
  function itemN()
  {
    var x = document.querySelector(".Myitem");
    {
      x.style.backgroundColor="white";
    }
  }
</script> -->
</body>
</html>
