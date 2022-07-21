<html>
    <head>
        <title>Phase editing</title>  
        <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<!-- <link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
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
                            <h5>Update Profile:</h5>
                            <label>Name : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $fetchname ?>">
                            <label>phone : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $fetchphone ?>">
                            <label>Email id : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $fetchemail ?>">
                            <label>Role : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $fetchrole ?>">
                            <label>Profile Pic : </label>
                            <input type="file" name="fileToUpload" id="fileToUpload">
                           <br />
                        
                            <input type="submit" name="saveit" class="btn btn-primary" value="submit" />
                        </center>
                </form>
          </div>
    
        </div>
        <?php
include_once 'footer.php';
?>
    </body>  
</html>