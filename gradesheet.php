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
         $actclass.='<a class="dropdown-item" href="" style="color:black;"><option value="'.$row3['symbol'].'">'.$row3['symbol'].'</option></a>';
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
         $simclass.='<a class="dropdown-item" href="" style="color:black;"><option value="'.$row4['shortsim'].'">'.$row4['shortsim'].'</option></a>';
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
         $academicclass.='<a class="dropdown-item" href="" style="color:black;"><option value="'.$row5['shortacademic'].'">'.$row5['shortacademic'].'</option></a>';
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
      		<select style="width:90px;" type="text" id="country" class="btn btn-danger">
            <option selected disabled value="">Add</option>
            <option value="<?php echo $actclass?>"></option>
            <option value="<?php echo $simclass?>"></option>
            <?php echo $academicclass?>
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

          <button type="button" data-toggle="modal" data-target="#infopercentage">Info</button>
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

<!-- Modal for Add Items and show and select the item-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Item Bank Table</h5>
            <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
              <div class="container" id="lock2">

<!--Add Item button-->
                  <div class="row">
                    <center>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#additem">Add Item</button>
                    </center>
                  </div>
                  <table style="width:100%;" class="table table-striped table-bordered" id="itemtable">
                            <input style="width:100%;" class="login-input" type="text" id="itemsearch" onkeyup="item()" placeholder="Search for Vehicle name.." title="Type in a name">
                                <tr>
                                    <th>Check</th>
                                    <th>Sr No</th>
                                    <th>Item</th>
                                    <th>Action</th>
                                  
                                </tr>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM itembank  ORDER BY id ASC";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row['item'] ?></td>
                                            <td><a onclick="document.getElementById('id').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('item').value='<?php echo $row['item'] ?>';
                                            " data-toggle="modal" data-target="#itemModal"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="item_delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
              </div>   
<!--Fetch item from the database and select from here to the gradesheet-->            
                       
    </div>
    <div class="modal-footer">
          <button id="btnitem" type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
        </div>
  </div>
</div>

<!--Add Item modal to the database-->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<!--Add Subitem modal to the database-->
<div class="modal fade" id="insert subitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SubItem Bank</h5>
                    <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <center>
                        <?php include 'subitem.php' ?>
                        <form action="subitem.php" method="post" id="gradesheet" name="div">
                          <!--Item input box-->
                            <!-- <label>Item</label><br> -->
                            <input type="text" name="subitem" id="item2" value="" placeholder="Enter SubItem"><br>
                            <div class="modal-footer">
                              <input type="submit" name="InsertSub" class="btn btn-primary" value="Insert" onclick="show()">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                            <!-- <input type="submit" name="Insert" class="btn btn-primary" value="Insert"> -->
                        </form>
                        <button class="btn btn-primary" onclick="add()"><i class="fas fa-plus"></i></button>
                          <button class="btn btn-secondary" onclick="remove()"><i class="fas fa-minus"></i></button><br>
                          
                      </center>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
                </div>
            </div>
        </div>

<!--modal for percentage info-->
<div class="modal fade" id="infopercentage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        

<!--Checkbox fetching and display on alert box-->
<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--Script for fetching selected items-->
<script>
  $(document).ready(function(){

 $('#btnitem').click(function(){
            var favorite = [];
            $.each($("input[name='users']:checked"), function(){
                favorite.push($(this).val());
            });
            var users=favorite.join(",");
         window.location.href = "http://localhost/User%20dahsboard/gradesheet.php?id="+ users;
 // AJAX request
   $.ajax({
    url: 'ajax.php',
    type: 'post',
    data: {users: users},
    success: function(response){ 
      // Add response in Modal body
      $('#student_details').html(response);
        $("#default").hide();


      // Display Modal
     // $('#empModal').modal('show'); 
    }
  });
 });
});    
</script>


<script type="text/javascript">
  function hide()
  {
    document.getElementById('exampleModal').style.display = "none";
  }
</script>


<script type="text/javascript">
  function show()
  {
    document.getElementById('exampleModal').style.display = "block";
  }
</script>

<script type="text/javascript">
 function GetSelectedText(){
				var e = document.getElementById("country");
				var result = e.options[e.selectedIndex].text;
				
				document.getElementById("result").innerHTML = result;
			}
			
</script>


<!--REmove item fron gradesheet-->
<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("default").deleteRow(i);
}
</script>

<script>
function deleteRow1(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("default2").deleteRow(i); 
}
</script>



<!--Radio option storing-->

 <script type="text/javascript">
 function classes() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("classsearch");
  filter = input.value.toUpperCase();
  div = document.getElementById("divclass");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

<script>
        function displayRadioValue() 
        {
            var per = document.getElementById("gardesper").value;
            if(per < 60)
            {
              alert("Can't Give less per");
            }
            
        }
    </script>

</body>
</html>