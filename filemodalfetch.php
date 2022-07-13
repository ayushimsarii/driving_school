<?php
$conn = new mysqli("localhost","root","","fileupload");

// Check connection
if ($conn->connect_errno) 
{
    echo "Failed to connect to MySQL: " . $conn->connect_error;
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
<title>File Retrieve</title>
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
<style type="text/css">
	.container
	{
		margin-top: 15px;
		padding: 5px;
	}
	.modal-dialog
	{
		width: 1500px;
	}
</style>
<body>
<!-- Button trigger modal -->
<div class="container">
	<center>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Self Study</button>
		<button type="button" class="btn btn-primary">Lecture By Instructor</button>
	</center>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
			        <center>
					 <table class="table table-striped">
						    <tr>
						    <th>File Name</th>
						    <th>File Type</th>
						    <th>File Size(KB)</th>
						    <th>View</th>
						    </tr>
						    <?php
						$result = mysqli_query($conn,"SELECT * FROM academic");
						  ?>
						  <?php
						$i=0;
						while($row = mysqli_fetch_array($result)) {
						if($i%2==0)
						$classname="evenRow";
						else
						$classname="oddRow";
						?>
						  
						        <tr>
						        <td><?php echo $row["file"]; ?></td>
						        <td><?php echo $row["type"]; ?></td>
						        <td><?php echo $row["size"]; ?></td>
						        <td><a href="upload/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
						        </tr>
						       <?php
						$i++;
						}
						?> 
					</table>
			</center>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

</body>
</html>