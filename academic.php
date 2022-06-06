<!--fetching symbols from academic table-->
<?php
include('connect.php');
$output="";
$query = "SELECT * FROM academic ORDER BY id ASC";
            $statement = $connect->prepare($query);
            $statement->execute();

            if($statement->rowCount() > 0)
                {
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                        $output .= '<tr>
                       
                        <td>'.$row["id"].'</td>
                        <td><button class="btn btn-primary">'.$row["shortacademic"].'</button></td>
                        <form method="post" action="upload.php" enctype="multipart/form-data">
                        <td class="file"><input class="form-control" type="file" name="file" />
                        <td><button class="btn btn-success" type="submit" name="upload">upload</button><td>
                        <input style="visibility:hidden;" type="text" id="id" name="id" value="'.$row["id"].'">
                        
                        </td>
                         
                        </form>
                        </tr>';
                    }
                }
                else
                {
                    $output .= '
                        <tr>
                            <td colspan="2">No Data Found</td>
                        </tr>
                    ';
                }

                ?>
<!DOCTYPE html>
<html>
<head>
	<title>Academic Page</title>
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
	#lock1
	{
		border: 1px solid black;
		margin-top: 10px;
    width: 60%;
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
		height: 100px;
	}
	a
	{
		color: white;
		text-decoration: none;
	}
	form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}
nav
{
	margin: 15px;
}
.navbar-brand, .form-inline
{
	margin: 5px;
}
.lockshow
  {
    display: none;
    border: 1px solid black;
    margin: 10px, 10px, 10px, 10px;
    height: 750px;
    /*text-align: center;*/
   /* background-color: black;*/
  }
  .opacity
  {
   border: 1px solid white;
   height: 730px;
   background-color: white;
   opacity: 0.6;

  }
  .center 
  {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    /*border: 5px solid #FFFF00;*/
    padding: 10px;
  }
  #overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-align: right;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#lock2
{
  width: 60%;
}
.file
{
  width: 50%;
}
</style>
<body>
<?php
include_once 'header.php';
?>
<?php
include_once 'sidenavbar.php';
?>
<!--upload files-->
<div class="modal fade" id="fileupload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="fileupload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" />
					<button class="btn btn-success" type="submit" name="upload">upload</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


	<!--modal for uploaded file-->
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
      	<div class="row">
                    <center>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fileupload" onclick="hide()">
                        ADD
                      </button>
                    </center>
                  </div>
			        <center>
					 <table class="table table-striped" style="width:50%;">
				
						    <tr>
						    	<th>Symbol</th>
						    <th>File Name</th>
						    <th>File Type</th>
						    <th>File Size(KB)</th>
						    <th>View</th>
						    </tr>
						    <?php
$connect = new mysqli("localhost","root","","phase");

// Check connection
if ($connect->connect_errno) 
{
    echo "Failed to connect to MySQL: " . $connect->connect_error;
    exit();
}

?>
						    <?php
						$result = mysqli_query($connect,"SELECT * FROM academic");
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
						        	<td><?php echo $row["shortacademic"]; ?></td>
						        <td><?php echo $row["file"]; ?></td>
						        <td><?php echo $row["type"]; ?></td>
						        <td><?php echo $row["size"]; ?></td>
						        <td style="color:black;"><a href="upload/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
						        </tr>
						       <?php
						$i++;
						}
						?> 
					</table>
          
			</center>
      </div>
    </div> 
  </div>
</div>
	<div class="lockshow" id="overlay">
    <div class="container" id="opacity">
      <nav class="navbar navbar-dark bg-dark">
        <form class="form-inline">
          <button class="btn btn-outline-success" type="button"><a href="Next-home.php">View Phase</a></button>
          <button class="btn btn-outline-success" type="button"><a href="class_view.php">View Class</a></button>
          <button style="background-color: green; margin: 5px;" class="btn btn-success" onclick="Unlock()" id="unlock">Unlock</button>
        </form>
      </nav>
      <center class="center">
        <!-- <h1 style="color: red;">The Sheet Has been Locked</h1> -->
        <i style="font-size: 50px; margin: 5px; padding: 5px;" class="fas fa-lock"></i><br>
        <!-- <button style="background-color: green; margin: 5px;" class="btn btn-success" onclick="Unlock()" id="unlock">Unlock</button><br><hr>
        <button class="btn btn-primary" type="submit"><a href="Next-home.php">View Phase</a></button>
        <button class="btn btn-primary" type="submit"><a href="class_view.php">View Class</a></button>
        <div class="container">
	<center>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Self Study</button>
		
	</center>
