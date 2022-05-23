<!--Insert Phases-->
<?php
require "connect.php";
$error = '';
$output = '';
if(isset($_POST["savephase"]))
{
    if(empty($_POST["phase"]))
    {
        $error = '<label class="text-danger">Phase is required</label>';
    }
    else
        {
            $phase = $_POST["phase"];
            foreach ($phase as $key => $value) 
            {
                                        
                $sql = "INSERT INTO phase (phase) VALUES ('".$value."')";

                $statement = $connect->prepare($sql);

                $statement->execute();

        }
            $error = '<label class="text-success">Data Inserted Successfully</label>';
        }
    }

            $query = "SELECT * FROM phase ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                        <td>'.$row["id"].'</td>
                            <td><a href="phase-view.php?id='.$row["id"].'&phase='.$row["phase"].'">'.$row["phase"].'</a></td>
                                <td><a href="phase-update.php?id='.$row["id"].'">Edit</a></td>
                                <td><a href="phase-delete.php?id='.$row["id"].'">Delete</a></td>
                            </td>
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
	.container
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

  tr:hover 
  {
    background-color: #ddd;
  }
</style>
<body>
<?php
	include 'header.php';
	?>
<!--Input Phases-->

<div class="container">
	<h1>Phases</h1>
	<hr>
	<div class="row">
		<div class="col">
			<center>

				<form class="insert-phases" id="integrity" method="post" action="">
					<div class="--input-field">
						<table class="table table-bordered" id="table-field">
							<tr>
								<td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="phase[] " class="form-control" value="" required /> </td>
								<td><input type="button" name="add_phase" value="Add" id="add_phase" class="btn btn-warning"></td>
							</tr>
						</table>
					</div>
					<center>
						<button class="btn btn-success" type="submit" name="savephase">Submit</button>
					</center>
				</form>	
			</center>
	</div>
</div>

<!--Phase Table-->

		<div class="row">
			<center>
				<table class="table table-striped table-bordered">
		            <tr>
		                <th>Id</th>
		                <th>Phase</th>
		                <th colspan="2">Operations</th>
		            </tr>
		                <?php
		                    echo $output;
		                ?>                
		        </table>
		    </center>
		</div>
</div>

<!--Next and Previous Button-->

<div class="container">
	<button  class="btn btn-primary" type="submit"><a href="Home.php">Previous</a></button>
	<button style="float: right;" class="btn btn-primary" type="submit"><a href="phase-view.php">Next</a></button>
</div>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!--Script for add multiple phases-->

<script type="text/javascript">
    $(document).ready(function()
	    {
	        var html = '<tr>\
	                        <td style="text-align: center;"><input type="text" placeholder="Enter Phase" name="phase[] " class="form-control" value="" required /> </td>\
	                        <td><input type="button" name="remove_actual" value="Remove" id="remove_phase" class="btn btn-danger"></td>\
	                    </tr>'
	        var max = 5;
	        var a = 1;

	        $("#add_phase").click(function()
	        {
	            if(a <= max)
	            {
	                $("#table-field").append(html);
	                a++;
	            }
	        });
	        $("#table-field").on('click','#remove_phase',function()
	        {
	            $(this).closest('tr').remove();
	            a--;
	        });
    });
 </script>
<?php
include_once 'footer.php';
?>
</body>
</html>