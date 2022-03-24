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
      					<td><label>UP</label><input type="text" name="up"></td>
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
include_once 'database.php';
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
          <th colspan="2"> <font face="Arial"></font> Operation </th>
          
      </tr>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>
    <tr>
      
      <td type="text" name="id"><?php echo $row["id"]; ?></td>
      <td type="text" name="item"><?php echo $row["item"]; ?></td>
      <td>
        <?php include 'radio.php' ?>
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
                    <input class="btn btn-warning" type="submit" name="radiobtn" value="Save">
                  </form></td>
     <!--  <td><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
      <td><a class="btn btn-primary" href="update.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-edit"></i></a></button></td>
      <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></td> -->
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
              <div class="container-fluid">
    <button class="btn btn-info" onclick="add_more()"><i class="fas fa-plus"></i></button>
  </div>




      <div class="container" id="container">
        <center>
          <?php include 'add.php' ?>
          <form action="add.php" method="post" id="gradesheet" name="div">
            <!--Item input box-->
                <label>Item</label>
              <input type="text" name="item" id="item1" value=""><br>
              <input type="submit" name="Insert" class="btn btn-primary" value="Insert">
          </form>
          <button class="btn btn-primary" onclick="add()"><i class="fas fa-plus"></i></button>
            <button class="btn btn-secondary" onclick="remove()"><i class="fas fa-minus"></i></button><br>
            <button class="btn btn-success" type="submit"><a href="gradesheet.php">Gradesheet</a></button><br>
        </center>
      </div>    
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
        document.write(message);
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
<script type="text/javascript">

function InsertRecord()  
        {  
            var txtid = document.getElementById('txtid').value;  
            var txtname = document.getElementById('txtname').value;  
            var txtsalary = document.getElementById('txtsalary').value;  
            var txtcity = document.getElementById('txtcity').value;  
            if (txtid.length != 0 || txtname.length !=0 || txtsalary.length !=0|| txtcity.length !=0)  
            {  
                var connection = new ActiveXObject("ADODB.Connection");  
                var connectionstring = "Data Source=.;Initial Catalog=EmpDetail;Persist Security Info=True;User ID=sa;Password=****;Provider=SQLOLEDB";  
                connection.Open(connectionstring);  
                var rs = new ActiveXObject("ADODB.Recordset");  
                rs.Open("insert into Emp_Info values('" + txtid + "','" + txtname + "','" + txtsalary + "','" + txtcity + "')", connection);  
                alert("Insert Record Successfuly");  
                txtid.value = " ";  
                connection.close();  
            }  
            else  
            {              
                alert("Please Enter Employee \n Id \n Name \n Salary \n City ");  
            }  
        } 
      </script> 

</body>
</html>