<?php
include('connect.php');
$item="";
$q3="SELECT * FROM itembank";
     $st3 = $connect->prepare($q3);
     $st3->execute();
     if($st3->rowCount() > 0)
     {
       $re3 = $st3->fetchAll();
       foreach($re3 as $row3)
       {
         $item.='<option value="'.$row3['id'].'">'.$row3['item'].'</option>';
       }
     }
     

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Emergency Log</title>
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
?>
<!--Fetching item info in this container-->
<div class="container">
	<center>
		<div class="row">
			<h4>Emergency Log</h4>
			<form>
				<table>
					<tr>
						<td>
							<label class="form-label" for="Item">Item</label>
							<select type="text" id="item" class="form-control" name="Item" required>
                               <option selected disabled value="">-select item-</option>
                                <?php echo $item?>
                            </select>
						</td>
						<td>
							<label class="form-label" for="Class">Class</label>
							<input class="form-control"/>
						</td>
						<td>
							<label class="form-label" for="Date">Date</label>
							<input class="form-control"/>
						</td>
						<td>
							<button type="button" name="add_phase" id="add_phase" class="btn btn-warning"><i class="fas fa-plus-circle"></i></button>
						</td>
					</tr>
				</table>
			</form>
		</div>
    </center>
</div>

</body>
</html>