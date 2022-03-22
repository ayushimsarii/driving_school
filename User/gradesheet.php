<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

</style>
<body>

	<!--first container-->
      <div class="container">
      	<div class="row">
      		<div class="col">
      			<table>
      				<tr>
      					<td><label>UP</label><input type="text" name="up" placeholder= "<?php echo $_SESSION['username']; ?>"></td>
      					<td><label>Ride</label><input type="text" name="ride"></td>
      				</tr>
      				<tr>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      			</tr>
	      			<tr>
	      				<td><label>Instructor</label><input type="text" name="ins"></td>
	      				<td><label>Time</label><input type="time" name="time"></td>
	      			</tr>
	      			<tr>
		      			<td><label>Vehicle Number</label><input type="Number" name="veh"></td>
		      			<td><label>Position</label><input type="text" name="pos"></td>
		      		</tr>
      		    </table>
      		</div>

      		<div class="col">
      			<h4>Prereuisites</h4>
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      		</div>
      	</div>
      </div>

      <!--Second Container-->
       <div class="container">
         <div class="row">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            ADD
          </button>
        </center>
         </div>
       </div>
      <!-- Button trigger modal -->

      <div class="container">
        <div class="row">
          <div class="col">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
          </div>
          <div class="col">
                          <?php
              include_once 'database1.php';
              $result = mysqli_query($conn,"SELECT * FROM bank");
              ?>
                          <?php
              if (mysqli_num_rows($result) > 0) {
              ?>
                            <table id="myTable" border="0" cellspacing="2" cellpadding="2"> 
                    <tr> 
                        
                        <th> <font face="Arial"></font> ID </th>
                        <th> <font face="Arial"></font> Item </th>  
                        <th> <font face="Arial"></font> Radio </th> 
                        <th> <font face="Arial"></font> Remove </th>
                        
                    </tr>
                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                  <tr>
                    
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["item"]; ?></td>
                    <td><!-- 
                      <?php include 'radio.php' ?> -->
                      <form action="radio.php" method="post" name="my-form">
                                    <input type="radio" id="u1" name="radio" value="U">
                                    <label for="u1">U</label>
                                    <form action="" name="my-form">
                                    <input type="radio" id="f1" name="radio" value="F">
                                    <label for="f1">F</label>
                                    <input type="radio" id="g1" name="radio" value="G">
                                    <label for="g1">G</label>
                                    <input type="radio" id="v1" name="radio" value="V">
                                    <label for="v1">V</label>
                                    <input type="radio" id="e1" name="radio" value="E">
                                    <label for="e1">E</label>
                                    <input type="radio" id="n1" name="radio" value="N">
                                    <label for="n1">N</label>
                                  <input class="btn btn-warning" type="button" name="radiobutton" value="Save"></form></td>
                    <td><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
                    </tr>
                    <?php
                    $i++;
                    }
                    ?>
              </table>
               <?php
              }
              else
              {
                  echo "No result found";
              }
              ?>
          </div>
        </div>
        
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Item Bank Table</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                   <?php
                    include_once 'database1.php';
                    $result = mysqli_query($conn,"SELECT * FROM bank");
                    ?>
                    <!DOCTYPE html>
                    <html>
                     <head>
                       <title> Retrive data</title>
                       
                     </head>
                    <body>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    
                        <table id="Table1" border="0" cellspacing="2" cellpadding="2"> 
                          <tr> 
                              <th> <font face="Arial"></font> Check </th>
                              <th> <font face="Arial"></font> ID </th>
                              <th> <font face="Arial"></font> Item </th>  
                              <th colspan="2"> <font face="Arial"></font> Operations </th> 
                              
                          </tr>
                          <?php
                          $i=0;
                          while($row = mysqli_fetch_array($result)) {
                          ?>
                        <tr>
                          <td><input type="checkbox" name="checkbox" value=""></td>
                          <td><?php echo $row["id"]; ?></td>
                          <td><?php echo $row["item"]; ?></td>
                          <td><a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>><i class="fas fa-edit"></i></a></button></td>
                          <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a></td>
                          </tr>
                          <?php
                          $i++;
                          }
                          ?>
                    </table>
                     <?php
                    }
                    else
                    {
                        echo "No result found";
                    }
                    ?>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input id="btnGet" type="submit" class="btn btn-primary" value="Select" name="Sub" onclick="GetSelected()">
      </div>
    </div>
  </div>
</div>

<!--Checkbox fetching and display on alert box-->

<script type="text/javascript">
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
        document.write("gradesheet.php",message);
    }
</script>
<!--REmove item fron gradesheet-->
<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
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