<?php
include_once 'phasedb.php';
if(count($_POST)>0) { 
// $id = isset($_GET['id']) ? $_GET['id'] : '';
// $phases = $_POST['name'];
mysqli_query($conn,"UPDATE phase set phase = '".$_POST['name']."' WHERE id='" . $_GET['id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM phase WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Data</title>
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
				<form class="center" name="frmUser" method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
				<div><?php if(isset($message)) { echo $message; } ?>
				</div>
				<div style="padding-bottom:5px;">
				<a href="Next-home.php">Phase List</a>
				</div>
				<!-- <input type="hidden" name="phaseid" class="txtField" value="<?php echo $row['id']; ?>">
				<input type="text" name="phaseid"  value="<?php echo $row['id']; ?>">
				<br> -->
				<div class="form-group">
				<label>Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>">
				</div>
        <input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
				<input class="btn btn-primary" type="submit" name="submit" value="Submit" class="buttom">

				</form>
			</center>
</body>
</html>