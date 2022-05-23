
<?php
$connect = new PDO("mysql:host=localhost;dbname=phase", "root", "");
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
</head>
<style type="text/css">
	.container
	{
		border: 1px solid black;
		margin-top: 10px;
	}
	button
	{
		margin: 5px;
		padding: 5px;
	}
	h3
	{
		text-align: center;
	}
	p
	{
		width: 50px;
		height: 50px;
		border: 1px solid black;
	}
	textarea
	{
		margin: 5px;
		padding: 5px;
		width: 250px;
		height: 150px;
	}
	a
	{
		color: white;
		text-decoration: none;
	}
	#cl_sy{
        margin-right: 10px;
    }
    .center {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
}
#block
{
	border: 1px solid black;
}
</style>
<body>
<?php
include_once 'header.php';
?>
<div class="container">
	<h3>Actual Page</h3>
	<div class="row">
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
                                $phase=$row['phase'];
                                echo $phase_name='<div><h4 style="color:blue" id="phase">'.$row['phase'].'</h4></div>';
                                ?>
                                </tr>
                                <tr>
                                <?php
                                $query1 = "SELECT symbol FROM actual where phase='$phase'";
                                $statement1 = $connect->prepare($query1);
                                $statement1->execute();  
                                $result1 = $statement1->fetchAll();
                                    foreach($result1 as $row1){
                                        echo '<a id="cl_sy" class="btn btn-success" href="gradesheet.php">'.$row1['symbol'].'</a>';

                                        
                                    }
                                ?>
                    
                                </tr><hr>
                 
                         </div>      
<?php }?>
                    </table>
        </div>

		<div class="col">
			<div>
				<p></p>
				<input type="date" name="date">
			</div>
			<div style="border: 1px solid black; width: 50%; text-align: center; margin: 5px;
			padding: 5px;">
				<textarea>Student Haves</textarea><br>
				<textarea>Class # Select</textarea><br>
				<textarea>Send A Message</textarea>
			</div>
		</div>
	</div>
</div>

<!-- Next and Previous Button-->

 <div class="container-fluid">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="">Next</a></button>
    </div>

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