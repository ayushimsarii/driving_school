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
	<link href="css/bootstrap.css" rel="stylesheet">
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
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
<!--Fetching item info in this container-->
<div class="container">
	<center>
		<div class="row">
			<h4>Emergency Log</h4>
			<div>
			Student name : <?php echo $fetchname?><br>
			Course name : <?php echo $std_course?>
		</div>
			<form class="insert-emerge" id="" method="post" action=".php">
				<table id="table-field">
					<tr>
						<td>
							<label class="form-label" for="Item">Item</label>
							<select type="text" id="item" class="form-control" name="Item[]" value="" required>
                               <option selected disabled value="">-select item-</option>
                                <?php echo $item?>
                            </select>
						</td>
						<td>
							<label class="form-label" for="Class">Class</label>
							<input type="text" name="class[] " class="form-control" value="" required />
						</td>
						<td>
							<label class="form-label" for="Date">Date</label>
							<input type="text" name="date[] " class="form-control" value="" required />
						</td>
						<td>
							<button type="button" name="add_emer" id="add_emer" class="btn btn-warning"><i class="fas fa-plus-circle"></i></button>
						</td>
					</tr>
				</table><br>
			</form>
			<center>
					<button class="btn btn-success" type="submit" name="savephase">Submit</button>
	            </center>
		</div>
	
    </center>
</div>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
	    {
	        var html = '<tr>\
						<td>\
							<label class="form-label" for="Item">Item</label>\
							<select type="text" id="item" class="form-control" name="Item[]" value="" required>\
                               <option selected disabled value="">-select item-</option>\
                                <?php echo $item?>
                            </select>\
						</td>\
						<td>\
							<label class="form-label" for="Class">Class</label>\
							<input type="text" name="class[] " class="form-control" value="" required />\
						</td>\
						<td>\
							<label class="form-label" for="Date">Date</label>\
							<input type="text" name="date[] " class="form-control" value="" required />\
						</td>\
						<td>\
							<button type="button" name="remove_emer" id="remove_emer" class="btn btn-danger"><i class="fas fa-minus-circle"></i></button>\
						</td>\
					</tr>'
	        var max = 5;
	        var a = 1;

	        $("#add_emer").click(function()
	        {
	            if(a <= max)
	            {
	                $("#table-field").append(html);
	                a++;
	            }
	        });
	        $("#table-field").on('click','#remove_emer',function()
	        {
	            $(this).closest('tr').remove();
	            a--;
	        });
    });
 </script>
</body>
</html>