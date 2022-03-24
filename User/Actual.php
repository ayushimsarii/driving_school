<!DOCTYPE html>
<html>
<head>
	<title>Actual</title>
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
	.photo
	{
		width:100px;
		height:100px;
		border:1px solid black;
		background: transparent;
	}
	#history
	{
		margin: 20px;
		padding: 10px;
		border: 1px solid black;
		width: 30%;
		float: right;
	    text-align: center;	
	}
	.col
	{
		padding: 70px 0;
  
  text-align: center;
	}
	form
	{
		text-align: center;
	}
	label
	{
		font-weight: bold;
		font-size: x-large;
	}
	
	.btn-secondary
	{
		width: 70px;
		margin: 5px;
		padding: 5px;
	}
	a
	{
		text-decoration: none;
		color: white;
	}
</style>
<body>
	<!-- <?php include 'style.php' ?> -->
       <div class="container" id="history">
       		<div class="row">
       			<div class="col">
       				<div class="photo"></div>
       			</div>

       			<div class="col">
       				<input type="date" name="date">
       			</div>
       		</div>

       		<div class="row">
       			<form action="/action_page.php">
					<label for="w3review">Student Haves</label><br>
					<textarea id="w3review" name="w3review" rows="4" cols="50">
					 
					  </textarea>
					  <br><br>
					  <!-- <input class="btn btn-success" type="submit" value="Submit"><br> -->

					  <label for="w3review">Class # Select</label><br>
					<textarea id="w3review" name="w3review" rows="4" cols="50">
					 
					  </textarea>
					  <br><br>

					  <label for="w3review">Send A Message</label><br>
					<textarea id="w3review" name="w3review" rows="4" cols="50">
					 
					  </textarea>
					  <br><br>
					  <input class="btn btn-success" type="submit" value="Submit">
				</form>
       		</div>
       </div>

       <div class="container2">
       		<div class="row">
       		<div class="col">
       				<div class="btn btn-secondary"><a href="gradesheet.php">1</a></div>
					<div class="btn btn-secondary"> 2</div>
					<div class="btn btn-secondary">3</div>
					<div class="btn btn-secondary"> 4</div>
					<div class="btn btn-secondary"> 5</div>
					<div class="btn btn-secondary"> 6</div>
					<br>
					<div class="btn btn-secondary">7</div>
					<div class="btn btn-secondary">8</div>
					<div class="btn btn-secondary">9</div>
					<div class="btn btn-secondary">10</div>
					<div class="btn btn-secondary">11</div>
					<div class="btn btn-secondary">12</div>
					<br>
					<div class="btn btn-secondary">13</div>
					<div class="btn btn-secondary">14</div>
					<div class="btn btn-secondary">15</div>
					<div class="btn btn-secondary">16</div>
					<div class="btn btn-secondary">17</div>
					<div class="btn btn-secondary">18</div>
					<br>
					<div class="btn btn-secondary">19</div>
					<div class="btn btn-secondary">20</div>
					<div class="btn btn-secondary">21</div>
					<div class="btn btn-secondary">22</div>
					<div class="btn btn-secondary">23</div>
					<div class="btn btn-secondary">24</div>
					<br>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Items</button>
					<button type="button" class="btn btn-primary">Delete Sheet</button>
					<button type="button" class="btn btn-primary">Clone Sheet</button>
					<!-- <button type="button" class="btn btn-primary"><a href="gradesheet.php">Show Sheet</a></button> -->
       			</div>
       		</div>
       </div>


       <!-- <div class="container">
         <div class="row">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            ADD
          </button>
        </center>
         </div>
       </div> -->

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
      	    <!-- <button class="btn btn-success" type="submit"><a href="gradesheet.php">Gradesheet</a></button><br> -->
      	</center>
      </div>
              </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input id="btnGet" type="submit" class="btn btn-primary" value="Select" name="Sub" onclick="GetSelected()">
      </div> -->
    </div>
  </div>
</div>
</body>
</html>