</div> -->
      </center>
    </div>
  </div>

<nav class="navbar navbar-dark bg-dark" id="nav">
  <form class="form-inline">
    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
  </form>
  <!-- <a class=>Navbar</a> -->
  <button class="btn btn-primary" type="submit"><a style="color:white; text-decoration: none;" href="">Edit Phase</a></button>
  <button class="btn btn-primary" type="submit"><a style="color:white; text-decoration: none;" href="All class data.php">Edit Class</a></button>
  <button class="btn btn-danger" type="submit" onclick="lock()" id="lock">Lock</button>
  <button style="margin-right: 10px;" class="btn btn-warning">unlock</button>
</nav>

<div class="container" id="lock1">
	<h3>Academic Page</h3>
	<div class="row">
		<center><button class="btn btn-info"><a href="academic-user.php">study</a></button></center>
		<div class="col-8">
			<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
					<input type="file" name="file" />
					<button class="btn btn-success" type="submit" name="upload">upload</button>
      </form>

			<button class="btn btn-warning"><a href="filemodalfetch.php">Uploaded File</a></button> -->
                <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>

                  <table id="datatable" style="width: 100%;">
                        <!-- <tr>
                        <td>id</td>
                            <td>class</td>
                            <td id="name">file</td>
                            <td>action</td>
                        </tr> -->
                      
                        <?php
                        echo $output;
                        ?>
                    </table>
            
		</div>

		<div class="col-4" id="locked">
			<div>
				<p></p>
				<input type="date" name="date">
			</div>
			<div style="border: 1px solid black; width: 100%; text-align: center; margin: 5px;
			padding: 5px; float:right:">
				<textarea>Student Haves</textarea><br>
				<textarea>Class # Select</textarea><br>
				<textarea>Send A Message</textarea>
			</div>
		</div>
	</div>
</div><br>

 <div class="container-fluid" id="lock2">
		<button  class="btn btn-primary" type="submit"><a href="phase-view.php">Previous</a></button>
		<button style="float: right;" class="btn btn-primary" type="submit"><a href="">Next</a></button>
    </div><br>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
	function myFunction() 
          {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("datatable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) 
            {
              td = tr[i].getElementsByTagName("td")[1];
              if (td) 
              {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) 
                {
                  tr[i].style.display = "";
                } 
                else 
                {
                  tr[i].style.display = "none";
                }
              }       
            }
          }
</script>

<script>
$(document).ready(function(){
  $("#lock").click(function(){
    $(".file").hide();
    $("#name").hide();
    $("#nav").hide();
    $(".disabled").hide();
  });

  

});
   </script>
   <script>
$(document).ready(function(){
  $("#unlock").click(function(){
    $(".file").show();
    $("#name").show();
    $("#nav").show();
    $(".disabled").show();
  });

  

});
   </script>

<script type="text/javascript">
	function lock()
{
  document.getElementById('locked').style.pointerEvents = 'none';
  document.getElementById('lock2').style.pointerEvents = 'none';
  // document.getElementById('lock3').style.pointerEvents = 'none';
  // // document.getElementById("ty").style.display = "none";
  document.getElementById("overlay").style.display = "block";
  document.getElementById("file").style.display = "none";
}

function Unlock()
        { 
          
          document.getElementById('locked').style.pointerEvents = 'auto';
  document.getElementById('lock2').style.pointerEvents = 'auto';
  // document.getElementById('lock2').style.pointerEvents = 'auto';
  // document.getElementById("ty").style.display = "block";
  document.getElementById("overlay").style.display = "none";
        }
</script>

<!-- <script type="text/javascript">
	var div = document.getElementById('locked'); 
var btn = document.getElementById('lock'); 

btn.onclick = function (e) { 
    elements = div.querySelectorAll('input, select, textarea, checkbox, radio, button'); 
 
    for(i=0; i<elements.length;i++) { 
        elements[i].setAttribute('disabled', true); 
    } 
} 


</script>

<script type="text/javascript">
	var div = document.getElementById('locked');
	var btn-unlock = document.getElementById('unlock'); 
	btn-unlock.onclick = function (e) { 
    elements = div.querySelectorAll('input, select, textarea, checkbox, radio, button'); 
 
    for(i=0; i<elements.length;i++) { 
        elements[i].setAttribute('auto', true); 
    } 
} 
</script>
 -->
 <script type="text/javascript">
 	function hide()
 	{
 		document.getElementById("exampleModal").style.display = "none";
 	}
 </script>

<?php
include_once 'footer.php';
?>
</body>
</html>