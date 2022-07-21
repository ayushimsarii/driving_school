<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM bank");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
 </head>
<body>

    <div class="container" id="lock2">
        <div class="row">
          <center>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item">
              ADD
            </button>
          </center>
        </div>
    </div>


    


    
    <!--Modal for add items-->
                <div class="modal fade" id="insert item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Item Bank</h5>
						        <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						       		<center>
							          <?php include 'add.php' ?>
							          <form action="add.php" method="post" id="gradesheet" name="div">
							            <!--Item input box-->
							              <!-- <label>Item</label><br> -->
							              <input type="text" name="item" id="item1" value="" placeholder="Enter Item"><br>
							              <ul>
							                <li>
							                  <input type="text" name="subitem" value="" placeholder="Enter SubItem">
							                </li>
							              </ul>
							              <div class="modal-footer">
							              	<input type="submit" name="Insert" class="btn btn-primary" value="Insert">
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

<div class="container">
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial"></font> Check </th>
          <th> <font face="Arial"></font> ID </th>
          <th> <font face="Arial"></font> Item </th>  
          <th> <font face="Arial"></font> Grade </th> 
          <th> <font face="Arial"></font> SubItem </th> 
          <th> <font face="Arial"></font> SubGrades </th>
          <th colspan="2"> <font face="Arial"></font> Operations </th>
      </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
        <td><input type="checkbox" name="check"></td>
	    <td><?php echo $row["id"]; ?></td>
  		<td><?php echo $row["item"]; ?></td>
  		<td><?php echo $row["grade"]; ?></td>
  		<td><?php echo $row["subitem"]; ?></td>
  		<td><?php echo $row["subgrade"]; ?></td>
  		<td><button class="btn btn-primary"><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></button></td>
  		<td><button class="btn btn-danger"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></button></td>
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
 </body>
</html>


<style type="text/css">
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
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
  .btn-primary
  {
  	background-color: #008CBA;
  	color: white;
  	font-size: 15px;
  	border-radius: 5px;
  }
  a
  {
  	text-decoration: none;
  	color: white;
  	font-weight: bold;
  }
  .btn-danger
  {
  	font-size: 15px;
  	border-radius: 5px;
    background-color: #f44336;
    
  }
  ul
  {
  	list-style: none;
  }
  input
  {
  	margin: 5px;
  	padding: 5px;
  }
</style>