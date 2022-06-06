<?php 

include_once 'connect.php';
$output1 ="";
 $query = "SELECT * FROM roles ORDER BY id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();

 if($statement->rowCount() > 0)
     {
         $result = $statement->fetchAll();
         $sn=1;
         foreach($result as $row)
         {
             $output1 .= '<option value="'.$row['roles'].'">'.$row['roles'].'</option>';
         }
     
     }
$id="";
$id=$_GET['id'];
$output="";


$query = "SELECT * FROM users where id='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .='
                       
                        <form method="post" action="update_user.php">
                        <input type="hidden" value="'.$id.'" name="user_dbid" class="form-control">
                        <label class="form-label">Name :</label>
                        <input type="text" value="'.$row['name'].'" name="user_name" class="form-control">
                        <label class="form-label">Role :</label>
                        <select name="user_role" class="form-control">
                        <option value="'.$row['role'].'" selected>'.$row['role'].'</option>
                        '.$output1.'
                        </select>
                        <label class="form-label">Std Id :</label>
                        <input type="text" value="'.$row['std_id'].'" name="user_id" class="form-control">
                        <label class="form-label">Phone Number :</label>
                        <input type="text" value="'.$row['phone'].'" name="user_ph" class="form-control">
                        <label class="form-label">Email id :</label>
                        <input type="text" value="'.$row['email'].'" name="user_em" class="form-control">
                        <br>
                        <input class="btn btn-primary" type="submit" name="submit" value="Update" class="login-button">
                        </form>
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
       <?php include('header.php')?>
       <?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>


       <br> 
<div class="container">   
  <div class="row">

   <?php echo $output ?>
            </div>
            </div>
</body>