<?php
include('connect.php');
$actclass="";
$simclass="";
$academicclass="";
$in="";
$class=$_REQUEST['class'];
$q2= "SELECT * FROM users where role='Instructor'";
$st2 = $connect->prepare($q2);
$st2->execute();

 if($st2->rowCount() > 0)
     {
         $re2 = $st2->fetchAll();
       foreach($re2 as $row2)
         {
          $in.= '<option value="'.$row2['id'].'">'.$row2['name'].'</option>';
         }
     
     }

$q3="SELECT * FROM actual";
     $st3 = $connect->prepare($q3);
     $st3->execute();
     if($st3->rowCount() > 0)
     {
       $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
       {
         $actclass.='<option value="'.$row3['id'].'">'.$row3['symbol'].'</option>';
       }
     }
     
     $q4="SELECT * FROM sim";
     $st4 = $connect->prepare($q4);
     $st4->execute();
     if($st4->rowCount() > 0)
     {
       $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
       {
         $simclass.='<option value="'.$row4['id'].'">'.$row4['shortsim'].'</option>';
       }
     }
     
     $q5="SELECT * FROM academic";
     $st5 = $connect->prepare($q5);
     $st5->execute();
     if($st5->rowCount() > 0)
     {
       $re5 = $st5->fetchAll();
       foreach($re5 as $row5)
       {
         $academicclass.='<option value="'.$row5['id'].'">'.$row5['shortacademic'].'</option>';
       }
     }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Task Log</title>
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
    <link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
	include_once 'sidenavbar.php';
?>
<center>
<div class="container" id="unaccomplishcontainer">
	<?php
    if(isset($_GET['id'])){
   $classid=$_GET['id'];
  }
  if(isset($_GET['class'])){
    echo 'class : '.$class=$_GET['class'];
    }
  ?>
	<div class="row" id="accrow">
        <h4 id="acctask">Unaccomplish Task</h4>
		<table>
			<tr>
			    <td>
				    <label class="form-label" for="Class">Class</label>
					<input class="form-control" value="<?php echo $class?>"/>
				</td>
				<td>
				    <label class="form-label" for="Instructor">Instructor</label>
					<input class="form-control"/>
				</td>
				<td>
				    <label class="form-label" for="Date">Date</label>
					<input class="form-control"/>
				</td>
				<td>
				    <label class="form-label" for="task">Task</label>
					<input class="form-control"/>
				</td>
				<td>
					<label class="form-label" for="Instructor">Instructor</label>
                        <select type="text" id="instructor" class="form-control form-control-md" name="Instructor" required>
                            <option selected disabled value="">-select instructor-</option>
                                <?php echo $in?>
                        </select>
				</td>
				<td>
					<label class="form-label" for="Instructor">Class</label>
                        <select type="text" id="instructor" class="form-control form-control-md" name="Instructor" required>
                            <option selected disabled value="">-select class-</option>
                                <?php echo $actclass?>
								<?php echo $simclass?>
								<?php echo $academicclass?>
                        </select>
				</td>
				<td>
				    <label class="form-label" for="Date">Date</label>
					<input class="form-control" type="date"/>
				</td>
			</tr>
		</table>
		<center>
			<button class="btn btn-danger" style="width:30%;">Save</button>
        </center>
    </div>
</div>

<div class="container" id="additioncontainer">
	<div class="row" id="adrow">
		<h4 id="addtask">Additional Task</h4>
	    
		<tr style="text-align:left;">
		<?php
		$item=$_REQUEST['itemchecklist'];
		foreach($item as $items)
		{
			echo "<button class='btn btn-warning' style='width:10%;'>$items</button>";
		?>
		</tr>
		
		<table>
			<tr>
				<td>
					<label class="form-label" for="Task">Task</label>
					<input class="form-control" value="<?php echo $class?>"/>
		        </td>
				<td>
				    <label class="form-label" for="Class">Class</label>
					<input class="form-control" value="<?php echo $class?>"/>
				</td>
				<td>
				    <label class="form-label" for="Instructor">Instructor</label>
					<input class="form-control"/>
				</td>
				<td>
				    <label class="form-label" for="Date">Date</label>
					<input class="form-control"/>
				</td>
				<!-- <td>
				    <label class="form-label" for="Task">Task</label>
					<select type="text" id="instructor" class="form-control" name="Instructor" required>
                     
							<?php
				
				foreach($item as $items)
				{?>
				
				<option value="<?php echo $items?>"><?php echo $items?></option>'';
				<?php	}
			?>
                    </select>
				</td> -->
				<td>
					<label class="form-label" for="Instructor">Instructor</label>
                        <select type="text" id="instructor" class="form-control" name="Instructor" required>
                            <option selected disabled value="">-select instructor-</option>
                                <?php echo $in?>
                        </select>
				</td>
				<td><label class="form-label" for="Class">Class</label>
                        <select type="text" id="class" class="form-control" name="class" required>
                            <option selected disabled value="">-select class-</option>
                                <?php echo $actclass?>
								<?php echo $simclass?>
								<?php echo $academicclass?>
                        </select>
				</td>
				<td>
				    <label class="form-label" for="Instructor">Date</label>
					<input class="form-control" type="date"/>
				</td>
			</tr>
		</table>
		<center>
			<button class="btn btn-success" style="width:30%;">Save</button>
        </center>
		<span>
			
				<?php 
					
				}
			?>
        </span>
    </div>
</div>
</center>
</body>
</html>