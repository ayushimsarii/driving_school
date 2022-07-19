<!--To fetch the instructor on modal of instructor-->
<?php
include('connect.php');
$output="";

$course="select course";
$in="";
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
	  <script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="sidestyle.css">
</head>
<body>
<!--Head navbar-->
<?php
include_once 'header.php';
?>
<!--Sidenavbar-->
<?php
include_once 'sidenavbar.php';
$classcolor= "SELECT * FROM gradesheet where user_id='$student'";
$classcolorst= $connect->prepare($classcolor);
$classcolorst->execute();

if($classcolorst->rowCount() > 0)
    {
        $class="btn btn-success";
    }
    else{
        $class="btn btn-dark"; 
    }
    
?>
<div class="container" id="actualcontainer">
	<h3>Academic</h3>
  <button style="display:none;"><a href="academic-user.php">Study</a></button>
	<div>Student name : <?php echo $fetchname?><br>
	Course name : <?php echo $std_course?>
</div>
<br>
	<div class="row" style="width:100%;">
		<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
		<!-- <h1>Phase</h1> -->
		<div class="col">
      <!--Fetching phase name, class name, student name and acdemic class-->
      
			<table id="academicclasstable" class="center" style="border: 1px solid black;">
      <input style="width:50%;" class="form-control" type="text" id="academicclasssearch" onkeyup="academic()" placeholder="Search for Academic Class.." title="Type in a name">
                    <?php
                    $query = "SELECT * FROM phase where ctp='$phpcourse'";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                            foreach($result as $row)
                            {

                    ?>     
                            <div class="container"> 
                                <tr>
                               
                                <?php
                                $phase=$row['id'];
                                echo $phase_name='<div><h4 style="color:blue" id="phase">'.$row['phasename'].'</h4></div>';
                                ?>
                                </tr>
                                <tr>
                                <td>
                                <?php
                                $query1 = "SELECT * FROM academic where phase='$phase'";
                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();  
                                $result1 = $statement1->fetchAll();
                                    foreach($result1 as $row1){
                                       ?>
                                  <!-- <a onclick="document.getElementById('value').value='<?php echo $row1['file'] ?>';" data-toggle="modal" data-target="#open-files" id="cl_sy" class="btn btn-primary" ><?php echo $row1['shortacademic']?></a> -->

                                  <a href="upload/<?php echo $row1['file'] ?>" target="_blank" onclick="document.getElementById('file_name').value='<?php echo $row1['file'] ?>';" data-toggle="modal" data-target="#open-files" class="btn btn-primary"><?php echo $row1['shortacademic']?></a>

<?php
                               }
                                ?>
                    
                              </td> </tr><hr>
                 
                         </div>      
<?php }?>
                    </table>
        </div>

	</div>
</div><br>
<!--modal for class self study and intructor--->
<div class="modal fade" id="open-files" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><input style="width:350px; background-color:white; color:orange; font-weight:bold; text-align:left; text-decoration:underline;" readonly id="file_name" value="<?php echo $row1["file"]; ?>"/></h5>
        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <table>
            <tr>
              <!-- <td><input readonly id="file_name" value="<?php echo $row1["file"]; ?>"/></td> -->
              <td><button class="btn btn-success"><a style="color:black;" href="upload/<?php echo $row1["file"]; ?>" target="_blank">Self Study</a></button></td>
              <td><button data-toggle="modal" data-target="#send-instructor" class="btn btn-primary">With Instructor</button></td>
            </tr>
          </table>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


<!--Modal For Instructor-->
<div class="modal fade" id="send-instructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Instructor</h5>
        <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <label class="form-label" for="Instructor" name="choose instructor">Select Instructor</label>
              <select type="text" id="instructor" class="form-control form-control-md" name="Instructor" required>
                <option selected disabled value="">-select instructor-</option>
                  <?php echo $in?>
              </select><hr>
          <button type="button" class="btn btn-success" style="width:20%;"><i class="fas fa-paper-plane"></i></button>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Next and Previous Button-->

 <!-- <div class="container-fluid" id="next-previous">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="sim.php">Next</a></button>
    </div><br><br> -->

    <script>
 $('#myTable').margetable({
  type: 1,
  colindex: [{
    index: 1, 
    dependent: [0]
  }]
});


    </script>

<script>
function academic() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("academicclasssearch");
  filter = input.value.toUpperCase();
  table = document.getElementById("academicclasstable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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
    <?php
include_once 'footer.php';
?>
</body>
</html>