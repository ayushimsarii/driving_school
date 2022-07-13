<!-- <?php

$conn = mysqli_connect("localhost","root","","home");
/**
* get students **/
$id = isset($_GET['id']) ? $_GET['id'] : "";
$sql = "SELECT id, phasename FROM phase WHERE id = '".$Phaseid."'";
$st = $conn->query($sql);
$phasename = '';
if ($st->num_rows > 0) 
{
	// output data of each row
	$phasename = $st->fetch_assoc();
}

/**
* get students **/
$sql = "SELECT id, phasename FROM phase";
$st = $conn->query($sql);
$phases = array();
if ($st->num_rows > 0) 
{
	// output data of each row
	while($row = $st->fetch_assoc()) 
	{
		$phases[] = $row;
	}
}
?> -->

<?php
                session_start();
                include 'phasedb.php';

                $sql = "SELECT id, phasename FROM phase WHERE phasename = '" . $phasename . "'";
                $result = $conn->query($sql);
                if(!$sql)
                {
                  die(mysqli_error($conn));
                }

                if ($result->num_rows > 0) 
                {
                 
                    while ($row = $result->fetch_assoc()) {
                        echo "Hello, " . $row['phasename'] . "";
                        

                    }

                    $result->free();
                } 
                ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	a
	{
		color: white;
		text-decoration: none;
	}
	div
	{
		margin: 5px;
		padding: 5px;
	}
	span
	{
		color: blue;
	}
	form
	{
		width: 30%;
	}
	.row
	{
		border: 1px solid black;
		border-radius: 50px;
		width: 50%;
	}
	.short
	{
		width: 25%;
	}
</style>
<body>
	<div>Phase: <?php echo $row['phasename'];?></div>


<div class="container">
	<button class="btn btn-warning"><a href="actual.php">Actual Page</a></button>
	<button class="btn btn-warning"><a href="sim.php">Sim Page</a></button>
	<button class="btn btn-warning"><a href="academic.php">Academic Page</a></button>
