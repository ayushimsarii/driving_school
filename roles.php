<!DOCTYPE html>
<html>
<head>
	<title></title>
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
include('connect.php');
$output="";
include_once 'header.php';
$query = "SELECT * FROM roles ORDER BY id ASC";
$statement = $connect->prepare($query);
$statement->execute();

if($statement->rowCount() > 0)
    {
        $result = $statement->fetchAll();
        $sn=1;
        foreach($result as $row)
        {
           // <td><a href="phase-view.php?id='.$row["id"].'&phase='.$row["phase"].'">'.$row["phase"].'</a></td>
            $output .= '<tr>
            <td>'.$sn++.'</td>
                <td>'.$row['roles'].'</td>
                <td><a href="role-update.php?id='.$row["id"].'&name='.$row["roles"].'">Edit</a>
                <a href="role-delete.php?id='.$row["id"].'">Delete</a></td>  
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
<br>
<div class="container">

        <div class="row">
    		
            <form action="save_role.php" method="post">
            <div class="mb-3">
                <label class="form-label">Add Role:</label>
                <!-- <input type="text" class="form-control" name="role" required Placeholder="Add Roles.."> -->
           <select name="role" id="role" class="form-control">
               <option value="student">Student</option>
               <option value="Course Manager">Course Manager</option>
               <option value="Phase Manager">Phase Manager</option>
               <option value="instructor">Instructor</option>
           </select>
            </div>
            <h5>Pages Permission : </h5>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" name="show_p" id="show_p" value="1" type="checkbox">
                          <label class="custom-control-label" for="show_p">phase page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="show_c" name="show_c" type="checkbox">
                          <label class="custom-control-label" for="show_c">class page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="actual" name="actual" type="checkbox">
                          <label class="custom-control-label" for="actual">actual page</label>
                        </div>
                        
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="sim" name="sim" type="checkbox">
                          <label class="custom-control-label" for="sim">sim page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Academic" name="Academic" type="checkbox">
                          <label class="custom-control-label" for="Academic">Academic page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Task" name="Task" type="checkbox">
                          <label class="custom-control-label" for="Task">Task Log page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Student" name="Student" type="checkbox">
                          <label class="custom-control-label" for="Student">Student Log Page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Emergency" name="Emergency" type="checkbox">
                          <label class="custom-control-label" for="Emergency">Emergency Log Page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Testing" name="Testing" type="checkbox">
                          <label class="custom-control-label" for="Testing">Testing Log Page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Qual" name="Qual" type="checkbox">
                          <label class="custom-control-label" for="Qual">Qual Log page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Clearance" name="Clearance" type="checkbox">
                          <label class="custom-control-label" for="Clearance">Clearance Log Page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Class" name="Class" type="checkbox">
                          <label class="custom-control-label" for="Class">Class Page</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                          <input class="custom-control-input" value="1" id="Memo" name="Memo" type="checkbox">
                          <label class="custom-control-label" for="Memo">Memo Record Page</label>
                        </div>
                <br>        
            <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
<br>
<div class="row">
			<center>
				<table class="table table-striped table-bordered">
		            <tr>
		                <th>Id</th>
		                <th>Role</th>
		                <th colspan="2">Action</th>
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