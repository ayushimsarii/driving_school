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
             
          
              
                        
                        	<center>
                            <h5>Update Profile:</h5>
                            <?php 
                            $fetch_details= "SELECT * FROM users where id='$user_id'";
                            $fetch_detailsst2 = $connect->prepare($fetch_details);
                            $fetch_detailsst2->execute();
                            
                             if($fetch_detailsst2->rowCount() > 0)
                                 {
                                     $re2 = $fetch_detailsst2->fetchAll();
                                   foreach($re2 as $row2)
                                     {
                                     
                                    
                            ?>
                            <label>Name : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $row2['name'] ?>">
                            <label>phone : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $row2['phone'] ?>">
                            <label>Email id : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $row2['email'] ?>">
                            <label>Role : </label>
                            <input type="text" class="form-control" name="name" readonly value="<?php echo $row2['role'] ?>">
                            <form action="profile_update.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>
                            <?php } } ?>
                        </center>
               
          </div>
    
        </div>
        <?php
include_once 'footer.php';
?>
    </body>  
</html>