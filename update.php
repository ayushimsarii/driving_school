<?php
include_once 'database.php';
if(count($_POST)>0) { 
$id = isset($_GET['id']) ? $_GET['id'] : '';
mysqli_query($conn,"UPDATE bank set id='" . $_GET['id'] . "', item='" . $_POST['item'] . "' WHERE id='" . $_GET['id'] . "'");
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
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
</head>
<style type="text/css">
	input
	{
		margin: 5px;
		padding: 5px;
	}
	.center 
  {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid black;
    padding: 10px;
  }
</style>
<body>
	        <center>
				<form class="center" name="frmUser" method="post" action="">
				<div><?php if(isset($message)) { echo $message; } ?>
				</div>
				<div style="padding-bottom:5px;">
				<a href="gradesheet.php">Data List</a>
				</div>
				<input type="hidden" name="userid" class="txtField" value="<?php echo $row['id']; ?>">
				<input type="text" name="userid"  value="<?php echo $row['id']; ?>">
				<br>
				Item: <br>
				<input type="text" name="item" class="txtField" value="<?php echo $row['item']; ?>">
				<br>

				<input class="btn btn-primary" type="submit" name="submit" value="Submit" class="buttom">

				</form>
			</center>
</body>
</html>