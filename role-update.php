<?php 
 $id=$_GET['id'];
 $name=$_GET['name'];
$array="";
include('connect.php');
$query = "SELECT * FROM roles where id='$id'";
$statement = $connect->prepare($query);
$statement->execute();
foreach($statement as $row){
  $data=$row['permission'];  
    $test = unserialize($data);
    //var_dump($test);
        
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
<body>
   <?php include('header.php')?>
   <br>
   <div class="container">
<div class="row">
    		
            <form action="edit_role_data.php" method="post">
            <div class="mb-3">
                <label class="form-label">Edit Role:</label>
               <input type="text" class="form-control" name="role" value="<?php echo $name?>">
               <input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
               <label>Edit Permissions:</label>
                <p>
            <input type="checkbox" value="1" <?php if ($test['show_p'] == "1") {
                echo 'checked';
            } ?> name="show_p">phase page<br/>
            <input type="checkbox" value="1" <?php if ($test['show_c'] == "1") {
                echo 'checked';
            } ?> name="show_c">class page<br/>
            <input type="checkbox" value="1" <?php if ($test['actual'] == "1") {
                echo 'checked';
            } ?> name="actual">actual page<br/>
            <input type="checkbox" value="1" <?php if ($test['sim'] == "1") {
                echo 'checked';
            } ?> name="sim">sim page<br/>
            <input type="checkbox" value="1" <?php if ($test['Academic'] == "1") {
                echo 'checked';
            } ?> name="Academic">Academic page<br/>
            <input type="checkbox" value="1" <?php if ($test['Task'] == "1") {
                echo 'checked';
            } ?> name="Task">Task Log page<br/>
            <input type="checkbox" value="1" <?php if ($test['Student'] == "1") {
                echo 'checked';
            } ?> name="Student">Student Log Page
            <br/>
            <input type="checkbox" value="1" <?php if ($test['Emergency'] == "1") {
                echo 'checked';
            } ?> name="Emergency">Emergency Log Page<br/>
            <input type="checkbox" value="1" <?php if ($test['Testing'] == "1") {
                echo 'checked';
            } ?> name="Testing">Testing Log Page<br/>
            <input type="checkbox" value="1" <?php if ($test['Qual'] == "1") {
                echo 'checked';
            } ?> name="Qual">Qual Log page<br/>
            <input type="checkbox" value="1" <?php if ($test['Clearance'] == "1") {
                echo 'checked';
            } ?> name="Clearance">Clearance Log Page<br/>
            <input type="checkbox" value="1" <?php if ($test['Class'] == "1") {
                echo 'checked';
            } ?> name="Class">class page<br/>
            <input type="checkbox" value="1" <?php if ($test['Memo'] == "1") {
                echo 'checked';
            } ?> name="Memo">Memo Record Page<br/>
            
            <button type="submit" class="btn btn-primary">Submit</button>     
</form>
</div>
</div>
</div>
</body>
</html>