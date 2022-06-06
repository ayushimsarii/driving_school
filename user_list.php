<?php
include('connect.php');
$output ="";
 $query = "SELECT * FROM users  ORDER BY id DESC";
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
             <td>'.$row['name'].'</td>
             <td>'.$row['studid'].'</td>
             <td>'.$row['role'].'</td>
             <td>'.$row['phone'].'</td>
             <td>'.$row['email'].'</td>
             <td><a href="edituser-update.php?id='.$row["id"].'">Edit</a>
            <a href="user-delete.php?id='.$row["id"].'">Delete</a></td>
             </tr>
             ';
         }
     
     }
?>
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
<body>
   <?php
   include_once 'header.php';
   include_once 'sidenavbar.php';
   ?> 
   <div class="container">
       <br>
   <div class="row">
			<center>
				<table style="width:80%;" class="table table-striped table-bordered">
		            <tr>
		                <th>Sr No</th>
		                <th>Name</th>
                        <th>Std Id</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>email</th>
                        <th>Action</th>
                      
		            </tr>
		                <?php
		                    echo $output;
		                ?>                
		        </table>
		    </center>
		</div>
</div>
</body>
</html>