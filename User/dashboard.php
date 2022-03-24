<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
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
    <!-- <link rel="stylesheet" href="style.css" /> -->
</head>
<style type="text/css">
  select,option
	{
		margin: 5px;
		padding: 5px;
		/*width: auto;*/
	}
	input,
  label
  {
    margin: 5px;
    padding: 5px;
    display: flex;
  }
	.container
	{
		margin-top: 10px;
	}
  td,
  th
  {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 5px;
    
    text-align: center;
  }
  table
  {
    margin: auto;
    margin-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
  ::placeholder 
  { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: red;
    font-weight: bold;
    font-size: larger; 
  }
  a
  {
  	text-decoration: none;
  	color: white;
  }
  h6
  {
    border: 1px solid black;
    margin: 5px;
    padding: 5px;
    font-weight: bold;
    font-size: x-large;
    display: table-cell;
  }
</style>
<body>

	<div class="container">
        <p>Hey, <?php echo $_SESSION['username']; ?>! You are now user dashboard page.</p><p class="btn btn-danger"><a href="logout.php">Logout</a></p>
    </div>


	<div class="container">
      	<div class="row">
      		<div class="col">

            <?php

$con = mysqli_connect("localhost","root","","test");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, name, role, phone, email FROM users WHERE username = '" . $_SESSION['username'] . "'";
$result = $con->query($sql);
if(!$sql){
  die(mysqli_error($con));
}

if ($result->num_rows > 0) {
 
    while ($row = $result->fetch_assoc()) {
        echo "Hello, " . $row['name'] . " (" . $row['email'] . ").";
         
        // $Subitem = $row["Subitem"];
        // $radiosub = $row["radiosub"]; 

        print '<table>
              <tr>
                <td><label>Id</label><input type="text" name="up" placeholder= '.$row['id'].' ></td>
                <td><label>Name</label><input type="text" name="ride" placeholder= '.$row['name'].'></td>
              </tr>
              <tr>
                <td><label>Role</label><input type="text" name="status" placeholder= '.$row['role'].'></td>
                <td><label>Phone</label><input type="text" name="status" placeholder= '.$row['phone'].'></td>
              </tr>
              <tr>
                <td><label for="Instructor">Instructor</label>
                    <select id="Instructor" name="Instructor">
                      <option value="volvo">Instructor-1</option>
                      <option value="saab">Instructor-2</option>
                      <option value="fiat">Instructor-3</option>
                      <option value="audi">Instructor-4</option>
                    </select></td>
                <td><label>Time</label><input type="time" name="time"></td>
              </tr>
              </table>';

    }

    $result->free();
} 
?>
      		</div>

      		<div class="col">
      			<h4>Prereuisites</h4>
      			<h6>Academic</h6>
      			<h6>Academic</h6>
            <h6>Academic</h6><br>
            <h6>Academic</h6>
            <h6>Academic</h6>
            <h6>Academic</h6>
      		</div>
      	</div>
      </div>

      <div class="container">
      	<h2>PHASE 1</h2>
      	<div>
      		<button class="btn btn-success"><a href="Actual.php">Actual</a></button>
      		<button class="btn btn-success"><a href="sim.php">Sim</a></button>
      	</div>
      </div>
</body>
</html>