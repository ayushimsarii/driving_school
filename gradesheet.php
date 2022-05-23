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
  .lockshow
  {
    display: none;
    border: 1px solid black;
    margin: 10px, 10px, 10px, 10px;
    height: 750px;
    /*text-align: center;*/
   /* background-color: black;*/
  }
  .opacity
  {
   border: 1px solid white;
   height: 730px;
   background-color: white;
   opacity: 0.6;

  }
  .center 
  {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    /*border: 5px solid #FFFF00;*/
    padding: 10px;
  }
  #overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: right;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
ul
{
  list-style: none;
}
button
{
  margin: 5px;
  padding: 5px;
}
</style>
<body>
 <?php
include_once 'header.php';
?> 
  <div class="lockshow" id="overlay">
    <div class="container" id="opacity">
      <center class="center">
        <!-- <h1 style="color: red;">The Sheet Has been Locked</h1> -->
        <i style="font-size: 50px; margin: 5px; padding: 5px;" class="fas fa-lock"></i><br>
        <label style="color: white;">Instructor</label>
        <select style="height: 40px; margin: 5px; padding: 5px;">
          <option>Instructor-1</option>
          <option>Instructor-1</option>
          <option>Instructor-1</option>
          <option>Instructor-1</option>
        </select><br>
        <button style="background-color: green; margin: 5px;" class="btn btn-success" onclick="Unlock()">Unlock</button>
      </center>
    </div>
  </div>

	<!--first container-->
      <div class="container" id="lock1">
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
       <div class="container" id="lock2">
        <div class="row">
          <center>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert item">
              ADD
            </button>
          </center>
        </div>
       </div>
      <!-- Button trigger modal -->

      <div class="container" id="lock3">
        <div class="row">
          <div class="col-8">
              <table id="myTable" class="table table-responsive" width="100%">
                    <thead class="Success">
                         <tr>
                            <td><b>#</b></td>
                            <td><b>Id</b></td>
                            <td><b>Item</b></td>
                            <!-- <td><b>SubItem</b></td> -->
                            <td><b>Remove</b></td>
                          
                         </tr>
                    </thead>

                        <?php
                        include 'database.php';
                        $query11 = mysqli_query($conn,"SELECT * FROM itembank");
                        if (mysqli_num_rows($query11) > 0) { $i=1;
                        while($user = mysqli_fetch_assoc($query11)) { 
                        ?>
                           <tr>
                              <td><input type="checkbox"  name="users" value="<?php echo $user['id'];?>"/><span></span></td>
                              <td><?php echo $i;?></td>
                              <td id="fetch"><?php echo $user['item'];?>
                              </td>
                              <!-- <td><?php echo $user['subitem'];?></td> -->

                           <td><button type="button" class="btn btn-danger" value="Delete" onclick="deleteRow(this)"><i class="fas fa-times"></i></button></td>
                              <!-- <td><a class="btn btn-danger" href="delete.php?id=<?php echo $user["id"]; ?>"><i class="fas fa-trash"></i></a></td> -->
                              
                            </tr>
                        <?php 
                        $i++; 
                      } 
                    }
                        ?>

                </table>
<?php include 'radio.php' ?>
<form action="radio.php" method="post" name="my-form">
<input class="btn btn-warning" type="submit" name="radiobtn" value="Save">
</form>
<button class="btn btn-danger" type="submit" onclick="lock()" id="lock">Lock</button>
          </div>
          <div class="col-4">
            <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
        
<!-- <button class="btn btn-success">Unlock</button> -->
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
                            <input type="text" name="item" id="item1" value="" placeholder="Enter Item">
                            <!-- <button class="btn btn-primary"><i class="fas fa-plus-circle"></i></button> --><br>
                            <div class="modal-footer">
                              <input type="submit" name="Insert" class="btn btn-primary" value="Insert" onclick="show()">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                            <!-- <input type="submit" name="Insert" class="btn btn-primary" value="Insert"> -->
                        </form>
                      </center>
                  </div>
                  
                </div>
            </div>
        </div>


   

<!--Checkbox fetching and display on alert box-->

<script src="sheet.js"></script>
<?php
include_once 'footer.php';
?>
</body>
</html>