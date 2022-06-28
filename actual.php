
<?php
include('connect.php');



$output="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Actual Page</title>
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
    <link rel="stylesheet" href="sidestyle.css">
</head>
<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
$classcolor= "SELECT * FROM gradesheet where user_id='$student'";
$classcolorst= $connect->prepare($classcolor);
$classcolorst->execute();

if($classcolorst->rowCount() > 0)
    {
        $class="btn btn-success";
    }
    else{
        $class="btn btn-dark"; 
    }
?>
<div class="container" id="actualcontainer">
	<h3>Actual</h3>
	<div>Student name : <?php echo $fetchname?><br>
	Course name : <?php echo $std_course?>
</div>
<br>
	<div class="row" style="width:100%;">
		<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
		<!-- <h1>Phase</h1> -->
		<div class="col">
			<table id="table" class="center" style="border: 1px solid black;">
                    <?php
                    $query = "SELECT * FROM phase ORDER BY id ASC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                            foreach($result as $row)
                            {

                    ?>     
                            <div class="container"> 
                                <tr>
                               
                                <?php
                                $phase=$row['phasename'];
                                echo $phase_name='<div><h4 style="color:blue" id="phase">'.$row['phasename'].'</h4></div>';
                                ?>
                                </tr>
                                <tr>
                                <?php
                                $query1 = "SELECT * FROM actual where phase='$phase'";
                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();  
                                $result1 = $statement1->fetchAll();
                                    foreach($result1 as $row1){
                                       
                                        echo '<a id="cl_sy" class="'.$class.'" href="gradesheet.php?class='.$row1['symbol'].'&per='.$row1['percentage'].'">'.$row1['symbol'].'</a>';

                               }
                                ?>
                    
                                </tr><hr>
                 
                         </div>      
<?php }?>
                    </table>
        </div>

		<!-- <div class="col">
			<div style="margin-left: 80px;">
				<p></p>
				<input type="date" name="date">
			</div>
			<div style="border: 1px solid black; width: 80%; text-align: center; margin: 5px;
			padding: 5px; float: right;">
				<textarea>Student Haves</textarea><br>
				<textarea>Class # Select</textarea><br>
				<textarea>Send A Message</textarea>
			</div>
		</div> -->
	</div>
</div><br>

<!-- Next and Previous Button-->

 <div class="container-fluid" id="next-previous">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="sim.php">Next</a></button>
    </div><br><br>

    <script>
 $('#myTable').margetable({
  type: 1,
  colindex: [{
    index: 1, 
    dependent: [0]
  }]
});


    </script>
    <?php
include_once 'footer.php';
?>
</body>
</html>