<?php 
$id="";
$id=$_GET['id'];
$output="";

include_once 'connect.php';
$query = "SELECT * FROM actual where id='$id'";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= $row['actual'];
                        // $output .= $row['symbol'];
                    }
                }
               
?>
<html>
    <head>
        <title>Phase editing</title>  
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
    </head> 
    <style type="text/css">
	input
	{
		margin: 5px;
		padding: 5px;
	}
	.container
  {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border: 1px solid black;
    padding: 10px;
    width: 30%;
    border-radius: 15px;
  }
  form 
  {
  	width: 30%;
  }
  h5
  {
  	font-size: 15px;
  	font-weight: bold;
  }
</style>
    <body>
    	
        <div class="container">   
        <!-- <h3> <a href="Next-home.php">Phase</a> </h3>  -->
        <center>
          <div class="row">                
          	<form method="post" action="edit_class_actual.php">
                	<center>
                        
                        	<center>
                            <h5>Update Actual Class name:</h5>
                            <input type="text" class="form-control" name="id" value="<?php echo $id?>">
                            <input type="text" class="form-control" name="actual_new" value="<?php echo $output?>">
                            <!-- <input type="text" class="form-control" name="symbol_new" value="<?php echo $output?>"> -->
                          </center>
                        
                  </center>
                        <br />
                        <div align="center">
                            <input type="submit" name="saveactual" class="btn btn-primary" value="submit" />
                        </div>
                </form>
          </div>
        </center>
        </div>
    </body>  
</html>