<?php
include('connect.php');
$output="";

$course="select course";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Testing Log</title>
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
<div class="container">
	<center>
		<div class="row">
		<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>
			<h4>Testing Log</h4>
			<div>
				Student name : <?php echo $fetchname?><br>
				Course name : <?php echo $std_course?>
			</div>
			<center>
			<ul class="nav nav-tabs nav-justified" role="tablist" id="slidertab" style="width: 70%;">
    <!-- <div class="slider"></div> -->
				<li class="nav-item">
					<a class="nav-link active" id="test-tab" data-toggle="tab" href="#test" role="tab" aria-controls="test" aria-selected="true"><i class="fas fa-user"></i></i>Test</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="false"><i class="fas fa-car-bus"></i></i>Quiz</a>
				</li>
				
			</ul>
			</center><br>

			<div class="tab-content">
				<div class="tab-pane fade show active" id="test" role="tabpanel" aria-labelledby="test-tab">
			      <div class="col">
				  <table id="table" class="center" style="border: 1px solid black;">
                    <?php
                    $query = "SELECT * FROM phase where ctp='$phpcourse'";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                            foreach($result as $row)
                            {

                    ?>     
                            <div class="container"> 
                                <tr>
                               <td>
                                <?php
                                $phase=$row['id'];
                                echo $phase_name='<div><h4 style="color:blue" id="phase">'.$row['phasename'].'</h4></div>';
                                ?>
                                
								
                                <?php
                                $query1 = "SELECT * FROM test where phase='$phase'";
                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();  
                                $result1 = $statement1->fetchAll();
                                    foreach($result1 as $row1){
                                       
                                        echo '<a id="cl_sy" class="'.$class.'" href="gradesheet.php?class='.$row1['shorttest'].'&per='.$row1['percentage'].'&id='.$row1['id'].'&Phase_id='.$phase.'&class_name=test">'.$row1['shorttest'].'</a>';

                               }
                                ?></td>
                                </tr>
                            </div>      
                     <?php }?>
                </table>
				  </div>
				</div>

				<div class="tab-pane fade show active" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
					Quiz
				</div>
           </div>
		</div>
    </center>
</div>


<?php
 include_once 'footer.php';
 ?>
</body>
</html>