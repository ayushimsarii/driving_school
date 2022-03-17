<?php
include_once 'database.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE bank set id='" . $_POST['id'] . "', item='" . $_POST['item'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM bank WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Data</title>
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
<body>
<center>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div class="col" id="hide">
      				
      		<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
      		<label type="text" name="id"  value="<?php echo $row['id']; ?>"></label>
            <br>
      				<input type="text" name="item" class="txtField" value="<?php echo $row['item']; ?>">
	            <!--This div shows after click on green blue button(This is subitem)-->
      				<!-- <ul id="sub">
      					<li id="sub1"></li><input type="text" name="mainsub" class="txtField" value="<?php echo $row['mainsub']; ?>">
      				</ul> -->
      				<button class="btn btn-primary" onclick="add_subitem()"><i class="fas fa-plus"></i></button>
      			    <button class="btn btn-secondary" onclick="subitem1()"><i class="fas fa-minus"></i></button><br>
      				<button class="btn btn-info" type="submit" name="save">Save</button><br>
      			</div>

      			<div style="padding-bottom:5px;">
					<a class="btn btn-success" href="gradesheet.php">Data List</a>
				</div>

</form>
</center>
</body>
</html>


<style type="text/css">
	form
	{
       width: 50%;
       border-radius: 10px;
       border: 1px solid black;
       margin:10px;
	}
    input
	{
		margin: 5px;
		padding: 5px;
		/*width: auto;*/
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