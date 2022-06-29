<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task Log</title>
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
    <link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
	include_once 'sidenavbar.php';
?>
<div class="container" id="taskcontainer">
	<center>
	<div class="row">
        <h4 id="acctask">Accomplish Task</h4>
		<span>This container for accomplish task</span>
    </div>
	<hr>
	<div class="row" id="adrow">
		<h4 id="addtask">Additional Task</h4>
		<span>
			<?php
				$item=$_REQUEST['itemchecklist'];
				foreach($item as $items)
				{
					// echo $items, "<br>";
					echo "<button class='btn btn-success' style='background-color:'>$items</button>";
				}
			?>
        </span>
    </div>
    </center>
</div>

</body>
</html>