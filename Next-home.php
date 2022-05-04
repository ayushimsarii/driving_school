<?php
require "phasedb.php";

$message = "";

/** insert data to table **/
if(isset($_POST['savepahse']))
{
	$phase = $_POST['name'];
	foreach($phase as $phase)
	{
		$sql = "INSERT INTO phase (name) VALUES ('".$phase."')";

		if ($conn->query($sql) === TRUE) 
		{
			$message = "<div class='successmessage'>Phases are saved successfully</div>"; 
		} else {
			$message = "<div class='errormessage'>Error: " .  $exec . "<br>" . $mysqli->error . "</div>";
		}
	}
}

/**
* get students **/
$sql = "SELECT id, name FROM phase";
$st = $conn->query($sql);
$phase = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$phase[] = $row;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phase</title>
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
	div
	{
		margin: 5px;
		padding: 5px;
	}
	.form-control
	{
		width: 50%;
	}
	a
	{
		/*color: white;*/
		text-decoration: none;
	}
	button
	{
		margin: 5px;
		padding: 5px;
	}
	h1
	{
		text-align: center;
	}
	input
	{
		margin: 5px;
		padding: 5px;
		text-align: center;
	}
	td,th
	{
		text-align: center;
	}
	.table
	{
		width: 50%;
	}
	i
	{
		font-size: 20px;
	}
</style>
<body>

<div class="container">
	<h1>Phases</h1>
	<hr>
	<div class="row">
		<div class="col">
			<center>
				<form class="insert-phases" id="integrity" method="post" action="">
					<div class="input-field">
						<table class="table table-bordered" id="table-field">
							<tr>
								<td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="name[]" class="form-control" value="" required /> </td>
								<td><a href="javascript:void(0);" class="add_button" title="Add field"><button class="btn btn-warning">Add</button></a></td>
							</tr>
						</table>
					</div>
					<center>
						<button class="btn btn-success" type="submit" name="savepahse">Submit</button>
					</center>
					</form>	
			</center>
		</div>
	</div>
	<div class="row">
		<center>
						<table class="table table-bordered src-table1">
							<thead>
								<tr>
									<th>Id</th>
									<th>Phase Name</th>
									<th colspan="2">Operations</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								if(count($phase) > 0)
								{
									$totalphase = count($phase);
									$i = 1;
									foreach($phase as $phase)
									{
										?>
										<tr id="check_<?php echo $i;?>" data-total-record="<?php echo $totalphase;?>" data-tr-id_<?php echo $i;?>="<?php echo $phase['id'];?>" data-name-<?php echo $i;?>="<?php echo $phase['name'];?>">
											<td><?php echo $phase['id'];?></td>
											<td><a href="phase-view.php?id=<?php echo $phase['id'];?>"><?php echo $phase['name'];?></a></td>
											<td><a href="phase-update.php?id=<?php echo $phase["id"]; ?>"><i style="color: green;" class="fas fa-pen"></i></a></td>
											<td><a href="phase-delete.php?id=<?php echo $phase["id"]; ?>"><i style="color: red;" class="fas fa-trash"></i></td>
										</tr>
										<?php
										$i++;
									}
								}
								?>
							</tbody>
						</table>
					</center>
	</div>
</div>

<div class="container">
	<button  class="btn btn-primary" type="submit"><a href="Home.php">Previous</a></button>
	<button style="float: right;" class="btn btn-primary" type="submit"><a href="phase-view.php">Next</a></button>
</div>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

 <script>
jQuery(document).ready(function($)
{
    var maxField = 10; // limit
    var addButton = $('.add_button');
    var wrapper = $('.field_wrapper');
    var fieldHTML = '<div><input class="form-control" type="text" name="name[]" value="" required /> <img src="remove-icon.png" style="width:6%;" class="remove_button" /></div>';
    var x = 1;
    
	// add input row
    $(addButton).click(function()
	{
        if(x < maxField)
		{ 
            x++;
            $(wrapper).append(fieldHTML);
        }
    });
    
	// delete input row
    $(wrapper).on('click', '.remove_button', function(e)
	{
        $(this).parent('div').remove();
        x--;
    });
});
</script>

</body>
</html>