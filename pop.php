<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	.container
	{
		margin-top: 10px;
	}
  table
  {
    margin-right: 5px;
    margin-top: 5px;
    margin-left: 5px;
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
  .row
  {
    width: 100%;
    text-align: center;
  }
</style>
<body>
	<div class="container">
		<div class="row">
			<center>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itembank" id="item_bank">
              Item Bank
            </button>
          </center>
		</div>
	</div>

<div class="container">
        <div class="row">  
          <center>
            <table class="table table-responsive" id="default">
			   <tr>
			      <td><b>#</b></td>
			      <td><b>Item</b></td>
			      <td><b>Radio Grade</b></td>
			      <td><b>Remove</b></td>
			   </tr>
         <tbody>
           
         </tbody>
			    <form class="login" method="post" action="grades.php" enctype="multipart/form-data">

                  <?php
                  include 'grades.php';
                  if(!isset($_GET['id'])){
                  $result = mysqli_query($conn,"SELECT * FROM itembank");
                  }else{
                  $id=$_GET['id'];
                  $result = mysqli_query($conn,"SELECT * FROM itembank where id IN ($id)");
                  }
                  if (mysqli_num_rows($result) > 0) { $i=1;
                  while($user = mysqli_fetch_array($result)) { 


                  ?>
				   <tr>
				      <td><?php echo $i;?></td>
				      <td><?php echo $user['item'];?><br>
				      	<button class="btn btn-info" type="button" data-toggle="modal" data-target="#subitem" id="subitem_bank"><i class="fas fa-plus-circle"></i></button>
                <!-- <button class="btn btn-warning" type="button" id="left"><i class="fas fa-arrow-circle-left"></i></i></button>
                <button class="btn btn-warning" type="button" id="right"><i class="fas fa-arrow-circle-right"></i></button> -->
				      </td>
              
				      <input type="hidden" name="id" value="<?php echo $user['id'];?>">
				      
                    <td>
                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="U" <?php if($user['grade']=='U'){ ?> checked="" <?php } ?>/><span>&nbsp U  </span>

                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="F" <?php if($user['grade']=='F'){ ?> checked="" <?php } ?>/><span> F </span>
                  
                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="G" <?php if($user['grade']=='G'){ ?> checked="" <?php } ?>/><span> G </span>
                    
                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="V" <?php if($user['grade']=='V'){ ?> checked="" <?php } ?>/><span> V </span>
                   
                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="E" <?php if($user['grade']=='E'){ ?> checked="" <?php } ?>/><span> E </span>
                    
                       <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="N" <?php if($user['grade']=='N'){ ?> checked="" <?php } ?>/><span> N </span>
                    </td>
      <td><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
   </tr> 
   
   <!-- <tr class="blank_row" class="">
    <?php include 'subitem.php' ?>
    <?php

                        $query11 = mysqli_query($conn,"SELECT * FROM subitem");
                        if (mysqli_num_rows($query11) > 0) { $i=1;
                        while($user = mysqli_fetch_assoc($query11)) { 
                        ?>
                        <?php 
                        $i++; 
                      } 
                    }
                        ?>
              <td><?php echo $i;?></td>
              <td class="fetch"><?php echo $user['subitem'];?><br></td>
            <td>
              <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="U" <?php if($user['grade']=='U'){ ?> checked="" <?php } ?>/><span>&nbsp U  </span>
            
            
               <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="F" <?php if($user['grade']=='F'){ ?> checked="" <?php } ?>/><span> F </span>
          
               <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="G" <?php if($user['grade']=='G'){ ?> checked="" <?php } ?>/><span> G </span>
            
               <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="V" <?php if($user['grade']=='V'){ ?> checked="" <?php } ?>/><span> V </span>
           
               <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="E" <?php if($user['grade']=='E'){ ?> checked="" <?php } ?>/><span> E </span>
            
               <input type="radio" name="grade[<?php echo $user['id'];?>]"  value="N" <?php if($user['grade']=='N'){ ?> checked="" <?php } ?>/><span> N </span>
            </td>
            <td bgcolor="#FFFFFF"><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
        </tr> -->
<?php $i++; } } else { ?>

   <tr>
      <td>No record found</td> 
   </tr>
<?php } ?>

<!-- <td>
<input type="submit" class="btn btn-success" value="Save" name="gradesub">
</td> -->
</form>
</table></center>
          </div>
        </div>



<!-- <div class="container">
        <div class="row">  
            <table class="table table-responsive" width="100%" id="default1">
          <thead>
        
         <tr>
            <td><b>#</b></td>
            <td><b>SubItem</b></td>
            
            <td><b>Radio Grade</b></td>
           
            <td><b>Remove</b></td>
         </tr>
        
      </thead>
          <form class="login" method="post" action="subgrade.php" enctype="multipart/form-data">

        <?php
        include 'subgrade.php';
        
        if(!isset($_GET['id'])){
        $query11 = mysqli_query($conn,"SELECT * FROM subitem");
        }else{
        $id=$_GET['id'];
        $query11 = mysqli_query($conn,"SELECT * FROM subitem where id IN ($id)");
        }
        if (mysqli_num_rows($query11) > 0) { $i=1;
        while($user = mysqli_fetch_assoc($query11)) { 


        ?>
           <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $user['subitem'];?><br>
              </td>
              
              <input type="hidden" name="id" value="<?php echo $user['id'];?>">
      <td><table>

         <td>
            
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="U" <?php if($user['subgrade']=='U'){ ?> checked="" <?php } ?>/><span>&nbsp U  </span>
            
            
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="F" <?php if($user['subgrade']=='F'){ ?> checked="" <?php } ?>/><span> F </span>
          
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="G" <?php if($user['subgrade']=='G'){ ?> checked="" <?php } ?>/><span> G </span>
            
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="V" <?php if($user['subgrade']=='V'){ ?> checked="" <?php } ?>/><span> V </span>
           
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="E" <?php if($user['subgrade']=='E'){ ?> checked="" <?php } ?>/><span> E </span>
            
               <input type="radio" name="subgrade[<?php echo $user['id'];?>]"  value="N" <?php if($user['subgrade']=='N'){ ?> checked="" <?php } ?>/><span> N </span>
           
         </td>
      </table></td>
      
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

          </div>
        </div> -->



        

<!--Item Bank Modal-->

				<div class="modal fade" id="itembank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						        <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true"><i class="fas fa-times"></i></span>
						        </button>
						      </div>
						      <div class="modal-body">
						      		<div class="row">
                    <center>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item" onclick="hide()">
                        ADD
                      </button>
                    </center>
                  </div>
              </div>
								        <table class="table table-responsive" width="100%">
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

                        $query11 = mysqli_query($conn,"SELECT * FROM itembank");
                        if (mysqli_num_rows($query11) > 0) { $i=1;
                        while($user = mysqli_fetch_assoc($query11)) { 
                        ?>
                           <tr>
                              <td><input type="checkbox"  name="users" value="<?php echo $user['item'];?>"/><span></span></td>
                              <td><?php echo $i;?></td>
                              <td id="fetch"><?php echo $user['item'];?>
                              </td>
                              <!-- <td><?php echo $user['subitem'];?></td> -->

                           <td><a class="btn btn-success" href="update.php?id=<?php echo $user["id"]; ?>"><i class="fas fa-edit"></i></a></td>
                              <td><a class="btn btn-danger" href="delete.php?id=<?php echo $user["id"]; ?>"><i class="fas fa-trash"></i></a></td>
                              
                            </tr>
                        <?php 
                        $i++; 
                      } 
                    }
                        ?>

                </table>
						     <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button id="btnDel" type="button" class="btn btn-primary">Select</button>
						      </div>
				
						    </div>
					  </div>
				</div>

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
                        <?php include 'add.php' ?>
                        <form action="add.php" method="post" id="gradesheet" name="div">
                          <!--Item input box-->
                            <!-- <label>Item</label><br> -->
                            <input type="text" name="item" id="item1" value="" placeholder="Enter Item"><br>
                            <div class="modal-footer">
                              <input type="submit" name="Insert" class="btn btn-primary" value="Insert" onclick="show()">
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

	<!--SubItem Bank Modal-->

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
                            <td class="td"><b>Id</b></td>
                            <td class="td"><b>Item</b></td>
                            <!-- <td><b>SubItem</b></td> -->
                            <td colspan="2"><b>Operation</b></td>
                          
                         </tr>
                    </thead>

                        <?php

                        $query11 = mysqli_query($conn,"SELECT * FROM subitem");
                        if (mysqli_num_rows($query11) > 0) { $i=1;
                        while($user1 = mysqli_fetch_assoc($query11)) { 
                        ?>
                           <tr>
                              <td><input type="checkbox"  name="check" value="<?php echo $user1['id'];?>"/><span></span></td>
                              <td class="td"><?php echo $i;?></td>
                              <td class="td"><?php echo $user1['subitem'];?></td>
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
          <button id="btnsub" type="button" class="btn btn-primary" data-dismiss="modal" onclick="GetSelected()">Select</button>
        </div>
    </div>
  </div>
</div>


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

<!-- <h2 style="color:green">Create a checkbox and get its value</h2>  
<h3> Are you a web developer? </h3>  
Yes: <input type="checkbox" id="myCheck1" value="Yes, I'm a web developer">  
No: <input type="checkbox" id="myCheck2" value="No, I'm not a web developer">  
<br> <br>  
<button onclick="checkCheckbox()">Submit</button> <br>  
  
<h4 style="color:green" id="result"></h3>   
<h4 style="color:red" id="error"></h3>   
  
<script>  
function checkCheckbox() {  
  var yes = document.getElementById("myCheck1");  
  var no = document.getElementById("myCheck2");  
  if (yes.checked == true && no.checked == true){  
    return document.getElementById("error").innerHTML = "Please mark only one checkbox either Yes or No";  
  }  
  else if (yes.checked == true){  
    var y = document.getElementById("myCheck1").value;  
    return document.getElementById("result").innerHTML = y;   
  }   
  else if (no.checked == true){  
    var n = document.getElementById("myCheck2").value;  
    return document.getElementById("result").innerHTML = n;  
  }  
  else {  
    return document.getElementById("error").innerHTML = "*Please mark any of checkbox";  
  }  
}  
</script>   -->

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<script>
  
  $(document).ready(function(){

 $('#btnDel').click(function(){
            var favorite = [];
            $.each($("input[name='users']:checked"), function(){
                favorite.push($(this).val());
            });
            var users=favorite.join(",");
         window.location.href = "http://localhost/Edu%20changed/pop.php?id="+ users;
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

<!-- <script>
$(document).ready(function()
{
  $(document).on("click","#btnsub",function()
  {
    var selectedStudents = $(".default input[name='check']:checked").parents("tr").clone();
    $(".default tbody").append(selectedStudents);
    $('tr').append('<td><input type="radio" name="grade"  value="U"/><span>&nbsp U  </span>\
\
                       <input type="radio" name="grade"  value="F"/><span> F </span>\
                  \
                       <input type="radio" name="grade"  value="G"/><span> G </span>\
                    \
                       <input type="radio" name="grade"  value="V"/><span> V </span>\
                   \
                       <input type="radio" name="grade" value="E"/><span> E </span>\
                    \
                       <input type="radio" name="grade"  value="N"/><span> N </span></td>');
  });
  
});

</script> -->
<!-- <script type="text/javascript">
  $(function () {

            $("#btnDel").click(function () {
                var open = [];
                $.each($("input:checkbox[name='users']:checked"), function () {
                    open.push($(this).val());
                });
                function myFunction() {
                var table = document.getElementById("default");
                var row = table.insertRow(0);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                cell1.innerHTML = "bnm";
                cell2.innerHTML = "ghjk";
                cell3.innerHTML = "bnm";
                cell4.innerHTML = "ghjk";
              }
                alert("We remain open on: " + open.join(" \n"));
            })

        });
</script> -->

<!-- <script>
  $(document).ready(function(){

 $('#btnDel').click(function(){
            var favorite = [];
            $.each($("input[name='users']:checked"), function(){
                favorite.push($(this).val());
            });
            var users=favorite.join(",");
         window.location.href = "http://localhost/Edu%20changed/pop.php?id="+ users;
 // AJAX request
   $.ajax({
    url: 'ajax.php',
    type: 'post',
    data: {users: users},
    success: function(response){ 
      // Add response in Modal body
      $('#item_bank').html(response);
        $("#default").hide();


      // Display Modal
     // $('#empModal').modal('show'); 
    }
  });
 });
});

    
</script> -->

<!-- <script type="text/javascript">
  $(document).ready(function(){

 $('#btnsub').click(function(){
            var favorite1 = [];
            $.each($("input[name='users']:checked"), function(){
                favorite.parents("td").siblings("#subitem1").appendTo($(".fetch").add(getselectedvalue);
            });
            var users=favorite.join(",");
         window.location.href = "http://localhost/Edu%20changed/pop.php?id="+ users;
 // AJAX request
 });
});
</script> -->

<!-- <script type="text/javascript">
    document.getElementById('btnsub').onclick = function() {
    var checkboxes = document.getElementsByName('check');
    for (var checkbox of checkboxes)
    {
        if (checkbox.checked) {
            document.body.append(checkbox.value + ' ');
        }
    }
}
</script> -->
<script type="text/javascript">
  $(function(){
    $(document).on("click","#btnsub", function()
    {
      var getselectedvalue = $("input[name='check']:checked").parents("td").siblings(".td");
      $("#default").append(getselectedvalue);
    })
  })
</script>


<!-- <script type="text/javascript">
  $(function(){
    $(document).on("click","#btnsub", function()
    {
      var getselectedvalue = $("input[name='check']:checked").parents("tr").clone("\n").appendTo($("#default").join(getselectedvalue));
    })
  })
</script> -->

<!-- <script type="text/javascript">
    function GetSelected() {
        //Reference the Table.
        // var grid = document.getElementById("table1");
        // var getselectedvalue = document.getElementsByName('users');
        // var answer = [];
        //Reference the CheckBoxes in Table
        var checkBoxes = document.getElementsByName("check");
        var message = ' ';
 
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                message += '<form method="post" action="" enctype="multipart/form-data">\
      <td><table>\
         <tr>\
            <td>\
                <input type="hidden" class="uid" name="id" id="id" value="'.$user1["id"].'">\
                <input class="btnclass" type="radio" name="grade" id="U"  value="U" /><span>  U </span>\
            </td>\
            <td>\
               <input class="btnclass" type="radio" name="grade" id="F" value="F"/><span> F</span>\
           </td>\
            <td>\
               <input class="btnclass" type="radio" name="grade" id="G" value="G" /><span> G</span>\
            </td>\
            <td>\
               <input class="btnclass" type="radio" name="grade" id="V" value="V"/><span> V</span>\
           </td>\
            <td>\
               <input class="btnclass" type="radio" name="grade" id="E" value="E" /><span> E</span>\
            </td>\
            <td>\
               <input class="btnclass" type="radio" name="grade" id="N" value="N"/><span> N</span>\
           </td><span id="status"></span>\
         </tr>\
      </table></td>\
      </form>'
      
            }

      //       var sub = document.getElementById('blank_row')
      // sub.innerHTML+=message
        }
 
        //Display selected Row data in Alert Box.
          alert(message);
      //     var sub = document.getElementById('blank_row');
      // sub.innerHTML+=message;
    }
</script> -->


</body>
</html>