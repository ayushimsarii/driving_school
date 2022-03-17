<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
    <meta name="viewport" 
          content="width=device-width, 
                   initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<style type="text/css">
	input
	{
		margin: 5px;
		padding: 5px;
		/*width: auto;*/
	}
	/*.row
	{
		border: 1px solid black;
		border-radius: 15px;
	}*/
	.container
	{
		margin-top: 10px;
	}
  td,
  th
  {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 5px;
    
    text-align: center;
  }
  table
  {
    margin: auto;
    margin-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
  a
  {
    text-decoration: none;
    color: white;
    font-weight: bold;
  }

</style>
<body>

	<!--first container-->
      <div class="container">
      	<div class="row">
      		<div class="col">
      			<table>
      				<tr>
      					<td><label>UP</label><input type="text" name="up"></td>
      					<td><label>Ride</label><input type="text" name="ride"></td>
      				</tr>
      				<tr>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      				<td><label>Status</label><input type="text" name="status"></td>
	      			</tr>
	      			<tr>
	      				<td><label>Instructor</label><input type="text" name="ins"></td>
	      				<td><label>Time</label><input type="time" name="time"></td>
	      			</tr>
	      			<tr>
		      			<td><label>Vehicle Number</label><input type="Number" name="veh"></td>
		      			<td><label>Position</label><input type="text" name="pos"></td>
		      		</tr>
      		    </table>
      		</div>

      		<div class="col">
      			<h4>Prereuisites</h4>
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      			<input type="" name="">
      		</div>
      	</div>
      </div>

      <!--Second Container-->
       <div class="container">
         <div class="row">
          <center>
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            ADD
          </button>
        </center>
         </div>
       </div>
      <!-- Button trigger modal -->

      <div class="container">
        <div class="row">
          <div class="col">
              <textarea name="parking" rows="4" cols="50" id="parking"></textarea><br>

              <textarea style="height: 400px;" name="comment" rows="4" cols="50" id="comment"></textarea>
          </div>
          <div class="col">
            
          </div>
        </div>
        
      </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
                   <?php
                    include_once 'database.php';
                    $result = mysqli_query($conn,"SELECT * FROM bank");
                    ?>
                    <!DOCTYPE html>
                    <html>
                     <head>
                       <title> Retrive data</title>
                       
                     </head>
                    <body>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    
                        <table id="Table1" border="0" cellspacing="2" cellpadding="2"> 
                          <tr> 
                              <th> <font face="Arial"></font> Check </th>
                              <th> <font face="Arial"></font> ID </th>
                              <th> <font face="Arial"></font> Item </th>  
                              <th colspan="2"> <font face="Arial"></font> Operations </th> 
                              
                          </tr>
                          <?php
                          $i=0;
                          while($row = mysqli_fetch_array($result)) {
                          ?>
                        <tr>
                          <td><input type="checkbox" name="checkbox" value=""></td>
                          <td><?php echo $row["id"]; ?></td>
                          <td><?php echo $row["item"]; ?></td>
                          <td><button class="btn btn-primary"><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></button></td>
                          <td><button class="btn btn-danger"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></button></td>
                          </tr>
                          <?php
                          $i++;
                          }
                          ?>
                    </table>
                     <?php
                    }
                    else
                    {
                        echo "No result found";
                    }
                    ?>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input id="btnGet" type="submit" class="btn btn-primary" value="Save" name="Sub">
      </div>
    </div>
  </div>
</div>


<!-- <?php
      if (isset($_POST['Sub'])){
        foreach ($_POST['id'] as $id):
        
        $sq=mysqli_query($conn,"SELECT * from bank where id='$id'");
        $srow=mysqli_fetch_array($sq);
        echo $srow['item']. "<br>";
        
        endforeach;
      }
    ?> -->

<script type="text/javascript">
    $(function () {
        //Assign Click event to Button.
        $("#btnGet").click(function () {
            var message = "";
 
            //Loop through all checked CheckBoxes in GridView.
            $("#Table1 input[type=checkbox]:checked").each(function () {
                var row = $(this).closest("tr")[0];
                message += row.cells[1].innerHTML;
                message += "   " + row.cells[2].innerHTML;
                // message += "   " + row.cells[3].innerHTML;
                message += "\n";
            });
 
            //Display selected Row data in Alert Box.
            alert(message);
            return false;
        });
    });
</script>

</body>
</html>