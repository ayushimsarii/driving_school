
<!DOCTYPE html>
<html lang="en">
<head>
<title>Class</title>
<!-- <title>Phase</title> -->
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
	a
	{
		color: white;
		text-decoration: none;
	}
	.container
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
	tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
</style>
<body>
	<?php
include_once 'header.php';
?>
<!--Fetching Phase Name-->
					<?php if(isset($_GET['phase'])){?>
					<div class="container">
            <h1>Phase: <?php echo '<span style="color:red">'.$_GET['phase'].'</span>'?> </h1>
          </div>
<?php }  ?>

<!--Buttons for Classes-->
<!-- <div class="container">
	<button class="btn btn-warning"><a href="actual.php">Actual Page</a></button>
	<button class="btn btn-warning"><a href="sim.php">Sim Page</a></button>
	<button class="btn btn-warning"><a href="academic.php">Academic Page</a></button>
	<button class="btn btn-primary"><a href="All class data.php">Class Edit and Delete</a></button>
</div> -->

<!--Add Actual classes-->
<div class="container">
  <center>
    <div class="row">
    		<h3>Class : <span>Actual</span></h3>
		    	<form class="insert-phases" id="actual" method="post" action="">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-actual">
										<?php
										include('connect.php');
										$error = '';
										$output = '';

										//var_dump(isset($_POST["add1"]));
										if (isset($_POST['submit_actual'])) 
										{
										    //var_dump(empty($_POST["name"] || empty($_POST["symbol"])));
										    if($_POST["actual"]=="" || $_POST["actualsymbol"]=="")
										    {
										        $error = '<label class="text-danger">field is required</label>';
										    }
										    else
										        {
										            $actual = $_POST['actual'];
		                                            $symbol = $_POST['actualsymbol'];
										            $phase=$_GET['phase'];
										            foreach ($actual as $key => $value) {
										            $query ="INSERT into actual(actual, symbol, phase) values('".$value."', '".$symbol[$key]."','$phase')";
										           
										            //var_dump($query);

										            $statement = $connect->prepare($query);

										            $statement->execute();

										            $error = '<label class="text-success">Data Inserted Successfully</label>';
										          }
										        }
										    }
										?>
										<tr>
											<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?" required=""></td>
											<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control"></td>
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