</div>
    <div class="container">
    	<center>
    	<div class="row">
    		
    			<h3>Class : <span>Actual</span></h3>
		    		<form class="insert-phases" id="actual" method="post" action="">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-actual">
								<?php
								$conn = mysqli_connect("localhost","root","","class");

								if (isset($_POST['submit_actual'])) 
								{
									$actual = $_POST['actual'];
                                    $shortactual = $_POST['shortactual'];
									foreach ($actual as $key => $value) 
									{
										
										$sql = "INSERT INTO actual (actual, shortactual) VALUES ('".$value."', '".$shortactual[$key]."')";

										$query = mysqli_query($conn, $sql);

									}
								}
							?>
								<tr>
									<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?" required=""></td>
									<td class="short"><input maxlength="10" type="text" name="shortactual[]" class="form-control"></td>
									<td><input type="button" name="add_actual" value="Add" id="add_actual" class="btn btn-warning"></td>
								</tr>
							</table>
						</div>
							<center>
								<button class="btn btn-success" type="submit" name="submit_actual">Save</button>
							</center>
					</form>	
	
    	</div>
        </center>
    </div>

     <div class="container">
    	<center>
    	<div class="row">
    		
    			<h3>Class : <span>Simulation</span></h3>
		    		<form class="insert-phases" id="sim" method="post" action="">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-sim">
								<?php
								$conn = mysqli_connect("localhost","root","","class");

								if (isset($_POST['submit_sim'])) 
								{
									$sim = $_POST['sim'];
                                    $shortsim = $_POST['shortsim'];
									foreach ($sim as $key => $value) 
									{
										
										$sql = "INSERT INTO sim (sim, shortsim) VALUES ('".$value."', '".$shortsim[$key]."')";

										$query = mysqli_query($conn, $sql);

									}
								}
							?>
								<tr>
									<td style="text-align: center;"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>
									<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control"></td>
									<td><input type="button" name="add_sim" value="Add" id="add_sim" class="btn btn-warning"></td>
								</tr>
							</table>
						</div>
							<center>
								<button class="btn btn-success" type="submit" name="submit_sim">Save</button>
							</center>
					</form>	
	
    	</div>
        </center>
    </div>

     <div class="container">
    	<center>
    	<div class="row">
    		
    			<h3>Class : <span>Academic</span></h3>
		    		<form class="insert-phases" id="academic" method="post" action="">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-academic">
								<?php
									$conn = mysqli_connect("localhost","root","","class");

									if (isset($_POST['submit_academic'])) 
									{
										$academic = $_POST['academic'];
	                                    $shortacademic = $_POST['shortacademic'];
										foreach ($academic as $key => $value) 
										{
											
											$sql = "INSERT INTO academic (academic, shortacademic) VALUES ('".$value."', '".$shortacademic[$key]."')";

											$query = mysqli_query($conn, $sql);

										}
									}
								?>
								<tr>
									<td style="text-align: center;"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many Academic Classes you want?"></td>
									<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control"></td>
									<td><input type="button" name="add_academic" value="Add" id="add_academic" class="btn btn-warning"></td>
								</tr>
							</table>
						</div>
							<center>
								<button class="btn btn-success" type="submit" name="submit_academic">Save</button>
							</center>
					</form>	
	
    	</div>
        </center>
    </div>

    <div class="container">
		<button  class="btn btn-primary" type="submit"><a href="Next-home.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="actual.php">Next</a></button>
    </div>

    <div class="container">
    	<div class="row">
    		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		    		<div class="col">
						<center>
							<table class="table table-striped" id="datatable">
								
								<thead class="Success">
					            <tr>
									<th>id</th>
									<th>Actual Name</th>
									<th>Symbols</th>
								</tr>
					                    </thead>
                                        <tbody id="ty">
					                        <?php
					                        // session_start();
					                        $conn = mysqli_connect("localhost","root","","class");
					                        $select = mysqli_query($conn, "SELECT * FROM actual");
					                        if (mysqli_num_rows($select) > 0) { $i=1;
					                        while($row = mysqli_fetch_assoc($select)) { 
					                        ?>
					                           <tr>
					                              <td><?php echo $i;?></td>
					                              <td><?php echo $row['actual'];?></td>
					                              <td><?php echo $row['shortactual'];?></td>
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

		            <div class="col">
						<center>
							<table class="table table-striped">
								
								<thead class="Success">
					                         <tr>
									<th>id</th>
									<th>sim Name</th>
									<th>Symbols</th>
								</tr>
					                    </thead>

					                        <?php
					                        // session_start();
					                        $conn = mysqli_connect("localhost","root","","class");
					                        $select = mysqli_query($conn, "SELECT * FROM sim");
					                        if (mysqli_num_rows($select) > 0) { $i=1;
					                        while($row = mysqli_fetch_assoc($select)) { 
					                        ?>
					                           <tr>
					                              <td><?php echo $i;?></td>
					                              <td><?php echo $row['sim'];?></td>
					                              <td><?php echo $row['shortsim'];?></td>
					                            </tr>
					                        <?php 
					                        $i++; 
					                      } 
					                    }
					                        ?>
							</table>
						</center>
		            </div>
    </div>
</div>


    <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function()
 	{
 		var html = '<tr>\
						<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?"></td>\
						<td class="short"><input maxlength="10" type="text" name="shortactual[]" class="form-control"></td>\
									<td><input type="button" name="remove_actual" value="Remove" id="remove_actual" class="btn btn-danger"></td>\
					</tr>'
	    var max = 5;
		var a = 1;

		$("#add_actual").click(function()
		{
			if(a <= max)
			{
				$("#table-field-actual").append(html);
				a++;
			}
		});
		$("#table-field-actual").on('click','#remove_actual',function()
		{
			$(this).closest('tr').remove();
			a--;
		});
 	});
 </script>

 <script type="text/javascript">
 	$(document).ready(function()
 	{
 		var html1 = '<tr>\
						<td style="text-align: center;"><input type="text" name="sim[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>\
						<td class="short"><input maxlength="10" type="text" name="shortsim[]" class="form-control"></td>\
									<td><input type="button" name="remove_sim" value="Remove" id="remove_sim" class="btn btn-danger"></td>\
					</tr>'
	    var max1 = 5;
		var b = 1;

		$("#add_sim").click(function()
		{
			if(b <= max1)
			{
				$("#table-field-sim").append(html1);
				b++;
			}
		});
		$("#table-field-sim").on('click','#remove_sim',function()
		{
			$(this).closest('tr').remove();
			b--;
		});
 	});
 </script>

 <script type="text/javascript">
 	$(document).ready(function()
 	{
 		var html2 = '<tr>\
						<td style="text-align: center;"><input type="text" name="academic[]" class="form-control" placeholder="Enter How many Sim Classes you want?"></td>\
						<td class="short"><input maxlength="10" type="text" name="shortacademic[]" class="form-control"></td>\
									<td><input type="button" name="remove_academic" value="Remove" id="remove_academic" class="btn btn-danger"></td>\
					</tr>'
	    var max2 = 5;
		var c = 1;

		$("#add_academic").click(function()
		{
			if(c <= max2)
			{
				$("#table-field-academic").append(html2);
				c++;
			}
		});
		$("#table-field-academic").on('click','#remove_academic',function()
		{
			$(this).closest('tr').remove();
			c--;
		});
 	});
 </script>
 
  <script>
          function myFunction() 
          {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("datatable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) 
            {
              td = tr[i].getElementsByTagName("td")[1];
              if (td) 
              {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                  tr[i].style.display = "";
                } 
                else 
                {
                  tr[i].style.display = "none";
                }
              }       
            }
          }

      </script>

</body>
</html>