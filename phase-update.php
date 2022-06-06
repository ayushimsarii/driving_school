<?php 
$id="";
$id=$_GET['id'];
$output="";

include_once 'connect.php';
$query = "SELECT * FROM phase where id='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= $row['phasename'];
                    }
                }
               
?>
<html>
    <head>
        <title>Phase editing</title>  
        <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

    <body>
    <?php
		include 'header.php';
		?>
		<?php
			if($role =='super admin'){
			include_once 'sidenavbar.php';
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
             
          	<form method="post" action="edit_phase.php">
                	<center>
                        
                        	<center>
                            <h5>Update Phase name:</h5>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
                            <input type="text" class="form-control" name="upt_name" value="<?php echo $output?>">
                          </center>
                        
                  </center>
                        <br />
                        <div align="center">
                            <input type="submit" name="saveit" class="btn btn-primary" value="submit" />
                        </div>
                </form>
          </div>
        </center>
        </div>
        <?php
include_once 'footer.php';
?>
    </body>  
</html>