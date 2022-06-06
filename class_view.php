<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit And Delete Class Data</title>
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
	th,td
	{
		text-align: center;
	}
	h3
	{
		color: blue;
	}
  /*tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }*/
  tr:hover 
  {
    background-color: #ddd;
  }
</style>
<body>
    <?php
include_once 'header.php';
?>
<?php
    include_once 'sidenavbar.php';
    ?>
<div class="container">

	<div class="row">
		<div class="col">
			<h3>Actual Class All Data</h3>
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
                        <td>'.$row["phase"].'</td>
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

                  <table class="table table-striped" id="datatable">
                        <tr>
                        	<th>id</th>
                            <th>Actual</th>
                            <th>Symbol</th>
                            <th>Phase Name</th>
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            
						</center>
		            </div>


		            <div class="col">
		            	<h3>Sim Class All Data</h3>
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
                        <td>'.$row["phase"].'</td>
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

                  <table class="table table-striped" id="datatable">
                        <tr>
                        	<th>id</th>
                            <th>Sim</th>
                            <th>Symbol</th>
                            <th>Phase Name</th>
                            
                        </tr>
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            
		            </div>
		</div>
	</div>
</div>
<?php
include_once 'footer.php';
?>
</body>
</html>