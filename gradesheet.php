<?php
include('connect.php');
$output="";
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
</head>
<style type="text/css">
	input
	{
		margin: 5px;
		padding: 5px;
		/*width: auto;*/
	}
	/*.row   
	{
		border: 1px solid black;
		border-radius: 15px;
	}*/
	.container
	{
		margin-top: 10px;
	}
  td,
  th
  {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 5px;
    
    text-align: center;
  }
  table
  {
    margin: auto;
    margin-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
  a
  {
    text-decoration: none;
    color: white;
    font-weight: bold;
  }
  select
  {
    width: 70%;
    height: 40px;
  }
  i
  {
    margin: 2px;
    padding: 2px;
  }
</style>
<body>
<?php
include_once 'header.php'
?>

  <!--Username dashboard info-->
   
	<!--User info fetched in the input box-->
      <div class="container">
      	<div class="row">
      		<div class="col">
      			<table>
                              <tr>
                                <td><label>Id</label><input type="text" name="up" placeholder=></td>
                                <td><label>Name</label><input type="text" name="ride" placeholder=></td>
                              </tr>
                              <tr>
                                <td><label>Role</label><input type="text" name="status" placeholder=></td>
                                <td><label>Phone</label><input type="text" name="status" placeholder=></td>
                              </tr>
                              <tr>
                                <td><label for="Instructor">Instructor</label>
                                    <select id="Instructor" name="Instructor">
                                      <option value="volvo">Instructor-1</option>
                                      <option value="saab">Instructor-2</option>
                                      <option value="fiat">Instructor-3</option>
                                      <option value="audi">Instructor-4</option>
                                    </select></td>
                                <td><label>Time</label><input type="time" name="time"></td>
                              </tr>
                              </table>
      		</div>
<!--Prereuisites container-->
      		<div class="col">
      			<label style="font-size:20px; font-weight:bolder;">Prereuisites</label>
            <button class="btn btn-success"><i class="fas fa-plus"></i></button>
      			<!-- <input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name=""> -->
      		</div>
      	</div>
      </div>

      <!--Add Selected Item and fetch-->
       <div class="container">
         <div class="row">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="student_details"><!-- <br>
         <br><span id="student_details"></span> -->
            <i class="fas fa-plus-hexagon"></i>ADD
          </button>
        </center>
         </div>
       </div>
      <!-- Button trigger modal -->
      <div class="container">
        <div class="row">
          <div class="col-8">
            <table class="table table-responsive" width="100%" id="default">
                <thead>
              
                   <tr>
                      <td><b>#</b></td>
                      <td><b>Item</b></td>
                      <!-- <td><b>email</b></td> -->
                      <td><b>Radio Grade</b></td>
                      <!-- <td><b>SubItem</b></td>
                      <td><b>Sub Radio</b></td> -->
                      <td><b>Remove</b></td>
                   </tr>
                </thead>
                <form class="login" method="post" action="grades.php" enctype="multipart/form-data">

                  <?php
                  include 'grades.php';
                  if(!isset($_GET['id'])){
                  $query11 = mysqli_query($conn,"SELECT * FROM itembank");
                  }else{
                  $id=$_GET['id'];
                  $query11 = mysqli_query($conn,"SELECT * FROM itembank where id IN ($id)");
                  }
                  if (mysqli_num_rows($query11) > 0) { $i=1;
                  while($user = mysqli_fetch_assoc($query11)) { 


                  ?>
                     <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $user['item'];?><br>
                          <button class="btn btn-info" type="button" data-toggle="modal" data-target="#subitem" id="subitem_bank1"><i class="fas fa-plus-circle"></i></button>
                        </td>
                        
                        <!-- <td><?php echo $user['radio'];?></td> -->
                        <input type="hidden" name="id" value="<?php echo $user['id'];?>">
                <td>
                  <table>
                      <td>
                        
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="U" <?php if($user['grade']=='U'){ ?> checked="" <?php } ?>/><span>&nbsp U  </span>
                        
                        
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="F" <?php if($user['grade']=='F'){ ?> checked="" <?php } ?>/><span> F </span>
                      
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="G" <?php if($user['grade']=='G'){ ?> checked="" <?php } ?>/><span> G </span>
                        
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="V" <?php if($user['grade']=='V'){ ?> checked="" <?php } ?>/><span> V </span>
                       
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="E" <?php if($user['grade']=='E'){ ?> checked="" <?php } ?>/><span> E </span>
                        
                           <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="N" <?php if($user['grade']=='N'){ ?> checked="" <?php } ?>/><span> N </span>  
                     </td>
                </table>
              </td>
              <!-- <td><?php echo $user['subitem'];?></td>
              <td>
                <table>
                   <td>
                      
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="U" <?php if($user['subgrade']=='U'){ ?> checked="" <?php } ?>/><span>&nbsp U  </span>
                      
                      
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="F" <?php if($user['subgrade']=='F'){ ?> checked="" <?php } ?>/><span> F </span>
                    
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="G" <?php if($user['subgrade']=='G'){ ?> checked="" <?php } ?>/><span> G </span>
                      
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="V" <?php if($user['subgrade']=='V'){ ?> checked="" <?php } ?>/><span> V </span>
                     
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="E" <?php if($user['subgrade']=='E'){ ?> checked="" <?php } ?>/><span> E </span>
                      
                         <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="N" <?php if($user['subgrade']=='N'){ ?> checked="" <?php } ?>/><span> N </span>
                     
                   </td>
                </table>
              </td>
      <!-- <td><input type="submit" name="gradesub" value="Save" class="btn btn-success"></td> -->
      <td><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
   </tr>
   

<?php $i++; } } else { ?>

   <tr>
      <td>No record found</td> 
   </tr>
<?php } ?>

<td>
<input type="submit" class="btn btn-success" value="Save" name="gradesub">
</td>
</form>
</table>

<!--Comment box Container-->
          </div>
           <div class="col-4">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item" onclick="hide()">
                        Add Item
                      </button>
                    </center>
                  </div>
              </div>   
<!--Fetch item from the database and select from here to the gradesheet-->            
                        <?php
                        require "connect.php";
                        $error = '';
                        $output = '';
                              $query = "SELECT * FROM itembank";
                                    $statement = $connect->prepare($query);
                                    $statement->execute();
                        
                                    if($statement->rowCount() > 0)
                                        {
                                            $result = $statement->fetchAll();
                                  $sn=1;
                                            foreach($result as $row)
                                            {
                                                $output .= '<tr>
                                                <td>'.$sn++.'</td>
                                                <td><a href="item-update.php?id='.$row["id"].'>Edit</a></td>
                                                    <td><a href="gradesheet.php?id='.$row["id"].'&item='.$row["item"].'>'.$row["item"].'</a></td>
                                                        
                                                        <td><a href="item-delete.php?id='.$row["id"].'>Delete</a></td>
                                                    </td>
                                                </tr>';
                                            }
                                        }
                                        else
                                        {
                                            $output .= '
                                                <tr>
                                                    <td colspan="2">No Data Found</td>
                                                </tr>
                                            ';
                                        }
                        
                        ?>

						<center>
							<table class="table table-striped table-bordered">
								<tr>
									<th>Id</th>
									<th>Phase</th>
									<th colspan="2">Operations</th>
								</tr>
									<?php
										echo $output;
									?>                
							</table>
						</center>

              </div>
    </div>
    <div class="modal-footer">
          <button id="btnitem" type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
        </div>
  </div>
</div>

<!-- Modal for Add subItems and show and select the item-->
<div class="modal fade" id="subitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SubItem Bank Table</h5>
            <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
              <div class="container" id="lock2">

<!--Add subItem button-->
                  <div class="row">
                    <center>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert subitem" onclick="hide()">
                        ADD
                      </button>
                    </center>
                  </div>
              </div>   
<!--Fetch subitem from the database and select from here to the gradesheet-->            
                <table class="table table-responsive" width="100%" id="table1">
                    <thead class="Success">
                         <tr>
                            <td><b>#</b></td>
                            <td><b>Id</b></td>
                            <td><b>Item</b></td>
                            <!-- <td><b>SubItem</b></td> -->
                            <td colspan="2"><b>Operation</b></td>
                          
                         </tr>
                    </thead>

                        <?php

                        $query11 = mysqli_query($conn,"SELECT * FROM subitem");
                        if (mysqli_num_rows($query11) > 0) { $i=1;
                        while($user = mysqli_fetch_assoc($query11)) { 
                        ?>
                           <tr>
                              <td><input type="checkbox"  name="users" value="<?php echo $user['id'];?>"/><span></span></td>
                              <td><?php echo $i;?></td>
                              <td name="subitem1" id="subitem1"><?php echo $user['subitem'];?>
                              </td>
                              <!-- <td><?php echo $user['subitem'];?></td> -->

                           <td><a class="btn btn-success" href="Subitemupdate.php?id=<?php echo $user["id"]; ?>"><i class="fas fa-edit"></i></a></td>
                              <td><a class="btn btn-danger" href="subitemdelete.php?id=<?php echo $user["id"]; ?>"><i class="fas fa-trash"></i></a></td>
                              
                            </tr>
                        <?php 
                        $i++; 
                      } 
                    }
                        ?>

                </table>
              </div>
        <div class="modal-footer">
          <button id="btnsub" type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
        </div>
    </div>
  </div>
</div>


<!--Add Item modal to the database-->
<div class="modal fade" id="insert item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Item Bank</h5>
                    <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <center>
                      <form class="insert-item" id="integrity" method="post" action="insert_item.php">
                        <div class="input-field">
                          <table class="table table-bordered" id="table-field">
                            <tr>
                              <td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="item[] " class="form-control" value="" required /> </td>
                              <td><input type="button" name="add_item" value="Add" id="add_item" class="btn btn-warning"></td>
                            </tr>
                          </table>
                        </div>
                      <center>
                        <button class="btn btn-success" type="submit" name="Insert_item">Submit</button>
                      </center>
                    </form>	
                          
                      </center>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div> -->
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
<!--Script for fetching selected subitems-->
<!-- <script>
  $(document).ready(function(){

 $('#btnsub').click(function(){
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
      $('#subitem_details').html(response);
        $("#default2").hide();


      // Display Modal
     // $('#empModal').modal('show'); 
    }
  });
 });
});

    
</script> -->


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
  $(function(){
    $(document).on("click","#btnsub", function(){
      var getselectedvalue = $("#table1 input[name='users']:checked").parents("td").siblings("#subitem1");
      $(".fetch").append(getselectedvalue);
    })
  })
</script>

<!-- <script type="text/javascript">
    function GetSelected() {
        //Reference the Table.
        var grid = document.getElementById("Table1");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var message = "Id item \n";
 
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode;
                message += row.cells[1].innerHTML;
                message += "   " + row.cells[2].innerHTML;
                message += "\n";
            }
        }
 
        //Display selected Row data in Alert Box.
          alert(message);
    }
</script> -->


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

<!-- <script type="text/javascript">
  const myForm = document.forms['my-form']

  myForm.radioChoice = {}

  myForm.oninput = ({target}) =>
    {
    if( target.type === 'radio')
      {
      if (!myForm.radioChoice[target.name])
        myForm.radioChoice[target.name] = target.value
      else
        myForm[target.name].value = myForm.radioChoice[target.name]
      }
    }
</script> -->

</body>
</html>