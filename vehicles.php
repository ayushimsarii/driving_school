<?php
include('connect.php');
$output ="";
 $query = "SELECT * FROM vehicle  ORDER BY id DESC";
 $statement = $connect->prepare($query);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
             $output .= '
             <tr>
             <td>'.$sn++.'</td>
             <td>'.$row['VehicleName'].'</td>
             <td>'.$row['VehicleType'].'</td>
             <td>'.$row['VehicleNumber'].'</td>
             <td><a href="editvehicle-update.php?id='.$row["id"].'">Edit</a>
            <a href="user-delete.php?id='.$row["id"].'">Delete</a></td>
             </tr>
             ';
         }
     
     }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main Dashboard</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
?>

<div class="container">
       <br>
       <center>
       <button class="btn btn-success" type="button" data-toggle="modal" data-target="#vehicle">Add Vehicle</button>
       <button class="btn btn-primary">Manage Vehicles</button>
       <button class="btn btn-warning">Vehicle List</button>
   </center><br>
   <div class="row">
			<center>
				<table style="width:80%;" class="table table-striped table-bordered">
		            <tr>
		                <th>Sr No</th>
		                <th>Vehicle Name</th>
                        <th>Vehicle Type</th>
                        <th>Vehicle Number</th>
                        <th>Action</th>
                      
		            </tr>
		                <?php
		                    echo $output;
		                ?>                
		        </table>
		    </center>
		</div>
</div>


<!--Add vehicle modal-->

        <div class="modal fade" id="vehicle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vehicles</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <center>
                                <form action="vehicledata.php" method="post">

                                      <div class="form-outline">
                                        <label class="form-label" for="coursename">Vehicle Name</label>
                                        <input type="text" id="course" name="VehicleName" class="form-control form-control-md" />
                                      </div>

                                      <div class="form-outline">
                                        <label class="form-label" for="coursenumber">Vehicle Type</label>
                                        <input type="text" id="addmanual" name="VehicleType" class="form-control form-control-md" />
                                      </div>

                                      <div class="form-outline">
                                        <label class="form-label" for="coursename">Vehicle Number</label>
                                        <input type="text" id="coursecode" name="VehicleNumber" class="form-control form-control-md" />
                                      </div><br>
                                    <input class="btn btn-primary btn-md" type="submit" value="Submit" name="submitvehicle" />
                                </form>
                </center>
              </div>
            </div>
          </div>
        </div>

<?php
include_once 'footer.php';
?>
</body>
</html>