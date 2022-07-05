<?php
include('connect.php');
$actclass="";
$simclass="";
$academicclass="";
     $in="";
     $q2= "SELECT * FROM users where role='Instructor'";
 $st2 = $connect->prepare($q2);
 $st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $in.= '<option value="'.$row2['name'].'">'.$row2['name'].'</option>';
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
     


?>
<!DOCTYPE html>
<html>
<head>
	<title>Actual Page</title>
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
  <link rel="stylesheet" type="text/css" href="sidestyle.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<?php 
    if(isset($_REQUEST['error']))
      {
        $error=$_REQUEST['error'];
        echo "<script>alert('$error');</script>";
      }
?>

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
      <h3>Gradesheet</h3>
	<div>Student name : 
    <?php echo $fetchname?><br>
	Course name : 
  <?php echo $phpcourse.'<br>';
  if(isset($_GET['class'])){
  echo 'class : '.$class=$_GET['class'].'<br>';
  }

  ?>
</div>
      	<div class="row" style="width:100%;">
      		<div class="col-8">
      			<table>
                              <tr>
                                <td><label>Id</label><input class="form-control" type="text" name="up" readonly value="<?php echo $fetchid?>"></td>
                                <td><label>Name</label><input class="form-control" type="text" name="ride" readonly value="<?php echo $fetchname?>"></td>
                              </tr>
                              <tr>
                                <td><label>Role</label><input class="form-control" type="text" name="status" readonly value="<?php echo $fetchrole?>"></td>
                                <td><label>Phone</label><input class="form-control" type="text" name="status" readonly value="<?php echo $fetchphone?>"></td>
                              </tr>
                              <tr>
                                <td><label class="form-label" for="Instructor">Instructor</label>
                                    <select type="text" id="student" class="form-control form-control-md" name="Instructor" required>
                                        <option selected disabled value="">-select instructor-</option>
                                        <?php echo $in?>
                                    </select></td>
                                <td><label>Time</label><input class="form-control" type="time" name="time"></td>
                              </tr>
                              <tr>
                              <td><label>Vehicle Number</label><input class="form-control" type="text" name="veh-num"></td>
                              </tr> 
                              </table>
      		</div>
<!--Prereuisites container-->
      		<div class="col-4">
            <div class="dropdown">
            <label style="font-size:20px; font-weight:bolder;">Prereuisites</label>
      		<select style="width:90px;" type="text" id="country" class="form-control multiple-select" name="class[]" multiple>
            <option selected disabled value="">Add</option>
            <?php echo $actclass?>
            <?php echo $academicclass?> <?php echo $simclass?>
          </select>
          <div id="result"></div> 
          <button type="button" onclick="GetSelectedText()">Get</button>
          </div>
      		</div>
      	</div>
      </div>

      <!--Add Selected Item and fetch-->
       <div class="container">
         <div class="row" style="width:100%;">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="student_details"><!-- <br>
         <br><span id="student_details"></span> -->
            <i class="fas fa-plus-hexagon"></i>ADD
          </button>

         
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#detailsper">Info</button>
        </center>
         </div>
       </div>

<!--Comment box Container-->
<div class="container">
  <div class="row" style="width:100%;">
    <div class="col-8">

    </div>
           <div class="col-4">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
              <table>
                <tr>
                   <td style="display: flex;">
                      
                         <input type="radio"  value="U" name="U"/><span style="font-weight:bold;">U</span>
                      
                      
                         <input type="radio" value="F"/><span style="font-weight:bold;"> F </span>
                    
                         <input type="radio" value="G"/><span style="font-weight:bold;"> G </span>
                      
                         <input type="radio" value="V"/><span style="font-weight:bold;"> V </span>
                     
                         <input type="radio" value="E"/><span style="font-weight:bold;"> E </span>
                      
                         <input type="radio" value="N"/><span style="font-weight:bold;"> N </span>
                     
                   </td></tr>
                   <tr><td><input class="form-control" id="gradesper"/></td></tr>
                   <tr><td>
                    <?php
                    if(isset($_GET['per'])){
                    echo $percentage=$_GET['per'];
                    }?></td>
                    </tr>
                    <tr>
                      <td><form><input class="btn btn-success" type="button" value="Save" name="save" onclick="displayRadioValue()"/></form></td>
                    </tr>
                </table>
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
                        <form action="insert_item.php" method="post">

                            <div class="form-outline">
                                <label class="form-label" for="coursename">Item</label>
                                <input type="text" id="course" name="item[]" class="form-control form-control-md" />
                            </div><br>
                                <input class="btn btn-primary btn-md" type="submit" value="Submit" name="Insert_item" />
                        </form>
                </center>
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
</body>
</html>