<!--Adding Simulation Classes-->
<div class="container">
  <center>
    <div class="row">
    		<h3>Class : <span>Simulation</span></h3>
		    		<form class="insert-phases" id="sim" method="post" action="">
							<div class="input-field">
								<table class="table table-bordered" id="table-field-sim">
										<?php
										include('connect.php');
										$error = '';
										$output = '';

										//var_dump(isset($_POST["add1"]));
										if (isset($_POST['submit_sim'])) 
										{
										    //var_dump(empty($_POST["name"] || empty($_POST["symbol"])));
										    if($_POST["sim"]=="" || $_POST["shortsim"]=="")
										    {
										        $error = '<label class="text-danger">field is required</label>';
										    }
										    else
										        {
										            $sim = $_POST['sim'];
		                                            $shortsim = $_POST['shortsim'];
										            $phase=$_GET['phase'];
										            foreach ($sim as $key => $value) {
										            $query ="INSERT into sim(sim, shortsim, phase) values('".$value."', '".$shortsim[$key]."','$phase')";
										           
										            //var_dump($query);

										            $statement = $connect->prepare($query);

										            $statement->execute();

										            $error = '<label class="text-success">Data Inserted Successfully</label>';
										          }
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

<!--Adding Academic classes-->
<div class="container">
  <center>
    <div class="row">
    		<h3>Class : <span>Academic</span></h3>
		    	<form class="insert-phases" id="academic" method="post" action="">
						<div class="input-field">
							<table class="table table-bordered" id="table-field-academic">
									<?php
										include('connect.php');
										$error1 = '';
										// $output = '';

										//var_dump(isset($_POST["add1"]));
										if (isset($_POST['submit_academic'])) 
										{
										    //var_dump(empty($_POST["name"] || empty($_POST["symbol"])));
										    if($_POST["academic"]=="" || $_POST["shortacademic"]=="")
										    {
										        $error1 = '<label class="text-danger">field is required</label>';
										    }
										    else
										        {
										            $academic = $_POST['academic'];
		                                            $shortacademic = $_POST['shortacademic'];
										            $phase=$_GET['phase'];
										            foreach ($academic as $key => $value) {
										            $query1 ="INSERT into academic(academic, shortacademic, phase) values('".$value."', '".$shortacademic[$key]."','$phase')";
										           
										            //var_dump($query);

										            $statement1 = $connect->prepare($query1);

										            $statement1->execute();

										            $error1 = '<label class="text-success">Data Inserted Successfully</label>';
										          }
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

<!--Previous and Next Button-->

    <div class="container">
			<button  class="btn btn-primary" type="submit"><a href="Next-home.php">Previous</a></button>
			<button style="float: right;" class="btn btn-primary" type="submit"><a href="actual.php">Next</a></button>
    </div>

<!--Fetch Data of the classes-->
    <div class="container">
    	<div class="row" style="width:100%;">
    		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
		    		<div class="col">
		    			<?php
$connect = new PDO("mysql:host=localhost;dbname=phase", "root", "");

$error = '';
$output = '';


$query = "SELECT * FROM actual ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                       
                        <td>'.$row["id"].'</td>
                        <td>'.$row["actual"].'</td>
                        <td>'.$row["symbol"].'</td>
                        <td><button class="btn btn-success"><a href="actual-update.php?id='.$row["id"].'">Edit</a></button></td>
                        <td><button class="btn btn-danger"><a href="actual-delete.php?id='.$row["id"].'">Delete</a></button></td>
                        </tr>';
                    }
                }
                else
                {
                    $output .= '
                        <tr>
                            <td colspan="2">No Data Found</td>
                        </tr>
                    ';
                }

                ?>
						<center>
							<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>

                  <table class="table" id="datatable">
                        <tr>
                        <td>id</td>
                            <td>Actual</td>
                            <td>Symbol</td>
                            <td colspan="2">Operations</td>
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            
						</center>
		            </div>

		            <div class="col">
						<center>
							<?php
$connect = new PDO("mysql:host=localhost;dbname=phase", "root", "");

$error = '';
$output = '';


$query = "SELECT * FROM sim ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                       
                        <td>'.$row["id"].'</td>
                        <td>'.$row["sim"].'</td>
                        <td>'.$row["shortsim"].'</td>
                        <td><button class="btn btn-success">Edit</button></td>
                        <td><button class="btn btn-danger"><a href="sim-delete.php?id='.$row["id"].'">Delete</a></button></td>
                        </tr>';
                    }
                }
                else
                {
                    $output .= '
                        <tr>
                            <td colspan="2">No Data Found</td>
                        </tr>
                    ';
                }

                ?>
						<center>
							<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>

                  <table class="table" id="datatable">
                        <tr>
                        <td>id</td>
                            <td>Sim</td>
                            <td>Symbol</td>
                            <td colspan="2">Operations</td>
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            
						</center>
						</center>
		            </div>
    </div>
</div>
 <script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for adding multiple actual classes-->

 <script type="text/javascript">
		 	$(document).ready(function()
		 	{
			 		var html = '<tr>\
									<td style="text-align: center;"><input type="text" name="actual[]" class="form-control" placeholder="Enter How many Actual Classes you want?"></td>\
									<td class="short"><input maxlength="10" type="text" name="actualsymbol[]" class="form-control"></td>\
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


<!--Script for adding multiple sim classes-->

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

<!--Script for adding multiple academic classes-->

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
 
<!--Script for search classes-->

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
      <?php
include_once 'footer.php';
?>
</body>
</html>