<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Activity Log</title>
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
<div class="container">
    <center>
		<div class="row">
			<h4>Student Activity Log</h4>
			<div>
				Student name : <?php echo $fetchname?><br>
				Course name : <?php echo $std_course?>
			</div>
			<table style="width:100%;" class="table table-striped table-bordered" id="simtable">
                            <input style="width:50%; display: none;" class="form-control" type="text" id="simsearch" onkeyup="sim()" placeholder="Search for Simulation Class.." title="Type in a name">
                                <thead>
                                    <th>Sr No</th>
                                    <th>Student Name</th>
                                    <th>Class Name</th>
                                    <th>Instructor Name</th>
                                    <th>CTP</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                  
                                </thead>
                                <?php 
                                $output ="";
                                $query = "SELECT * FROM gradesheet where ctp='$ctp' and phase='$phase_id'";
                                $statement = $connect->prepare($query);
                                $statement->execute();
                                if($statement->rowCount() > 0)
                                    {
                                        $result = $statement->fetchAll();
                                        $sn=1;
                                        foreach($result as $row)
                                        { ?>
                                           
                                            <tr>
                                            <td><?php echo $sn++;$id=$row['id'] ?></td>
                                            <td><?php echo $row[''] ?></td>
                                            <td><?php echo $row['shortsim'] ?></td>
                                            <td><?php echo $phase ?></td>
                                            <td><?php echo $row['ctp'] ?></td>
                                            <td><?php echo $row['ptype'] ?></td>
                                            <td><?php echo $row['percentage'] ?></td>
                                            <td><a href="add_item_subitem.php?class_id=<?php echo $id?>&phase_id=<?php echo $phase_id?>&ctp=<?php echo $ctp?>&class=sim">Add</a></td>
                                            <td><a style="color:blue;" onclick="document.getElementById('id1').value='<?php echo $id=$row['id'] ?>';
                                               document.getElementById('sim1').value='<?php echo $row['sim'] ?>';
                                               document.getElementById('shortsim1').value='<?php echo $row['shortsim'] ?>';
                                               document.getElementById('simphase').value='<?php echo $phase ?>';
                                               document.getElementById('simctp').value='<?php echo $row['ctp'] ?>';
                                               document.getElementById('ptype2').value='<?php echo $row['ptype'] ?>';
                                               document.getElementById('percentage2').value='<?php echo $row['percentage'] ?>';
                                            " data-toggle="modal" data-target="#editsim"><i class="fas fa-edit"></i></a>
                                            </a>
                                            <a href="sim_delete.php?id=<?php echo $id?>"><i class="fas fa-trash"></i></a>
                                           
                                          </td>
                                        </tr>
                                            <?php
                                        }
                                    
                                    }        
       ?>      
                            </table>
		</div>
	</center>
</div>


<?php
 include_once 'footer.php';
 ?>
</body>
</html>